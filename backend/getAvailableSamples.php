<?php 
error_reporting(E_ALL);
include_once('functions.php');

// $db = getConnection();
$url = parse_url(getenv("DATABASE_URL"));
	$host = $url["host"];
	$db_name = substr($url["path"], 1);
$db = new mysqli($host,'bb4bd4eceed032', '7728c3e8', $db_name);
$fetch = qExecuteAssocArray("SELECT auto_id, blood_group, count, hosp_id, hosp_name, hosp_address, hosp_state, hosp_email FROM blood_samples INNER JOIN hospitals ON blood_samples.hosp_id = hospitals.id");
if(!$fetch){
	echo json_encode(array(
		"status" => "failed",
		"message" => "Blood Samples aren't available at any registered hospital. Come back later to check."
	));
	die();
	
} else{

	echo json_encode(array(
		"status" => "success",
		"message" => "These are the available blood samples",
		"data" => $fetch
	));
	die();
}

?>