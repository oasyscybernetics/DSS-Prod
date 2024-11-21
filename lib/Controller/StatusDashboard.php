<?php namespace Xibo\Controller; use Exception; use GuzzleHttp\Client; use PicoFeed\PicoFeedException; use PicoFeed\Reader\Reader; use Stash\Interfaces\PoolInterface; use Xibo\Factory\DisplayFactory; use 
Xibo\Factory\DisplayGroupFactory; use Xibo\Factory\MediaFactory; use Xibo\Factory\UserFactory; use Xibo\Helper\ByteFormatter; use Xibo\Service\ConfigServiceInterface; use Xibo\Service\DateServiceInterface; use 
Xibo\Service\LogServiceInterface; use Xibo\Service\SanitizerServiceInterface; use Xibo\Storage\StorageServiceInterface; /**
 * Class StatusDashboard
 * @package Xibo\Controller
 */ class StatusDashboard extends Base {
    /**
     * @var StorageServiceInterface
     */
    private $store;
    /**
     * @var PoolInterface
     */
    private $pool;
    /**
     * @var UserFactory
     */
    private $userFactory;
    /**
     * @var DisplayFactory
     */
    private $displayFactory;
    /**
     * @var DisplayGroupFactory
     */
    private $displayGroupFactory;
    /**
     * @var MediaFactory
     */
    private $mediaFactory;
    /**
     * Set common dependencies.
     * @param LogServiceInterface $log
     * @param SanitizerServiceInterface $sanitizerService
     * @param \Xibo\Helper\ApplicationState $state
     * @param \Xibo\Entity\User $user
     * @param \Xibo\Service\HelpServiceInterface $help
     * @param DateServiceInterface $date
     * @param ConfigServiceInterface $config
     * @param StorageServiceInterface $store
     * @param PoolInterface $pool
     * @param UserFactory $userFactory
     * @param DisplayFactory $displayFactory
     * @param DisplayGroupFactory $displayGroupFactory
     * @param MediaFactory $mediaFactory
     */
    public function __construct($log, $sanitizerService, $state, $user, $help, $date, $config, $store, $pool, $userFactory, $displayFactory, $displayGroupFactory, $mediaFactory)
    {
        $this->setCommonDependencies($log, $sanitizerService, $state, $user, $help, $date, $config);
        $this->store = $store;
        $this->pool = $pool;
        $this->userFactory = $userFactory;
        $this->displayFactory = $displayFactory;
        $this->displayGroupFactory = $displayGroupFactory;
        $this->mediaFactory = $mediaFactory;
    }
    /**
     * Displays
     */
    public function displays()
    {
        // Get a list of displays
        $displays = $this->displayFactory->query($this->gridRenderSort(), $this->gridRenderFilter());
        $this->getState()->template = 'grid';
        $this->getState()->recordsTotal = $this->displayFactory->countLast();
        $this->getState()->setData($displays);
    }
    /**
     * View
     */
    function displayPage()
    {
        $data = [];
        // Set up some suffixes
        $suffixes = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB');
        try {
            // Get some data for a bandwidth chart
            $dbh = $this->store->getConnection();
            $params = ['month' => time() - (86400 * 365)];
            $sql = '
              SELECT MAX(FROM_UNIXTIME(month)) AS month,
                  IFNULL(SUM(Size), 0) AS size
                FROM `bandwidth`
                  INNER JOIN `lkdisplaydg`
                  ON lkdisplaydg.displayid = bandwidth.displayId
               WHERE month > :month ';
            $this->displayFactory->viewPermissionSql('Xibo\Entity\DisplayGroup', $sql, $params, '`lkdisplaydg`.displayGroupId');
            $sql .= ' GROUP BY MONTH(FROM_UNIXTIME(month)) ORDER BY MIN(month); ';
            // Run the SQL
            $results = $this->store->select($sql, $params);
            // Monthly bandwidth - optionally tested against limits
            $xmdsLimit = $this->getConfig()->GetSetting('MONTHLY_XMDS_TRANSFER_LIMIT_KB');
            $maxSize = 0;
            foreach ($results as $row) {
                $maxSize = ($row['size'] > $maxSize) ? $row['size'] : $maxSize;
            }
            // Decide what our units are going to be, based on the size
            $base = ($maxSize == 0) ? 0 : floor(log($maxSize) / log(1024));
            if ($xmdsLimit > 0) {
                // Convert to appropriate size (xmds limit is in KB)
                $xmdsLimit = ($xmdsLimit * 1024) / (pow(1024, $base));
                $data['xmdsLimit'] = round($xmdsLimit, 2) . ' ' . $suffixes[$base];
            }
            $labels = [];
            $usage = [];
            $limit = [];
            foreach ($results as $row) {
                $labels[] = $this->getDate()->getLocalDate($this->getSanitizer()->getDate('month', $row), 'F');
                $size = ((double)$row['size']) / (pow(1024, $base));
                $usage[] = round($size, 2);
                $limit[] = round($xmdsLimit - $size, 2);
            }
            // What if we are empty?
            if (count($results) == 0) {
                $labels[] = $this->getDate()->getLocalDate(null, 'F');
                $usage[] = 0;
                $limit[] = 0;
            }
            // Organise our datasets
            $dataSets = [
                [
                    'label' => __('Used'),
                    'backgroundColor' => ($xmdsLimit > 0) ? 'rgb(255, 0, 0)' : 'rgb(11, 98, 164)',
                    'data' => $usage
                ]
            ];
            if ($xmdsLimit > 0) {
                $dataSets[] = [
                    'label' => __('Available'),
                    'backgroundColor' => 'rgb(0, 204, 0)',
                    'data' => $limit
                ];
            }
            // Set the data
            $data['xmdsLimitSet'] = ($xmdsLimit > 0);
            $data['bandwidthSuffix'] = $suffixes[$base];
            $data['bandwidthWidget'] = json_encode([
                'labels' => $labels,
                'datasets' => $dataSets
            ]);
            // We would also like a library usage pie chart!
            if ($this->getUser()->libraryQuota != 0) {
                $libraryLimit = $this->getUser()->libraryQuota * 1024;
            }
            else {
                $libraryLimit = $this->getConfig()->GetSetting('LIBRARY_SIZE_LIMIT_KB') * 1024;
            }
            // Library Size in Bytes
            $params = [];
            $sql = 'SELECT IFNULL(SUM(FileSize), 0) AS SumSize, type FROM `media` WHERE 1 = 1 ';
            $this->mediaFactory->viewPermissionSql('Xibo\Entity\Media', $sql, $params, '`media`.mediaId', '`media`.userId');
            $sql .= ' GROUP BY type ';
            $sth = $dbh->prepare($sql);
            $sth->execute($params);
            $results = $sth->fetchAll();
            // Do we base the units on the maximum size or the library limit
            $maxSize = 0;
            if ($libraryLimit > 0) {
                $maxSize = $libraryLimit;
            } else {
                // Find the maximum sized chunk of the items in the library
                foreach ($results as $library) {
                    $maxSize = ($library['SumSize'] > $maxSize) ? $library['SumSize'] : $maxSize;
                }
            }
            // Decide what our units are going to be, based on the size
            $base = ($maxSize == 0) ? 0 : floor(log($maxSize) / log(1024));
            $libraryUsage = [];
            $libraryLabels = [];
            $totalSize = 0;
            foreach ($results as $library) {
                $libraryUsage[] = round((double)$library['SumSize'] / (pow(1024, $base)), 2);
                $libraryLabels[] = ucfirst($library['type']) . ' ' . $suffixes[$base];
                $totalSize = $totalSize + $library['SumSize'];
            }
            // Do we need to add the library remaining?
            if ($libraryLimit > 0) {
                $remaining = round(($libraryLimit - $totalSize) / (pow(1024, $base)), 2);
                $libraryUsage[] = $remaining;
                $libraryLabels[] = __('Free') . ' ' . $suffixes[$base];
            }
            // What if we are empty?
            if (count($results) == 0 && $libraryLimit <= 0) {
                $libraryUsage[] = 0;
                $libraryLabels[] = __('Empty');
            }
            $data['libraryLimitSet'] = ($libraryLimit > 0);
            $data['libraryLimit'] = (round((double)$libraryLimit / (pow(1024, $base)), 2)) . ' ' . $suffixes[$base];
            $data['librarySize'] = ByteFormatter::format($totalSize, 1);
            $data['librarySuffix'] = $suffixes[$base];
            $data['libraryWidgetLabels'] = json_encode($libraryLabels);
            $data['libraryWidgetData'] = json_encode($libraryUsage);
			
			
			// Connected Today
			// $sql_1 = "SELECT COUNT(*) FROM `display` WHERE lastaccessed >= UNIX_TIMESTAMP(DATE_SUB(now(), INTERVAL 1 DAY))";
			
			// $hr = date("h", strtotime("today midnight") - time());
			
			// $sql_1 = "SELECT COUNT(*) FROM `display` WHERE lastaccessed >= UNIX_TIMESTAMP(DATE_SUB(now(), INTERVAL $hr HOUR))";
			
			
			date_default_timezone_set('Asia/Kolkata');
			$dd = date('Y-m-d');
			
			$sql_1 = "SELECT COUNT(*) FROM `display` WHERE lastaccessed >= unix_timestamp('$dd')";
            $sth_1 = $dbh->prepare($sql_1);
            $sth_1->execute();
            $data['connectedToday'] = $sth_1->fetchColumn(0);
			
			
			// Active Displays
			$sql_2 = "SELECT COUNT(*) FROM `display` WHERE MediaInventoryStatus = 1";
            $sth_2 = $dbh->prepare($sql_2);
            $sth_2->execute();
            $data['activeDisplay'] = $sth_2->fetchColumn(0);
			
			
			// Inactive Displays
			//$sql_3 = "SELECT COUNT(*) FROM `display` WHERE MediaInventoryStatus = 3";
            $sql_3 = "SELECT COUNT(*) FROM `display` WHERE lastaccessed < unix_timestamp('$dd')";
            $sth_3 = $dbh->prepare($sql_3);
            $sth_3->execute();
            $data['inactiveDisplay'] = $sth_3->fetchColumn(0);
			
			// Downloading Displays
			$sql_4 = "SELECT COUNT(*) FROM `display` WHERE MediaInventoryStatus = 2";
            $sth_4 = $dbh->prepare($sql_4);
            $sth_4->execute();
            $data['downloadDisplay'] = $sth_4->fetchColumn(0);
			
			
			// Authorized Displays
			$sql_5 = "SELECT COUNT(*) FROM `display` WHERE licensed = 1";
            $sth_5 = $dbh->prepare($sql_5);
            $sth_5->execute();
            $data['authDisplays'] = $sth_5->fetchColumn(0);
			
			
			// Unuthorized Displays
			$sql_6 = "SELECT COUNT(*) FROM `display` WHERE licensed = 0";
            $sth_6 = $dbh->prepare($sql_6);
            $sth_6->execute();
            $data['unauthDisplays'] = $sth_6->fetchColumn(0);
			
			
			
			// Display Groups
			$sql_7 = "SELECT DisplayGroupID, DisplayGroup FROM `displaygroup` WHERE IsDisplaySpecific = 0";
            $sth_7 = $dbh->prepare($sql_7);
            $sth_7->execute();
            $data['displayGroups'] = $sth_7;
			
			
			$sql_9 = "SELECT DisplayGroupID FROM `displaygroup` WHERE IsDisplaySpecific = 0";
			$sth_9 = $dbh->prepare($sql_9);
			$sth_9->execute();
			$b = array();
			$c = array();
			$z = array();
			
			foreach ($sth_9 as $row) {
				$val = $row['DisplayGroupID'];
				
				$sql_8 = "SELECT COUNT(*) FROM `lkdisplaydg` WHERE DisplayGroupID = $val";
	            $sql_8 = $dbh->prepare($sql_8);
	            $sql_8->execute();
	            array_push($b, $sql_8->fetchColumn(0));
				
				array_push($c, $val);
			}
 			$data['dgTotalCount'] = $b;
			



/*

                    $sql_23 = "SELECT entityId, groupId FROM `permission` ORDER BY permissionId DESC LIMIT 1";
                    $sth_23 = $dbh->prepare($sql_23);
                    $sth_23->execute();
                    $entity_id = $sth_23->fetchColumn(0);

                    //print_r($entity_id . "<br>");



                    $sql_22 = "SELECT groupID, `group` FROM `group` ORDER BY groupID DESC LIMIT 1";
                    $sth_22 = $dbh->prepare($sql_22);
                    $sth_22->execute();
                    $group_id = $sth_22->fetchColumn(0);
                    //print_r($group_id);




                    $xx = array();
                    $sql_21 = "SELECT DisplayGroupID FROM `displaygroup` WHERE IsDisplaySpecific = 1";
                    $sth_21 = $dbh->prepare($sql_21);
                    $sth_21->execute();

                    foreach($sth_21 as $row) {
                         $val = $row['DisplayGroupID'];
                         array_push($xx, $val);
                         //print_r($val);
                    }

                    foreach($xx as $vv) {
                         //$sql_24 = "INSERT INTO `permission` (`entityId`, `groupId`, `objectId`, `view`, `edit`, `delete`) VALUES (3, 25, $vv, 1, 0, 0)";
                         //$sth_24 = $dbh->prepare($sql_24);
                         //$sth_24->execute();
                    }


//  $sq = "DELETE FROM `media` WHERE mediaID = 231";
//  $sq = "DELETE FROM requiredfile WHERE itemId=231";
//  $sth_23 = $dbh->prepare($sq);
//  $sth_23->execute();


  $sql_22 = "SELECT mediaID, name, type FROM `media` WHERE `type`='module'";
  $sth_22 = $dbh->prepare($sql_22);
  $sth_22->execute();

  foreach($sth_22 as $row) {
    $val1 = $row['mediaID'];
    $val2 = $row['name'] . ' - ' . $row['type'];
    print_r($val1 . ' - ' . $val2 . '<br>');
  }
*/


			
			foreach ($c as $vv) {
				$sql_10 = "SELECT DisplayID FROM `lkdisplaydg` WHERE DisplayGroupID = $vv";
				$sql_10 = $dbh->prepare($sql_10);
				$sql_10->execute();
				
				$y = array();
				
				foreach ($sql_10 as $row) {
					$val = $row['DisplayID'];
					array_push($y, $val);
				}
								
				
				date_default_timezone_set('Asia/Kolkata');
				$dd = date('Y-m-d');
				
				
				// $aa = array(57, 83, 101, 106);
				$aa = $y;
				$bb = implode(", ",$aa);

                                if(count($aa) == 0) {
                                   $bb = "0";
                                }

				$sql_11 = "SELECT COUNT(*) FROM `display` WHERE displayid in ($bb) AND lastaccessed >= unix_timestamp('$dd')";
				$sth_11 = $dbh->prepare($sql_11);
				$sth_11->execute();
				
				array_push($z, $sth_11->fetchColumn(0));

				// $data['tc'] = $sth_11->fetchColumn(0);
			}

			$data['tc'] = $z;
			
			
            // Get a count of users
            $data['countUsers'] = count($this->userFactory->query());
            // Get a count of active layouts, only for display groups we have permission for
            $displayGroups = $this->displayGroupFactory->query(null, ['isDisplaySpecific' => -1]);
            $displayGroupIds = array_map(function($element) {
                return $element->displayGroupId;
            }, $displayGroups);
            // Add an empty one
            $displayGroupIds[] = -1;
            $params = ['now' => time()];
            $sql = '
              SELECT IFNULL(COUNT(*), 0) AS count_scheduled
                FROM `schedule`
               WHERE (
                  :now BETWEEN FromDT AND ToDT
                  OR `schedule`.recurrence_range >= :now
                  OR (
                    IFNULL(`schedule`.recurrence_range, 0) = 0 AND IFNULL(`schedule`.recurrence_type, \'\') <> \'\'
                  )
                )
                AND eventId IN (
                  SELECT eventId
                    FROM `lkscheduledisplaygroup`
                   WHERE 1 = 1
            ';
            $this->displayFactory->viewPermissionSql('Xibo\Entity\DisplayGroup', $sql, $params, '`lkscheduledisplaygroup`.displayGroupId');
            $sql .= ' ) ';
            $sth = $dbh->prepare($sql);
            $sth->execute($params);
            $data['nowShowing'] = $sth->fetchColumn(0);
            // Latest news
            if ($this->getConfig()->GetSetting('DASHBOARD_LATEST_NEWS_ENABLED') == 1 && !empty($this->getConfig()->GetSetting('LATEST_NEWS_URL'))) {
                // Make sure we have the cache location configured
                Library::ensureLibraryExists($this->getConfig()->GetSetting('LIBRARY_LOCATION'));
                try {
                    $feedUrl = $this->getConfig()->GetSetting('LATEST_NEWS_URL');
                    $cache = $this->pool->getItem('rss/' . md5($feedUrl));
                    $latestNews = $cache->get();
                    // Check the cache
                    if ($cache->isMiss()) {
                        // Create a Guzzle Client to get the Feed XML
                        $client = new Client();
                        $response = $client->get($feedUrl, $this->getConfig()->getGuzzleProxy());
                        // Pull out the content type and body
                        $result = explode('charset=', $response->getHeaderLine('Content-Type'));
                        $document['encoding'] = isset($result[1]) ? $result[1] : '';
                        $document['xml'] = $response->getBody();
                        // Get the feed parser
                        $reader = new Reader();
                        $parser = $reader->getParser($feedUrl, $document['xml'], $document['encoding']);
                        // Get a feed object
                        $feed = $parser->execute();
                        // Parse the items in the feed
                        $latestNews = [];
                        foreach ($feed->getItems() as $item) {
                            /* @var \PicoFeed\Parser\Item $item */
                            // Try to get the description tag
                            if (!$desc = $item->getTag('description')) {
                                // use content with tags stripped
                                $content = strip_tags($item->getContent());
                            } else {
                                // use description
                                $content = (isset($desc[0]) ? $desc[0] : strip_tags($item->getContent()));
                            }
                            $latestNews[] = array(
                                'title' => $item->getTitle(),
                                'description' => $content,
                                'link' => $item->getUrl(),
                                'date' => $this->getDate()->getLocalDate($item->getDate()->format('U'))
                            );
                        }
                        // Store in the cache for 1 day
                        $cache->set($latestNews);
                        $cache->expiresAfter(86400);
                        $this->pool->saveDeferred($cache);
                    }
                    $data['latestNews'] = $latestNews;
                }
                catch (PicoFeedException $e) {
                    $this->getLog()->error('Unable to get feed: %s', $e->getMessage());
                    $this->getLog()->debug($e->getTraceAsString());
                    $data['latestNews'] = array(array('title' => __('Latest news not available.'), 'description' => '', 'link' => ''));
                }
            }
            else {
                $data['latestNews'] = array(array('title' => __('Latest news not enabled.'), 'description' => '', 'link' => ''));
            }
        }
        catch (Exception $e) {
            $this->getLog()->error($e->getMessage());
            $this->getLog()->debug($e->getTraceAsString());
            // Show the error in place of the bandwidth chart
            $data['widget-error'] = 'Unable to get widget details';
        }
        // Do we have an embedded widget?
        $data['embeddedWidget'] = html_entity_decode($this->getConfig()->GetSetting('EMBEDDED_STATUS_WIDGET'));
        // Render the Theme and output
        $this->getState()->template = 'dashboard-status-page';
        $this->getState()->setData($data);
    }
}
