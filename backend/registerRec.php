<?php 
error_reporting(E_ALL);
include_once('functions.php');

if(isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['bloodgroup']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['password'])){ 

	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$bloodgroup = $_POST['bloodgroup'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$password = $_POST['password'];
	//encoding password
	$password = base64_encode(password_hash($password,PASSWORD_DEFAULT));

	$db = getConnection();

	$check = qExecute("SELECT * FROM receivers WHERE rec_email = '$email'");
	if($check->rowCount() > 0) {
		echo json_encode(array(
			"status" => "failed",
			"message" => "Email allready exists"
		));
	} 
	else {
		$res = qExecute("INSERT INTO receivers (full_name, gender, age, rec_email, mobile_number, blood_group, rec_address, rec_state, password) VALUES('$fullname', '$gender', $age, '$email', '$mobile', '$bloodgroup', '$address', '$state', '$password');");
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