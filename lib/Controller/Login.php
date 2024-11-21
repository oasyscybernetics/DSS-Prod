<?php

namespace Xibo\Controller;
use Xibo\Entity\User;
use Xibo\Exception\AccessDeniedException;
use Xibo\Exception\NotFoundException;
use Xibo\Factory\UserFactory;
use Xibo\Helper\Session;
use Xibo\Service\ConfigServiceInterface;
use Xibo\Service\DateServiceInterface;
use Xibo\Service\LogServiceInterface;
use Xibo\Service\SanitizerServiceInterface;
use Xibo\Storage\PdoStorageService;
use Xibo\Storage\StorageServiceInterface;

/**
 * Class Login
 * @package Xibo\Controller
 */
class Login extends Base
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * Set common dependencies.
     * @param LogServiceInterface $log
     * @param SanitizerServiceInterface $sanitizerService
     * @param \Xibo\Helper\ApplicationState $state
     * @param User $user
     * @param \Xibo\Service\HelpServiceInterface $help
     * @param DateServiceInterface $date
     * @param ConfigServiceInterface $config
     * @param Session $session
     * @param UserFactory $userFactory
     */
    public function __construct($log, $sanitizerService, $state, $user, $help, $date, $config, $session, $userFactory)
    {
        $this->setCommonDependencies($log, $sanitizerService, $state, $user, $help, $date, $config);

        $this->session = $session;
        $this->userFactory = $userFactory;
    }




    /**
     * Output a login form
		 * @throws \Xibo\Exception\ConfigurationException
     */
    public function loginForm()
    {
	
				if (isset($_SESSION['loginCount']))
				{
				   if ($_SESSION['loginCount'] > 3)
				   {
						 $now = time();
						 $ontime = $_SESSION['loginTime'] + 1800; 	//900 = 15 min X 60 sec

						 if($now >= $ontime){
							 unset($_SESSION['loginCount']);
							 unset($_SESSION['loginTime']);
						 }
						 else{
							 $this->getLog()->error('Invalid login attempt.');
			         $this->getApp()->flashNow('login_message', __('Access denied for 30 minutes.' ));
						 }
				   }
				}
				
				
        // Check to see if the user has provided a special token
        $nonce = $this->getSanitizer()->getString('nonce');
        if ($nonce != '') {
            // We have a nonce provided, so validate that in preference to showing the form.
	    $sss = $nonce;

            $nonce = explode('::', $nonce);
	    $this->getLog()->debug('Nonce is ' . var_export($nonce, true));
						
	    $sss = explode('::', $sss);
	    $val = $this->checkResetToken($sss[1]);
						
            //$cache = $this->pool->getItem('/nonce/' . $nonce[0]);
            //$validated = $cache->get();

            if ($val[0] == 0) {
                $this->getLog()->error('Expired nonce used.');
                $this->getApp()->flashNow('login_message', __('This link is invalid.'));
            } else if ($val[0] == 1) {
                $this->getLog()->error('Invalid nonce used.');
                $this->getApp()->flashNow('login_message', __('This link has expired.'));
            } else if ($val[0] == 2) {
                // We're valid.
                //$this->pool->deleteItem('/nonce/' . $nonce[0]);

		$uid = $val[1];

                try {
                    $user = $this->userFactory->getById($uid);
										
		    $this->ipcrUpdate($uid);
										
                    // Log in this user
                    // TODO: set force password change (update touch() to do this too, based on a parameter)
                    $user->touch();
                    $this->getLog()->info($user->userName . ' user logged in via token.');

                    // Set the userId on the log object
                    $this->getLog()->setUserId($user->userId);

                    // Overwrite our stored user with this new object.
                    $this->getApp()->user = $user;

                    // Expire all sessions
                    $session = $this->session;

                    // this is a security measure in case the user is logged in somewhere else.
                    // (not this one though, otherwise we will deadlock
                    $session->expireAllSessionsForUser($user->userId);

                    // Switch Session ID's
                    $session->setIsExpired(0);
                    $session->regenerateSessionId();
                    $session->setUser($user->userId);

                    // Audit Log
                    $this->getLog()->audit('User', $user->userId, 'Login Granted via token', [
                        'IPAddress' => $this->getApp()->request()->getIp(),
                        'UserAgent' => $this->getApp()->request()->getUserAgent()
                    ]);
                    $this->getApp()->redirectTo('home');

                    // We're done here
                    return;
                } catch (NotFoundException $notFoundException) {
                    $this->getLog()->error('Valid nonce for non-existing user');
                    $this->getApp()->flashNow('login_message', __('This link has expired.'));
                }
            }
        }

        // Check to see if the password reminder functionality is enabled.
        $passwordReminderEnabled = $this->getConfig()->GetSetting('PASSWORD_REMINDER_ENABLED');
        $mailFrom = $this->getConfig()->GetSetting('mail_from');

        // Template
        $this->getState()->template = 'login';
        $this->getState()->setData([
            'passwordReminderEnabled' => (($passwordReminderEnabled === 'On' || $passwordReminderEnabled === 'On except Admin') && $mailFrom != ''),
            'version' => VERSION
        ]);
    }


// START HERE
    /*
    public function loginForm()
    {

	if (isset($_SESSION['loginCount'])) {
  	  if ($_SESSION['loginCount'] > 3) {
		$now = time();
		$ontime = $_SESSION['loginTime'] + 1800;   //1800 = 30 min X 60 sec

		if($now >= $ontime) {
	  	  unset($_SESSION['loginCount']);
	  	  unset($_SESSION['loginTime']);
		}
		else {
		  $this->getLog()->error('Invalid login attempt.');
	  	  $this->getApp()->flashNow('login_message', __('Access denied for 30 minutes'));
	  	}
  	  }
	}


        $this->getLog()->debug($this->getApp()->flashData());
        // Template
        $this->getState()->template = 'login';
        $this->getState()->setData(['version' => VERSION]);
    } */

// END HERE


    /**
     * login
     */
    public function login()
    {
        // Capture the prior route (if there is one)
        $redirect = 'login';
        $priorRoute = ($this->getSanitizer()->getString('priorRoute'));


	if (isset($_SESSION['loginCount'])) {
  	  if ($_SESSION['loginCount'] > 3) {
		$now = time();
		$ontime = $_SESSION['loginTime'] + 1800;   //1800 = 30 min X 60 sec

		if($now >= $ontime) {
	  	  unset($_SESSION['loginCount']);
	  	  unset($_SESSION['loginTime']);
		}
		else {
	  	  $this->getApp()->flash('login_message', __('Access denied for 30 minutes'));
	  	  $this->getApp()->redirectTo('login');
		}
  	  }
	}


        try {
            // Get our username and password
            $username = $this->getSanitizer()->getUserName('username');
            $password = $this->getSanitizer()->getPassword('password');

            $this->getLog()->debug('Login with username %s', $username);

            // Get our user
            try {
                /* @var User $user */
                $user = $this->userFactory->getByName($username);

                // Check password
                $user->checkPassword($password);

                $user->touch();

		if($user->userId != 0) {
		  $msg = $this->checkExpiry($user->userId);
		}

                $this->getLog()->info('%s user logged in.', $user->userName);

                // Set the userId on the log object
                $this->getLog()->setUserId($user->userId);

                // Overwrite our stored user with this new object.
                $this->getApp()->user = $user;

                // Switch Session ID's
                $session = $this->session;
                $session->setIsExpired(0);
                $session->regenerateSessionId();
                $session->setUser($user->userId);

                // Audit Log
                $this->getLog()->audit('User', $user->userId, 'Login Granted', [
                    'IPAddress' => $this->getApp()->request()->getIp(),
                    'UserAgent' => $this->getApp()->request()->getUserAgent()
                ]);

		unset($_SESSION['loginCount']);
		unset($_SESSION['loginTime']);
            }
            catch (NotFoundException $e) {
                throw new AccessDeniedException('User not found');
            }

            $redirect = ($priorRoute == '' || $priorRoute == '/' || stripos($priorRoute, $this->getApp()->urlFor('login'))) ? $this->getApp()->urlFor('home') : $priorRoute;
        }
        catch (\Xibo\Exception\AccessDeniedException $e) {

            $this->getLog()->warning($e->getMessage());
            $this->getApp()->flash('login_message', __('Username or Password incorrect'));




	    if (isset($_SESSION['loginCount']))
	    {
			$_SESSION['loginCount']++;
			$this->getApp()->flash('login_message', __('Username or Password incorrect' . " Invalid attempt " . $_SESSION['loginCount']));
						
						
			if ($_SESSION['loginCount'] > 3)
			{
		             $this->getApp()->flash('login_message', __('Access denied for 30 minutes '));
			     $_SESSION['loginTime'] = time();
			}
	    } else {
			$_SESSION['loginCount'] = 1;
			$_SESSION['loginTime'] = time();
			$this->getApp()->flash('login_message', __('Username or Password incorrect' . " Invalid attempt " . $_SESSION['loginCount']));
	    }
						
						
            $this->getApp()->flash('priorRoute', $priorRoute);
	}
        catch (\Xibo\Exception\FormExpiredException $e) {
            $this->getApp()->flash('priorRoute', $priorRoute);
        }

	
	if($user->userId != 0) {
		$count = $this->checkSession($user->userId);
		if($count >= 1) {
	  	  $this->getApp()->flash('login_message', __('Multiple login of same account disallowed'));
	  	  $this->logout();
		}
	}


        $this->setNoOutput(true);
        $this->getLog()->debug('Redirect to %s', $redirect);
        $this->getApp()->redirect($redirect);
    }


    /**
     * Forgotten password link requested
     * @throws \Xibo\Exception\XiboException
     */
    public function forgottenPassword()
    {
        // Is this functionality enabled?
        $passwordReminderEnabled = $this->getConfig()->GetSetting('PASSWORD_REMINDER_ENABLED');
        $mailFrom = $this->getConfig()->GetSetting('mail_from');
        if (!(($passwordReminderEnabled === 'On' || $passwordReminderEnabled === 'On except Admin') && $mailFrom != '')) {
            throw new ConfigurationException(__('This feature has been disabled by your administrator'));
        }

        // Get our username
        $username = $this->getSanitizer()->getUserName('username');
        // Log
        $this->getLog()->info('Forgotten Password Request for ' . $username);

				try {
		         // Get our user
		         /* @var User $user */
		         $user = $this->userFactory->getByName($username);
		         // Does this user have an email address associated to their user record?
		         if ($user->email == '') {
		             throw new NotFoundException('No email');
		         }
		         // Nonce parts (nonce isn't ever stored, only the hash of it is stored, it only exists in the email)
		         $action = 'user-reset-password-' . Random::generateString(10);
		         $nonce = Random::generateString(20);
						
			 $this->saveResetToken($user->userId, $nonce);
		
		         // Make a link
		         $link = ((new HttpsDetect())->getUrl()) . $this->getApp()->urlFor('login') . '?nonce=' . $action . '::' . $nonce;
		         $this->getLog()->debug('Link is:' . $link);

/*		
						 // Send the mail
		         $mail = new \PHPMailer\PHPMailer\PHPMailer();
		         $mail->CharSet = 'UTF-8';
		         $mail->Encoding = 'base64';
		         $mail->From = $mailFrom;
		         $msgFromName = $this->getConfig()->GetSetting('mail_from_name');
		         if ($msgFromName != null)
		             $mail->FromName = $msgFromName;
		         $mail->Subject = __('Password Reset');
		         $mail->addAddress($user->email);
		         // Body
		         $mail->isHTML(true);
		         $mail->Body = $this->generateEmailBody($mail->Subject, '<p>' . __('You are receiving this email because a password reminder was requested for your account. If you did not make this request, please report this email to your administrator immediately.') . '</p><a href="' . $link . '">' . __('Reset Password') . '</a>');
				
		         if (!$mail->send()) {
		             throw new ConfigurationException('Unable to send password reminder to ' . $user->email);
		         } else {
		             $this->getApp()->flash('login_message', __('Reminder email has been sent to your email address'));
		         }	
*/		
						
						$sub = "Password Reset";
						
						$body = $this->generateEmailBody($sub, '<p>' . __('You are receiving this email because a password reminder was requested for your account. If you did not make this request, please report this email to your administrator immediately.') . '</p><a href="' . $link . '">' . __('Reset Password') . '</a>');
		
		
						$reqFile = '/var/www/html/mailer/mailer.php';
						include($reqFile);
						
						$msg = sendResetMail($user->email, $sub, $body);
					
							
		         // Audit Log
		         $this->getLog()->audit('User', $user->userId, 'Password Reset Link Granted', [
		             'IPAddress' => $this->getApp()->request()->getIp(),
		             'UserAgent' => $this->getApp()->request()->getUserAgent()
		         ]);
		
						//$this->getApp()->flash('login_message', __('Username: ' . $username . " - " . $link));
						$this->getApp()->flash('login_message', __($msg));
						
		     } catch (XiboException $xiboException) {
		         $this->getLog()->debug($xiboException->getMessage());
		         $this->getApp()->flash('login_message', __('User not found'));
		     }
		
		     $this->setNoOutput(true);
		     $this->getApp()->redirectTo('login');
    }


    /**
     * Log out
     * @param bool $redirect
     */
    public function logout($redirect = true)
    {
        $this->getUser()->touch();

        // to log out a user we need only to clear out some session vars
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);

        $session = $this->session;
        $session->setIsExpired(1);

        if ($redirect)
            $this->getApp()->redirectTo('login');
    }

    /**
     * Ping Pong
     */
    public function PingPong()
    {
        $this->session->refreshExpiry = ($this->getSanitizer()->getCheckbox('refreshSession') == 1);
        $this->getState()->success = true;
    }

    /**
     * Shows information about Xibo
     *
     * @SWG\Get(
     *  path="/about",
     *  operationId="about",
     *  tags={"misc"},
     *  summary="About",
     *  description="Information about this API, such as Version code, etc",
     *  @SWG\Response(
     *      response=200,
     *      description="successful response",
     *      @SWG\Schema(
     *          type="object",
     *          additionalProperties={
     *              "title"="version",
     *              "type"="string"
     *          }
     *      )
     *  )
     * )
     */
    function about()
    {
        $response = $this->getState();

        if ($this->getApp()->request()->isAjax()) {
            $response->template = 'about-text';
        }
        else {
            $response->template = 'about-page';
        }

        $response->setData(['version' => VERSION, 'sourceUrl' => $this->getConfig()->getThemeConfig('cms_source_url')]);
    }


    /**
     * Generate an email body
     * @param $subject
     * @param $body
     * @return string
     */
    private function generateEmailBody($subject, $body)
    {
        // Generate Body
        // Start an object buffer
        ob_start();
        // Render the template
        $this->app->render('email-template.twig', ['config' => $this->getConfig(), 'subject' => $subject, 'body' => $body]);
        $body = ob_get_contents();
        ob_end_clean();
        return $body;
    }


    public function checkSession($userID)
    {
        $dbh = PdoStorageService::newConnection();

	$sth = $dbh->prepare('
	  SELECT * FROM `session` WHERE userID = :userID AND IsExpired = 0
	');


	$sth->execute(['userID' => $userID]);

	$rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

	if(count($rows) > 0) {
	  return count($rows);
	}
	else {
	  return 0;
	}
    }


    		public function checkExpiry($userID)
    		{
				$msg = "";
    				$dbh = PdoStorageService::newConnection();

				$sth = $dbh->prepare('
          				SELECT * FROM `session` WHERE userID = :userID AND IsExpired = 0
        			');

				$sth->execute(['userID' => $userID]);
				
				foreach ($sth->fetchAll(\PDO::FETCH_ASSOC) as $arr) {
					
					$sid = $arr['session_id'];
					//$sexp = $arr['session_expiration'];
					$lastAcc = $arr['LastAccessed'];
					$current = date("Y-m-d H:i:s");

					$to_time = strtotime($current);
					$from_time = strtotime($lastAcc);
					$diff = round(abs($to_time - $from_time) / 60);
					
					$msg = "\nSID: " . $sid . " \nLast Accessed: " . $lastAcc . "\nCurrent: " . $current . "\nDiff: " . $diff;

					if($diff >= 5) {
						// Change IsExpired to 1
						$sql = "UPDATE `session` SET IsExpired = 1 WHERE userID = :userID AND IsExpired = 0";
						$stmt = $dbh->prepare($sql);
						$stmt->execute(['userID' => $userID]);
					}
					
				}
				
				return $msg;
				
    		}


		public function saveResetToken($userID, $token)
		{
			$dbh = PdoStorageService::newConnection();
			$sql = "UPDATE `user` SET resetToken = :resetToken, resetExpiry = :resetExpiry WHERE userID = :userID";
			
			$current = date("Y-m-d H:i:s");
			$expiry = date("Y-m-d H:i:s",strtotime($current." +5 minutes"));
			
			$stmt = $dbh->prepare($sql);
			$stmt->execute([
				'resetToken' => $token,
				'resetExpiry' => $expiry,
				'userID' => $userID
			]);
		}

		
		public function checkResetToken($token)
		{
			$dbh = PdoStorageService::newConnection();
			$sth = $dbh->prepare('
       			 SELECT * FROM `user` WHERE resetToken = :resetToken
      			');
			
			$sth->execute(['resetToken' => $token]);
			
			$rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

			if(count($rows) == 0) {
				// TOKEN DOES NOT EXIST
				$arr = [];
				$arr[0] = 0;  $arr[1] = 0;  $arr[2] = $token;
				return $arr;
			}
			else if(count($rows) > 0) {
				
				foreach ($rows as $arr) {					
					$u = $arr['UserID'];
					$resetExpiry = $arr['resetExpiry'];
					$current = date("Y-m-d H:i:s");				
					
					$cur = strtotime($current);
					$rT = strtotime($resetExpiry);
					
					if ($cur >= $rT) {
							// TOKEN IS EXPIRED
					    $a = [];
							$a[0] = 1;  $a[1] = 0; $a[2] = $token;
							return $a;
					}
					else {
					    $a = [];
							$a[0] = 2;  $a[1] = $u; $a[2] = $token;
							return $a;
					}
				}
				
			}
						
		}
		
		
		public function ipcrUpdate($userID)
		{
				$dbh = PdoStorageService::newConnection();

				$sql = "UPDATE `user` SET isPasswordChangeRequired = 1 WHERE userID = :userID";

				$sth = $dbh->prepare($sql);
				$sth->execute(['userID' => $userID]);
		}
		
		
		
		public function mailResetLink($from, $to, $subject, $body) {
			
			
			//var_export($subject);
			//var_export($body);
			
			//require_once "Mail.php";
			
			//$from = '<vr@quantsia.in>';
			//$to = '<vrhere87@gmail.com>';
			//$subject = 'Hi! This is a test message';
			//$body = "Hi,\n\nHow are you?";

			$headers = array(
			    'From' => $from,
			    'To' => $to,
			    'Subject' => $subject,
					'MIME-Version' => 1,
					'Content-type' => 'text/html;charset=iso-8859-1'
			);

			$smtp = Mail::factory('smtp', array(
			        'host' => 'mail.unionbankofindia.com',
			        'port' => '587',
			        'auth' => true,
			        'username' => 'nedu.support@unionbankofindia.com',
			        'password' => 'Ubi@1234'
			    ));

			$mail = $smtp->send($to, $headers, $body);

		}


}
