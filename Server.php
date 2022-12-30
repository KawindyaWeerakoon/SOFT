<?php

ini_set("soap.wsdl_cache_enabled", "0");

require_once __DIR__ . "/vendor/autoload.php";

$class = "Bookcatalog\BookService";

$wsdl = 'converter.wsdl';

$server=new SoapServer($wsdl,['uri'=>"http://localhost/SOFT/Server.php"]);

$server->setClass($class);

$server->handle();

?>