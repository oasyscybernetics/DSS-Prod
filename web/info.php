<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
$soapclient = new SoapClient('http://neduprod.unionbankofindia.co.in/UBI/web/xmds.php?wsdl&v=5');
 
//$response =$soapclient->RequiredFiles('5iSUwd','aebf0f303a394b2a');
 
//$response =$soapclient->Schedule('c6mp3Dlue47F','5653544FA2D2');
//$response =$soapclient->Schedule('13Aw4nG8','716bfecfc9cfb2af');
$response =$soapclient->RequiredFiles('13Aw4nG8','F4ED5F56E63D');

print_r($response);exit;
 
?>
