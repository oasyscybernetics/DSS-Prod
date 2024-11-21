<?php

defined('XIBO') or die(__("Sorry, you are not allowed to directly access this page.") . "<br />" . __("Please press the back button in your browser."));

global $dbhost;
global $dbuser;
global $dbpass;
global $dbname;

$dbhost = 'localhost';
$dbuser = 'ubi_admin';
$dbpass = 'gm95ku893';
$dbname = 'ubi_ds';

define('SECRET_KEY', 'c6mp3D1ue47F');

// Additional Monolog handlers/processors to be registered
// $logHandlers = [];
// $logProcessors = [];

// Additional Middleware
// $middleware = [];
// $authentication = ;
