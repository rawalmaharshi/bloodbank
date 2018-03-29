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
      <a class="navbar-brand" href="index.php" style="display: inline">
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
				<h4 class="page-header" style="text-align:center;font-size: 18px !important">Login to BloodBank</h4>

				<ul class="nav nav-pills nav-justified" style="margin-bottom: 10px;">
				  <li class="active" id="chHos"><a data-toggle="tab" href="#hos">Hospital</a></li>
				  <li id="chRec"><a data-toggle="tab" href="#rec">Receiver</a></li>
				</ul>


				<div class="form-group">
					<label for="email">Email address</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="far fa-envelope"></i></span>
					<input type="email" class="form-control" id="email" placeholder="Enter Your Email Address">
					</div>
				</div>
				
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fas fa-lock"></i></span>
					<input type="password" class="form-control" id="password" placeholder="Enter your Password">
					</div>
				</div>
				<p id=error class="error"></p>
				<button type="submit" class="btn btn-primary btn-lg btn-block" id="submit">Submit</button>
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
	
	var userType;
	var typeCh = $("#chHos").hasClass("active");
	if(typeCh === true){
		userType = "hospital";
	}
	else
		userType = "receiver";

	var email = $("#email").val();
	var password = $("#password").val();

	if (email == '') {
		$('#error').text("Please Fill Out Your Email ID");
		$("#email").addClass("input-error");
		$('#email').focus();
		return false;
	} else if (password == '') {
		$('#error').text("Please Fill Out Your Password");
		$("#password").addClass("input-error");
		$('#password').focus();
		return false;
	} else {
		$('#error').text("");
		$.ajax({
		method  : "POST",
		url     : "backend/loginB.php",
		data    : {
					email: email, 
					password: password,
					userType: userType
				  },
		dataType: "json"
		}).done(function(res){
			if(res.status == "success"){
				$("#submit").addClass("disabled"); 
				$('#error').text(res.message);
				//redirect to main dashboard after 2 seconds.
				window.location.href = "index.php";
			} else {
				$('#error').text(res.message);
			}       
		  });
	}


});
	
	
</script>
</body>
</html>