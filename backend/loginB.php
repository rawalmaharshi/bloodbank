<?php 
error_reporting(E_ALL);
include_once('functions.php');

session_start();

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['userType'])){ 
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$userType = $_POST['userType'];

	$db = getConnection();
	if($userType == "hospital"){
		$fetch = qExecute("SELECT * FROM hospitals WHERE hosp_email = '$email'");
		if($fetch->rowCount() == 0){
			echo json_encode(array(
					"status" => "failed",
					"message" => "No record with this email. Make sure you selected right user tab."
				));
				die();
		}
		else{
			$object = $fetch->fetchObject();
			$userId = $object->id;
			$userName = $object->hosp_name;
			$userEmail = $object->hosp_email;
			$userAddress = $object->hosp_address;
			$hospType = $object->hosp_type;
			$userState = $object->hosp_state;
			$userPass = $object->password;

			$userPass = base64_decode($userPass);

			if (password_verify($password, $userPass)) {
				//password match..Log in
				$_SESSION['hosp_id'] = $userId;
				$_SESSION['userName'] = $userName; 
				$_SESSION['userEmail'] = $userEmail;
				$_SESSION['userType'] = $userType;
				$_SESSION['userAddress'] = $userAddress;
				$_SESSION['hospType'] = $hospType;
				$_SESSION['userState'] = $userState;

				echo json_encode(array(
					"status" => "success",
					"message" => "Logged in Successfully."
				));
				die();
			}
			else{
				//password wrong
				echo json_encode(array(
					"status" => "failed",
					"message" => "Wrong Password."
				));
				die();
			}
		}
	}
	else{

		$fetch = qExecute("SELECT * FROM receivers WHERE rec_email = '$email'");
		if($fetch->rowCount() == 0){
			echo json_encode(array(
					"status" => "failed",
					"message" => "No record with this email. Make sure you selected right user tab."
				));
				die();
		}
		else{
			$object = $fetch->fetchObject();
		
			$userId = $object->id;
			$userName = $object->full_name;
			$userEmail = $object->rec_email;
			$userGender = $object->gender;
			$userAge = $object->age;
			$userMobile = $object->mobile_number;
			$userAddress = $object->rec_address;
			$userState = $object->rec_state;
			$bloodGroup = $object->blood_group;
			$userPass = $object->password;


			$userPass = base64_decode($userPass);

			if (password_verify($password, $userPass)) {
				//password match..Log in
				$_SESSION['rec_id'] = $userId;
				$_SESSION['userName'] = $userName; 
				$_SESSION['userEmail'] = $userEmail;
				$_SESSION['userType'] = $userType;
				$_SESSION['userAge'] = $userAge;
				$_SESSION['userGender'] = $userGender;
				$_SESSION['userMobile'] = $userMobile;
				$_SESSION['userAddress'] = $userAddress;
				$_SESSION['userState'] = $userState;
				$_SESSION['bloodGroup'] = $bloodGroup;

				echo json_encode(array(
					"status" => "success",
					"message" => "Logged in Successfully."
				));
				die();
			}
			else{
				//password wrong
				echo json_encode(array(
					"status" => "failed",
					"message" => "Wrong Password."
				));
				die();
			}
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