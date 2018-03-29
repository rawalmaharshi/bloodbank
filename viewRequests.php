<?php 
error_reporting(E_ALL);
include_once('backend/functions.php');
session_start();

if(isset($_SESSION['hosp_id'])){

	$hosp_id = $_SESSION['hosp_id'];

	$db = getConnection();
	$fetch = qExecuteAssocArray("SELECT auto_id, full_name, mobile_number, rec_state, blood_group FROM blood_requests, hospitals, receivers WHERE hosp_id = $hosp_id AND hosp_id = hospitals.id AND rec_id = receivers.id;");
}
else{
    header("Location: index.php");
	die();
}
?>

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
        <?php if(!isset($_SESSION['userEmail'])){  
        echo "<li>
          <button type='button' class='btn btn-default navbar-btn'><a href='login.php'>Login</a></button>
        </li>
        <li>
          <button type='button' class='btn btn-default navbar-btn dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>Register
          <span class='caret'></span></button>
          <ul class='dropdown-menu'>
            <a href='registerH.php'><li class='dd-item'>Hospital</li></a>
            <a href='registerR.php'><li class='dd-item'>Receiver</li></a>
          </ul>
        </li>";
        } else { echo $_SESSION['userEmail']; ?>
        <div>
        <p><a href="backend/logout.php">Logout</a></p>
        </div>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-12 col xs-12">
			<h1>Blood Sample Requests</h1>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Receiver Name</th>
						<th>Mobile Number</th>
						<th>State</th>
						<th>Blood Group</th>
					</tr>
				</thead>
				<tbody id = "requestedSamples">
					<?php foreach ($fetch as $key => $value) { ?>
					<tr>
						<td><?php echo $fetch[$key]['full_name']; ?></td>
						<td><?php echo $fetch[$key]['mobile_number']; ?></td>
						<td><?php echo $fetch[$key]['rec_state']; ?></td>
						<td><?php echo $fetch[$key]['blood_group']; ?></td>
					</tr>	
					<?php  } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>