<?php 
error_reporting(E_ALL);
include_once('functions.php');

if(isset($_POST['hosp_email']) && isset($_POST['rec_id'])){

	$rec_id = $_POST['rec_id'];
	$hosp_email = $_POST['hosp_email'];
	
	$db = getConnection();
	$fetch = qExecuteObject("SELECT id as hosp_id, hosp_email FROM hospitals WHERE hosp_email = '$hosp_email'");
	
	if($fetch){
		$hosp_id = $fetch->hosp_id;

		$insert = qExecute("INSERT INTO blood_requests (hosp_id, rec_id) VALUES ($hosp_id, $rec_id);");
		if($insert){
			echo json_encode(array(
			"status" => "success",
			"message" => "Successfully placed your request for this blood sample."
			));
			die();
		}
		else{
			echo json_encode(array(
			"status" => "failed",
			"message" => "Unable to place request. Try again later."
			));
			die();
		}
	} 
	else{
	echo json_encode(array(
			"status" => "failed",
			"message" => "Error in finding hospital in database."
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