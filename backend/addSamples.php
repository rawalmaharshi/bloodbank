<?php 
error_reporting(E_ALL);
include_once('functions.php');

$db = getConnection();
if(isset($_POST['bloodgroup']) && isset($_POST['count']) && isset($_POST['hosp_id'])){

	$bloodgroup = $_POST['bloodgroup'];
	$count = $_POST['count'];
	$hosp_id = $_POST['hosp_id'];

	$fetch = qExecute("INSERT INTO blood_samples (hosp_id, blood_group, count) VALUES ($hosp_id, '$bloodgroup', $count)");
	
	if(!$fetch){
	echo json_encode(array(
		"status" => "failed",
		"message" => "Could'nt add blood samples."
	));
	die();
	
} else{

	echo json_encode(array(
		"status" => "success",
		"message" => "Sucessfully added blood samples. Continue to add more or close modal."
	));
	die();
}
}
else{
	echo json_encode(array(
			"status" => "failed",
			"message" => "Missing parameters"
	));
	die();
}
?>