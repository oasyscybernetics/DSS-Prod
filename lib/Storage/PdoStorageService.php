<?php

namespace Xibo\Storage;

use Xibo\Exception\DeadlockException;
use Xibo\Service\ConfigService;
use Xibo\Service\LogService;

/**
 * Class PDOConnect
 * Manages global connection state and the creation of connections
 * @package Xibo\Storage
 */
class PdoStorageService implements StorageServiceInterface
{
    /**
     * @var \PDO[] The connection
     */
	private $conn = [];

    /** @var array Statistics */
    private static $stats = [];

    /** @var  string */
    private static $_version;

    /**
     * Logger
     * @var LogService
     */
    private $log;

    /**
     * PDOConnect constructor.
     * @param LogService $logger
     */
	public function __construct($logger = null)
    {
        $this->log = $logger;
    }

    /** @inheritdoc */
    public function setConnection($name = 'default')
    {
        // Create a new connection
        $this->conn[$name] = PdoStorageService::newConnection();
        return $this;
    }

    /** @inheritdoc */
    public function close($name = null)
    {
        if ($name === null && isset($this->conn[$name])) {
            $this->conn[$name] = null;
            unset($this->conn[$name]);
        } else {
            $this->conn = [];
        }
    }

    /**
     * Create a DSN from the host/db name
     * @param string $host
     * @param string[Optional] $name
     * @return string
     */
    private static function createDsn($host, $name = null)
    {
        if (strstr($host, ':')) {
            $hostParts = explode(':', $host);
            $dsn = 'mysql:host=' . $hostParts[0] . ';port=' . $hostParts[1] . ';';
        }
        else {
            $dsn = 'mysql:host=' . $host . ';';
        }

        if ($name != null)
            $dsn .= 'dbname=' . $name . ';';

        return $dsn;
    }

    /**
     * Open a new connection using the stored details
     * @return \PDO
     */
	public static function newConnection()
    {
        $dsn = PdoStorageService::createDsn(ConfigService::$dbConfig['host'], ConfigService::$dbConfig['name']);

		// Open the connection and set the error mode
		$conn = new \PDO($dsn, ConfigService::$dbConfig['user'], ConfigService::$dbConfig['password']);
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		$conn->query("SET NAMES 'utf8'");

		return $conn;
	}

    /**
     * Open a connection with the specified details
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string[Optional] $name
     * @return \PDO
     */
	public function connect($host, $user, $pass, $name = null)
    {
        if (!isset($this->conn['default']))
		    $this->close('default');

        $dsn = PdoStorageService::createDsn($host, $name);

        // Open the connection and set the error mode
		$this->conn['default'] = new \PDO($dsn, $user, $pass);
		$this->conn['default']->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->conn['default']->query("SET NAMES 'utf8'");

		return $this->conn['default'];
	}

    /** @inheritdoc */
    public function getConnection($name = 'default')
    {
        if (!isset($this->conn[$name]))
            $this->conn[$name] = PdoStorageService::newConnection();

        return $this->conn[$name];
    }

    /** @inheritdoc */
    public function exists($sql, $params, $connection = null, $reconnect = false)
    {
        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'default';

        try {
            $sth = $this->getConnection($connection)->prepare($sql);
            $sth->execute($params);

            $this->incrementStat($connection, 'exists');

            if ($sth->fetch())
                return true;
            else
                return false;

        } catch (\PDOException $PDOException) {
            // Throw if we're not expected to reconnect.
            if (!$reconnect)
                throw $PDOException;

            $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

            if ($errorCode != 2006) {
                throw $PDOException;
            } else {
                $this->close($connection);
                return $this->exists($sql, $params, $connection, false);
            }
        }
    }

    /** @inheritdoc */
    public function insert($sql, $params, $connection = null, $reconnect = false)
	{

	/* ORACLE ODBC CONNECT */
	$this->oracle_odbc_connect($sql, $params);

        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'default';

        try {
            if (!$this->getConnection($connection)->inTransaction())
                $this->getConnection($connection)->beginTransaction();

            $sth = $this->getConnection($connection)->prepare($sql);

            $sth->execute($params);

            $this->incrementStat($connection, 'insert');

            return intval($this->getConnection($connection)->lastInsertId());

        } catch (\PDOException $PDOException) {
            // Throw if we're not expected to reconnect.
            if (!$reconnect)
                throw $PDOException;

            $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

            if ($errorCode != 2006) {
                throw $PDOException;
            } else {
                $this->close($connection);
                return $this->insert($sql, $params, $connection, false);
            }
        }
    }

	/** @inheritdoc */
	public function update($sql, $params, $connection = null, $reconnect = false)
	{

	/* ORACLE ODBC CONNECT */
	$this->oracle_odbc_connect($sql, $params);

        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'default';

        try {
            if (!$this->getConnection($connection)->inTransaction())
                $this->getConnection($connection)->beginTransaction();

            $sth = $this->getConnection($connection)->prepare($sql);

            $sth->execute($params);

            $rows = $sth->rowCount();

            $this->incrementStat($connection, 'update');

            return $rows;

        } catch (\PDOException $PDOException) {
            // Throw if we're not expected to reconnect.
            if (!$reconnect)
                throw $PDOException;

            $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

            if ($errorCode != 2006) {
                throw $PDOException;
            } else {
                $this->close($connection);
                return $this->update($sql, $params, $connection, false);
            }
        }
	}

    /** @inheritdoc */
	public function select($sql, $params, $connection = null, $reconnect = false)
	{
        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'default';

        try {
            $sth = $this->getConnection($connection)->prepare($sql);

            $sth->execute($params);

            $this->incrementStat($connection, 'select');

            return $sth->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $PDOException) {
            // Throw if we're not expected to reconnect.
            if (!$reconnect)
                throw $PDOException;

            $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

            if ($errorCode != 2006) {
                throw $PDOException;
            } else {
                $this->close($connection);
                return $this->select($sql, $params, $connection, false);
            }
        }
	}

	/** @inheritdoc */
	public function isolated($sql, $params, $connection = null, $reconnect = false)
    {
        // Should we log?
        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'isolated';

        try {
            $sth = $this->getConnection($connection)->prepare($sql);

            $sth->execute($params);

            $this->incrementStat('isolated', 'update');

        } catch (\PDOException $PDOException) {
            // Throw if we're not expected to reconnect.
            if (!$reconnect)
                throw $PDOException;

            $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

            if ($errorCode != 2006) {
                throw $PDOException;
            } else {
                $this->close($connection);
                return $this->isolated($sql, $params, $connection, false);
            }
        }
    }

    /** @inheritdoc */
    public function updateWithDeadlockLoop($sql, $params, $connection = null)
    {
        $maxRetries = 2;

        // Should we log?
        if ($this->log != null)
            $this->log->sql($sql, $params);

        if ($connection === null)
            $connection = 'isolated';

        // Prepare the statement
        $statement = $this->getConnection($connection)->prepare($sql);

        // Deadlock protect this statement
        $success = false;
        $retries = $maxRetries;
        do {
            try {
                $this->incrementStat($connection, 'update');
                $statement->execute($params);
                // Successful
                $success = true;

            } catch (\PDOException $PDOException) {
                $errorCode = isset($PDOException->errorInfo[1]) ? $PDOException->errorInfo[1] : $PDOException->getCode();

                if ($errorCode != 1213 && $errorCode != 1205)
                    throw $PDOException;
            }

            if ($success)
                break;

            // Sleep a bit, give the DB time to breathe
            $queryHash = substr($sql, 0, 15) . '... [' . md5($sql . json_encode($params)) . ']';
            $this->log->debug('Retrying query after a short nap, try: ' . (3 - $retries) . '. Query Hash: ' . $queryHash);
            usleep(10000);

        } while ($retries--);

        if (!$success)
            throw new DeadlockException(__('Failed to write to database after %d retries. Please try again later.', $maxRetries));
    }

    /** @inheritdoc */
    public function commitIfNecessary($name = 'default')
    {
        if ($this->getConnection($name)->inTransaction()) {
            $this->incrementStat($name, 'commit');
            $this->getConnection($name)->commit();
        }
    }

    /**
     * Set the TimeZone for this connection
     * @param string $timeZone e.g. -8:00
     * @param string $connection
     */
    public function setTimeZone($timeZone, $connection = 'default')
    {
        $this->getConnection($connection)->query('SET time_zone = \'' . $timeZone . '\';');

        $this->incrementStat($connection, 'utility');
	}

    /**
     * PDO stats
     * @return array
     */
    public function stats()
    {
        return self::$stats;
    }

    /** @inheritdoc */
    public function incrementStat($connection, $key)
    {
        $currentCount = (isset(self::$stats[$connection][$key])) ? self::$stats[$connection][$key] : 0;
        self::$stats[$connection][$key] = $currentCount + 1;
    }

    /**
     * Statically increment stats
     * @param $connection
     * @param $key
     */
    public static function incrementStatStatic($connection, $key)
    {
        $currentCount = (isset(self::$stats[$connection][$key])) ? self::$stats[$connection][$key] : 0;
        self::$stats[$connection][$key] = $currentCount + 1;
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        if (self::$_version === null) {

            $results = $this->select('SELECT version() AS v', []);

            if (count($results) <= 0)
                return null;

            self::$_version = explode('-', $results[0]['v'])[0];
        }

        return self::$_version;
    }



public function oracle_odbc_connect($sql, $params) {

	$conn = oci_connect("xvsfdn", "5dabd9138980946ccb4b6d4ce316ee27", "10.128.230.243:9027/ubinedu");


	if(!$conn) {
		//echo "Failed to connect to Oracle";
		//Redirect to ORACLE ERROR PAGE
	}
	else {
		//echo "Successfully connected to oracle DB \n";
		$log = var_export($sql, true);
		$val = trim($sql);
		$f = strtok($val, " ");
		
		$oracle_log = "";
			
		if ($f == "DELETE") {
			$oracle_log = $this->oracle_delete_stmt($sql, $params);
		}
		else if ($f == "UPDATE") {
			$oracle_log = $this->oracle_update_stmt($sql, $params);
		}
		else if ($f == "INSERT") {
			$oracle_log = $this->oracle_insert_stmt($sql, $params);
		}
		
		$this->oracle_execute_data($conn, $oracle_log);
	}

	oci_close($conn);


	//$this->sql_call_data($sql, $params);


}



public function sql_call_data($sql, $params) {
			$val = trim($sql);
			$f = strtok($val, " ");
			
			$oracle_log = "";
			
			if ($f == "DELETE") {
				$oracle_log = $this->oracle_delete_stmt($sql, $params);
			}
			else if ($f == "UPDATE") {
				$oracle_log = $this->oracle_update_stmt($sql, $params);
			}
			else if ($f == "INSERT") {
				$oracle_log = $this->oracle_insert_stmt($sql, $params);
			}
			
			$dbh = PdoStorageService::newConnection();
	    		$this->_zLog = $dbh->prepare('
	        		INSERT INTO `zlog` (log, log_params, oraclelog, log_time)
	          		VALUES (:log, :log_params, :oraclelog, :log_time)
	    		');
	
			$t=time(); 
			$today = date("Y-m-d g:i:s",$t);

			$log = var_export($sql, true);
			$log_params = var_export($params, true);
			
			$this->_zLog->execute([
	        			'log' => trim($sql),
					'log_params' => $log_params,
					'oraclelog' => $oracle_log,
					'log_time' => $today
	    		]);
}



public function oracle_execute_data($conn, $stmt) {
	$sql = $stmt;
	//echo $sql;
	$compiled = oci_parse($conn, $sql);
	$result = oci_execute($compiled);
	oci_commit($conn);
}


public function hasWord($word, $txt) {
	$patt = "/(?:^|[^a-zA-Z])" . preg_quote($word, '/') . "(?:$|[^a-zA-Z])/i";
	return preg_match($patt, $txt);
}


public function oracle_delete_stmt($sql, $params) {
			//$log = var_export($sql, true);
			$str = trim($sql);

			$str = str_replace("`", '', $str);
			$arr1 = explode(' ',trim($str));
			$ss = $arr1[2];

			if($ss == "user" || $ss == "group" || $ss == "session") {
				$ss = '"' . $ss . '"';
			}

			$arr = $params;
			$a = array();

			foreach($arr as $key => $value) {
				if($value === NULL) {
					$a[] = "NULL";
				}
				else {
					$a[] = $key . " = '" . $value . "'";
				}
			}


			list($a1, $b1) = explode(' VALUES ', $str);
			$a1 = str_replace("'", '', $a1);

			$a1 = "DELETE FROM " . $ss;

			return trim($a1) . ' WHERE ' . implode(" and ", $a);
}


public function oracle_insert_stmt($sql, $params) {
			//$log = var_export($sql, true);
			$str = trim($sql);

			$str = str_replace("`", '', $str);
			$arr1 = explode(' ',trim($str));
			$ss = $arr1[2];

			$table_name = $ss;

			if($ss == "user" || $ss == "group" || $ss == "session") {
				$ss = '"' . $ss . '"';
			}

			$arr = $params;
			$a = array();

			foreach($arr as $key => $value) {
				if($value === NULL) {
					$a[] = "NULL";
				}
				else {
					if($table_name == "widget"){
						$a[] = "'" . $value . "'";
					}
					else if(($key == "start" || $key == "end") && $table_name == "displayevent"){
						$a[] = "'" . $value . "'";
					}
					else if($key == "start" || $key == "end" || $key == "createdDT" || $key == "createdDt" || $key == "modifiedDT" || $key == "modifiedDt" || $key == "LastAccessed" || $key == "logdate" || $key == "statDate") {
						$a[] = "to_timestamp('" . $value . "', 'YYYY-MM-DD HH24:MI:SS')";
					}
					else if($key == "lastaccessed" && $table_name != "display") {
						$a[] = "to_timestamp('" . $value . "', 'YYYY-MM-DD HH24:MI:SS')";
					}
					else if($key == "message" && $table_name == "log"){
						$value = str_replace("'", "", $value);
						$a[] = "q'[" . $value . "]'";
					}
					else if(($key == "validation" || $key == "default" || $key == "options" || $key == "value")  && $table_name == "setting"){
						$a[] = "'" . $value . " '";
					}
					else{
						$a[] = "'" . $value . "'";
					}
				}
			}

			
			list($a1, $b1) = explode(' VALUES ', $str);
			$a1 = str_replace("'", '', $a1);

			list($c1, $d1) = explode('(', $a1);

			$kk = "INSERT INTO " . $ss;
			
			if ($this->hasWord("Size", $d1) == 1) {
				if(strpos($d1, 'Size') !== false){
					$a[] = str_replace("Size", '"Size"', $d1);
				}
				else {
					$a[] = str_replace("size", '"size"', $d1);
				}
			}
			else if ($this->hasWord("start", $d1) == 1) {
					$a[] = str_replace("start", '"start"', $d1);
			}
			else if ($this->hasWord("view", $d1) == 1) {
					$a[] = str_replace("view", '"view"', $d1);
			}
			else if ($this->hasWord("default", $d1) == 1) {
					$a[] = str_replace("default", '"default"', $d1);
			}
			else if ($this->hasWord("delete", $d1) == 1) {
					$a[] = str_replace("delete", '"delete"', $d1);
			}
			else if ($this->hasWord("option", $d1) == 1) {
					$a[] = str_replace("option", '"option"', $d1);
			}
			else if ($this->hasWord("group", $d1) == 1) {
					$a[] = str_replace("group", '"group"', $d1);
			}
			else if ($this->hasWord("password", $d1) == 1) {
					$a[] = str_replace("password =", "userpassword =", $d1);
			}
			else {
					$a[] = $d1;
			}

			
			$a1 = $kk . "(" . $d1;

			return trim($a1) . ' VALUES(' . implode(", ", $a) . ')';
}


public function oracle_update_stmt($sql, $params) {
			//$log = var_export($sql, true);
			$str = trim($sql);

			$str = str_replace("`", '', $str);
			$arr1 = explode(' ',trim($str));
			$ss = $arr1[1];

			$table_name = $ss;
			
			$lastKey = 0;
			
			list($c1, $d1) = explode(' WHERE ', $str);
			$aaa = explode(' ', trim($d1));
			$d1 = $aaa[0];

			if($ss == "user" || $ss == "group" || $ss == "session") {
				$ss = '"' . $ss . '"';
			}

			$arr = $params;
			$a = array();

			foreach($arr as $key => $value) {
				if($value === NULL) {
					//$a[] = null;
					$a[] = $key . " = NULL";
				}
				else {
					
					if($table_name == "widget"){
						$a[] = $key . " = '" . $value . "'";
					}
					else if(($key == "start" || $key == "end") && $table_name == "displayevent"){
						$a[] = '"' . $key . '"' . "'" . $value . "'";
					}
					else if($key == "start" || $key == "end" || $key == "createdDT" || $key == "createdDt" || $key == "modifiedDT" || $key == "modifiedDt" || $key == "LastAccessed" || $key == "logdate" || $key == "statDate") {
						$a[] = $key . " = " . "to_timestamp('" . $value . "', 'YYYY-MM-DD HH24:MI:SS')";
					}
					else if ($key == "Size" || $key == "size" || $key == "start" || $key == "view" || $key == "default" || $key == "delete" || $key == "option" || $key == "group") {
						$a[] = '"' . $key . '"' . " = '" . $value . "'";
					}
					else if($key == "lastaccessed" && $table_name != "display") {
						$a[] = $key . " = " . "to_timestamp('" . $value . "', 'YYYY-MM-DD HH24:MI:SS')";
					}
					else if($key == "message" && $table_name == "log"){
						$value = str_replace("'", "", $value);
						$a[] = $key . " = " . "q'[" . $value . "]'";
					}
					else if(($key == "validation" || $key == "default" || $key == "options" || $key == "value")  && $table_name == "setting"){
						$a[] = '"' . $key . '"' . " = '" . $value . "'";
					}
					else if ($key == "time") {
						$a[] = "lastAccessed" . " = '" . $value . "'";
					}
					else if ($key == "password") {
						$a[] = "userpassword = '" . $value . "'";
					}
					else{
						$a[] = $key . " = '" . $value . "'";
					}
					
					
					if($key == $d1) {
						$lastKey = count($a)-1;
					}
				}
			}

			$a1 = "UPDATE " . $ss . " SET ";
			
			return $a1 . implode(", ", $a) . " WHERE " . $a[$lastKey];
			
}


// End of Class
}
