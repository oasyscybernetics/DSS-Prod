<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

$url     = "http://10.128.232.239/UBI/web/xmds.php?wsdl&v=5";
$context = stream_context_create(array(
        'authentication'=> SOAP_AUTHENTICATION_DIGEST,
        'style'         => SOAP_RPC,
        'use'           => SOAP_ENCODED,
        'soap_version'  => SOAP_1_2,
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
            'ciphers' => 'RC4-SHA',
            'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
        ),       

));


libxml_disable_entity_loader(false); 

$soapclient = new SoapClient($url, array( 'ssl_method' => SOAP_SSL_METHOD_TLS,'encoding'=>'UTF-8','stream_context' => $context,'https' => array( 'curl_verify_ssl_peer' => false,'curl_verify_ssl_host'  => false),'cache_ttl' => 86400,'trace' => true,'exceptions'    => true));


//$response =$soapclient->RegisterDisplay('5iSUwd','a0dd6aa2553a9a77','test','Android',1,10,'android','54:47:41:05:A2:80','jjj','test1@gmail.com','9639639639','64bc62a4bfc0226bc93cba3809c43d21','MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmejkOE+Vyp30lQGfJVb9Hr1PHWvLdU+Q
//VujCqGOn2I8Gl9oZzxgpPJ94Z1/ykDBiXRdZf56Pdwx9lP4CqIo2ZQV1mYwVsIS/BX//6TeCFNmR
//eemncIIke+egrGwGqRg8YpjX3z9OPbocAz+jfECvV/WGsmf0HeNlUx1qcuDsFNXItacS4y84h8vB
//OXgA6Ijgima3glYrDbh7jaP0tafmcayRZQK/U5nzr5+u/znNgs8LjWybDaBiBZCVaD6LnskMYII5
//A58LWnarPBUfKYO2UpvlfWGbvPm/+Q7jOmyj2XPlBunQJMk1mWOEwLYcC/+3Ixrycun+hFd3moQ2
//BzDiIwIDAQAB','3.0'); 

$response =$soapclient->RequiredFiles('13Aw4nG8','F4ED5F56E63D');

print_r($response);exit;

?>


