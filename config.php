<?php

require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
	define("BASE_URL", "http://localhost/7upcar/");
	$config['dbname'] = '7upcar';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}else{
	define("BASE_URL", "http://sistema.akxweb.com.br/");
	$config['dbname'] = '7upcar';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}

global $db;
try{
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

}catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}