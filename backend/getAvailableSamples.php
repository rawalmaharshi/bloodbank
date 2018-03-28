<?php 
error_reporting(E_ALL);
include_once('functions.php');

$db = getConnection();
$fetch = qExecuteObject("SELECT * FROM blood_samples");
if(!$fetch){
	echo json_encode(array(
		"status" => "failed",
		"message" => "Blood Samples aren't available at any registered hospital. Come back later to check."
	));
	die();
} else{
	print_r($fetch);die();

	echo json_encode(array(
		"status" => "success",
		"message" => "These are the available blood samples",
		"data" => $fetch
	));
	die();
}

?>