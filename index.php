<?php 
session_start();

// if(!isset($_SESSION['userEmail']) || $_SESSION['userEmail'] == NULL){
//     header("Location: /bloodbank/login.php");
//     die();
// }

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
      <a class="navbar-brand" href="#" style="display: inline">
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
        } else echo $_SESSION['userEmail']; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- <div class="jumbotron">

  	<img src="images/2.jpg" alt="...">

</div> -->

<?php if(isset($_SESSION['userEmail'])) {
  $name = $_SESSION['userName']; 
  echo "
    <div class='container'>
      <div class='row'>
        <div class='col-md-12 col-xs-12'>
          <h1>Welcome, $name</h1>
        </div>
      </div>
    </div>
  " ; }?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h3 style="text-align:center;">Available Blood Samples</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Hospital Name</th>
						<th>Blood Group</th>
						<th>Units (1 Unit = 350mL)</th>
						<th>Request Sample</th>
					</tr>
				</thead>
				<tbody id = "bloodSamples">
<!--					AJAX CONTENT-->
				</tbody>
			</table>
		</div>
	</div>
</div>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	
	$.ajax({
		method  : "POST",
		url     : "backend/getAvailableSamples.php",
		dataType: "json"
		}).done(function(res){
			if(res.status == "success"){
				//add them to the table
				    $("#bloodSamples").append(
            // "<tr data-number="+ order['order_id']+">"+
            // "<td>"+order['order_time']+"</td>"+
            // "<td class='"+cls+"' >"+order_type+"</td>"+
            // "<td>"+order['bid_amt']+"</td>"+
            // "<td>"+order['volume']+"</td>"+
            // "<td>"+order['order_amt']+"</td>"+
            // "<td><i class='fa fa-times cancel_order redColor' style='font-size : 21px'></i></td>"+
            // "</tr>"
             );
			} else {
				// do nothing..table is empty or maybe show a message that no samples are available
			}       
		  });
	
	
})	
	
</script>
</body>
</html>