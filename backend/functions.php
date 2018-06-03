<?php
error_reporting(E_ALL);
// $db = new PDO('mysql:host=us-cdbr-gcp-east-01.cleardb.net;dbname=gcp_9ccc31bf26d25a52f464', 'bb4bd4eceed032', '7728c3e8'); 
// $db = new mysqli($host,'bb4bd4eceed032', '7728c3e8', $db_name);

$timezone = "Asia/Calcutta";
date_default_timezone_set($timezone);
$datetime = date('d-m-Y H:i:s');
$date = date('Y-m-d');

function &getConnection() 
{
	//localhost
	// $db = new PDO('mysql:host=localhost;dbname=bloodbank', 'root');
	//Heroku
	$url = parse_url(getenv("DATABASE_URL"));
	$host = $url["host"];
	$db_name = substr($url["path"], 1);
	$db = new PDO('mysql:host=$host;dbname=$db_name', 'bb4bd4eceed032', '7728c3e8');
	// try {
	    
	//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//     echo "Connected successfully"; 
 //    } catch(PDOException $e)
 //    {
 //    	echo "Connection failed: " . $e->getMessage();
 //    }
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
