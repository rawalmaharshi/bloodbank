<?php
error_reporting(E_ALL);


$timezone = "Asia/Calcutta";
date_default_timezone_set($timezone);
$datetime = date('d-m-Y H:i:s');
$date = date('Y-m-d');

function &getConnection() 
{
	$db = new PDO('mysql:host=localhost;dbname=bloodbank', 'root'); 
	return $db;
}

function qExecute($sql)
{
	// echo $sql;
	global $db;
	return $db->query($sql);
}

function qExecuteAssocArray($sql)
{   
	global $db;
	$rs = $db->query($sql);
	return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function qExecuteObject($sql)
{
	// echo $sql;
	global $db;
	$rs = $db->query($sql);
	return $rs->fetch(PDO::FETCH_OBJ);
}

function closeConnection ($db)
{
	$db = NULL;
}

?>
