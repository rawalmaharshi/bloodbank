<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blood Bank System</title>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bower_components/font-awesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#" style="display: inline">
        <img alt="Brand" src="images/logo.png" style="height:30px; width: 40px">
        <h4>bloodShala</h4>
      </a>
    </div>


    <div class="collapse navbar-collapse" id="navbar">
      
      <ul class="nav navbar-nav navbar-right">
      	<li>
        	<button type="button" class="btn btn-default navbar-btn"><a href="login.php">Login</a></button>
      	</li>
      	<li>
      		<button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Register
      		<span class="caret"></span></button>
      		<ul class="dropdown-menu">
  				<a href="registerH.php"><li class="dd-item">Hospital</li></a>
  				<a href="registerR.php"><li class="dd-item">Receiver</li></a>
    		</ul>
      	</li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 col-sm-12 forms">
			<form novalidate>
				<h4 class="page-header" style="text-align:center;font-size: 18px !important">Reciever Register to BloodBank</h4>
				<div class="form-group">
					<label for="fullname">Full Name<span class="req">*</span></label>
					<input type="text" class="form-control" id="fullname" placeholder="e.g. Maharshi Rawal">
				</div>
				<div class="form-group">
					<label for="gender">Gender<span class="req">*</span></label>
					<select class="form-control" name="gender" id="gender">
					  <option>Male</option>
					  <option>Female</option>
					  <option>Other</option>
					</select>
				</div>
				<div class="form-group">
					<label for="age">Age<span class="req">*</span></label>
					<input type="number" class="form-control" id="age" placeholder="Enter your Age in years" min="18" max="70">
				</div>
				<div class="form-group">
					<label for="email">Email address<span class="req">*</span></label>
					<div class="input-group">
					<span class="input-group-addon"><i class="far fa-envelope"></i></span>
					<input type="email" class="form-control" id="email" placeholder="e.g. rawalmaharshi@gmail.com">
					</div>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile Number<span class="req">*</span></label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fas fa-mobile"></i></span>
					<input type="text" class="form-control" id="mobile" placeholder="Enter your 10-digit mobile number">
					</div>
				</div>
				<div class="form-group">
					<label for="bloodgroup">Blood Group<span class="req">*</span></label>
					<select class="form-control" name="bloodgroup" id="bloodgroup">
					  <option>A+</option>
					  <option>A-</option>
					  <option>B+</option>
					  <option>B-</option>
					  <option>AB+</option>
					  <option>AB-</option>
					  <option>O+</option>
					  <option>O-</option>
					</select>
				</div>
				<div class="form-group">
					<label for="address">Address<span class="req">*</span></label>
					<input type="text" class="form-control" id="address" placeholder="Enter your full address along with Pin Code">
				</div>
				<div class="form-group">
					<label for="state">Residence State<span class="req">*</span></label>
					<select class="form-control" name="state" id="state">
					  <option>Andaman and Nicobar Islands</option>
					  <option>Andhra Pradesh</option>
					  <option>Arunachal Pradesh</option>
					  <option>Assam</option>
					  <option>Bihar</option>
					  <option>Chandigarh</option>
					  <option>Chhattisgarh</option>
					  <option>Dadra and Nagar Haveli</option>
					  <option>Daman and Diu</option>
					  <option>Delhi NCR</option>
					  <option>Goa</option>	
					  <option>Gujarat</option>
					  <option>Haryana</option>
					  <option>Himachal Pradesh</option>
					  <option>Jammu and Kashmir</option>
					  <option>Jharkhand</option>
					  <option>Karnataka</option>
					  <option>Kerala</option>
					  <option>Lakshadweep</option>
					  <option>Madhya Pradesh</option>
					  <option>Maharashtra</option>
					  <option>Manipur</option>
					  <option>Meghalaya</option>
					  <option>Mizoram</option>
					  <option>Nagaland</option>
					  <option>Odisha</option>
					  <option>Puducherry</option>
					  <option>Punjab</option>
					  <option>Rajasthan</option>
					  <option>Sikkim</option>
					  <option>Tamil Nadu</option>
					  <option>Telangana</option>
					  <option>Tripura</option>
					  <option>Uttar Pradesh</option>
					  <option>Uttarakhand</option>
					  <option>West Bengal</option>
					</select>
				</div>
				<div class="form-group">
					<label for="password">Password<span class="req">*</span></label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fas fa-lock"></i></span>
					<input type="password" class="form-control" id="password" placeholder="Enter your Password">
					</div>
				</div>
				<p id=error class="error"></p>
				<button type="submit" class="btn btn-danger btn-lg btn-block" id="submit">Submit</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>




<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
$("#submit").on("click", function(e){
	e.preventDefault();
	
	var fullname = $("#fullname").val();
	var gender = $("#gender").val();
	var age = $("#age").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	var bloodgroup = $("#bloodgroup").val();
	var address = $("#address").val();  
	var state = $("#state").val(); 
	var password = $("#password").val();
	var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var mobile_pattern = /^[789][0-9]{9}$/;
	var pass_pattern = new RegExp("^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

	if (fullname == '') {
		$('#error').text("Please Fill Out Your Name ");
		$("#fullname").addClass("input-error");
		$('#fullname').focus();
		return false;
	} else if (gender == '') {
		$('#error').text("Please Select Your Gender");
		$("#gender").addClass("input-error");
		$('#gender').focus();
		return false;
	} else if (age == '') {
		$('#error').text("Please Fill Out Your Age");
		$("#age").addClass("input-error");
		$('#age').focus();
		return false;
	} else if (email == '') {
		$('#error').text("Please Fill Out Your Email ID");
		$("#email").addClass("input-error");
		$('#email').focus();
		return false;
	} else if (!(email.match(email_pattern))) {
		$('#error').text("Invalid Email Pattern, Please Check Out Your Email");
		$("#email").addClass("input-error");
		$('#email').focus();
		return false;
	} else if (mobile == '') {
		$('#error').text("Please Fill Out Your Mobile Number")
		$("#mobile").addClass("input-error");
		$('#mobile').focus();
		return false;
	} else if (!(mobile.match(mobile_pattern))) {
		$('#error').text("Invalid Mobile Number, Fill Out Your 10 digit Mobile Number");
		$("#mobile").css("border","1px solid rgba(220,10,10,0.5)");
		$('#mobile').focus();
		return false;
	} else if (bloodgroup == '') {
		$('#error').text("Please Select Your BloodGroup");
		$("#bloodgroup").addClass("input-error");
		$('#bloodgroup').focus();
		return false;
	} else if (address == '') {
		$('#error').text("Please Fill Out Your Address");
		$("#address").addClass("input-error");
		$('#address').focus();
		return false;
	} else if (state == '') {
		$('#error').text("Please Select Your State of Residence");
		$("#state").addClass("input-error");
		$('#state').focus();
		return false;
	} else if (password == '') {
		$('#error').text("Please Fill Out Your Password");
		$("#password").addClass("input-error");
		$('#password').focus();
		return false;
	} else if (!(password.match(pass_pattern))) {
		$('#error').text("Password should be a combination of an Uppercase alphabet, a number, a special character and must be of minimum 8 characters");
		$("#password").addClass("input-error");
		$('#password').focus();
		return false;
	} else {
		$('#error').text("");
		$.ajax({
		method  : "POST",
		url     : "backend/registerRec.php",
		data    : {
					fullname: fullname,
					gender: gender,
					age: age, 
					email: email, 
					mobile: mobile, 
					bloodgroup: bloodgroup,
					address: address, 
					state: state,
					password: password,
				  },
		dataType: "json"
		}).done(function(res){
			if(res.status == "success"){
				$("#submit").addClass("disabled"); 
				$('#error').text(res.message);
			} else {
				$('#error').text(res.message);
			}       
		  });
	}


});
	
	
</script>
</body>
</html>