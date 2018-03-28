<?php 
error_reporting(E_ALL);
include_once('functions.php');

if(isset($_POST['hospname']) && isset($_POST['email']) && isset($_POST['type']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['password'])){ 

	$hospname = $_POST['hospname'];
	$email = $_POST['email'];
	$type = $_POST['type'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$password = $_POST['password'];
	//encoding password
	$password = base64_encode(password_hash($password,PASSWORD_DEFAULT));

	$db = getConnection();

	$check = qExecute("SELECT * FROM hospitals WHERE hosp_email = '$email'");
	if($check->rowCount() > 0) {
		echo json_encode(array(
			"status" => "failed",
			"message" => "Email allready exists"
		));
	} 
	else {
		$res = qExecute("INSERT INTO hospitals (hosp_name, hosp_email, hosp_type,  hosp_address, hosp_state, password) VALUES('$hospname', '$email', '$type', '$address', '$state', '$password');");
		if($res){
			echo json_encode(array(
			"status" => "success",
			"message" => "Successfully registered with blood bank system. Login to Continue."
			));
			die();
		}
		else{
			echo json_encode(array(
			"status" => "failed",
			"message" => "Error registering. Please try again later."
			));
			die();
		}
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