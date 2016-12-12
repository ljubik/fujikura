<?php
$db_user="fuji";//userName
$db_pass="fujikura";//password
$db_serv="db1.cityhost.com.ua";//hostName
$db_name="fuji";//dbName

//reinit params for my local
if (!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'reg1.loc'){
	$db_user="root";//userName
	$db_pass="";//password
	$db_serv="localhost";//hostName
	$db_name="komax";//dbName
}

$mysqli= new mysqli($db_serv, $db_user, $db_pass, $db_name);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno()){
		printf("Impossible connect to database, error N ", mysqli_connect_error());
		exit;
	}

?>