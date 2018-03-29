<?php 
session_start();

// if(!isset($_SESSION['userEmail']) || $_SESSION['userEmail'] == NULL){
//     header("Location: login.php");
//     die();
// }
print_r($_SESSION);

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
<body><nav class="navbar navbar-default">
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
        } else { echo $_SESSION['userEmail']; ?>
        <div>
        <p><a href="backend/logout.php">Logout</a></p>
        </div>
        <?php } ?>
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
	
<div class="container" id="hospitalContainer">
	<row>
		<div class="col-md-12 col-xs-12">
			<p>
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Add Samples </button>
			<span class="pull-right">
			<a href="viewRequests.php"><button type="button" class="btn btn-primary btn-lg"> View Requests </button></a>
			</span>
			</p>
		</div>
	</row>
</div>

<!-- Modal to add new blood samples -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD NEW BLOOD SAMPLES</h4>
      </div>
      <div class="modal-body">
       <form>	
			<div class="form-group">
				<label for="bloodgroup">Blood Group</label>
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
				<label for="count">Count(Units)</label>
				<input type="number" class="form-control" id="count" placeholder="Enter the count of blood samples available" min="0" max="50">
			</div>

			<p id="info" class="error"></p>
	   </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
        <button type="button" class="btn btn-primary" id="addSamples">ADD</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h3 style="text-align:center;">Available Blood Samples</h3>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Hospital Name</th>
						<th>Hospital State</th>
						<th>Hospital Email</th>
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

<div class="container alertDiv">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="alert" id = "alertType" style="width: 80%;">
    			<a href="#"></a>
   			   <strong id="infoText"></strong>
			</div>
		</div>
	</div>
</div>

<!-- <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
 -->


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
var loggedUserType = "";
var userBloodGroup = "";
var selectedBlood = "";
<?php if(isset($_SESSION['userType'])) { ?>
	loggedUserType = "<?php print_r($_SESSION['userType']); ?>";
	<?php if(isset($_SESSION['hosp_id'])) { ?>
		$("#hospitalContainer").css("display", "block");
		var hospitalId = "<?php print_r($_SESSION['hosp_id']); ?>";
// console.log("user: ", loggedUserType);
<?php } } ?>
	

$(document).ready(function(){
  
	$.ajax({
		method  : "POST",
		url     : "backend/getAvailableSamples.php",
		dataType: "json"
		}).done(function(res){
			if(res.status == "success"){
				//add them to the table
        var data = res.data;
        for (var i = 0; i < data.length; i++){
          var sample = data[i];
          for (var key in sample){
              var attrName = key;
              var attrValue = sample[key];
          }
          $("#bloodSamples").append(
            "<tr sample-number="+ sample['auto_id']+">"+
            "<td>"+sample['hosp_name']+"</td>"+
            "<td>"+sample['hosp_state']+"</td>"+
            "<td>"+sample['hosp_email']+"</td>"+
            "<td>"+sample['blood_group']+"</td>"+
            "<td>"+sample['count']+"</td>"+
            "<td>" + "<button class='btn reqSample'>Request</button>" + "</td>"+
            "</tr>"
             );
        }  
			} else {
				// do nothing..table is empty or maybe show a message that no samples are available
			}       
		  });
}); // ready function ends here	




setTimeout(function(){ 
  $(".reqSample").on("click", function(){
	  var sample_id = $(this).parent("td").parent("tr").attr("sample-number");
	  // console.log(sample_id);

	  if(loggedUserType == "hospital")
	    $(".reqSample").addClass("disabled");

	  else if(loggedUserType == "")//user not logged in ... redirect to login to php
	    window.location.href = "login.php";
		 
	  else if(loggedUserType == "receiver"){
	  	<?php  if(isset($_SESSION['bloodGroup'])) {?>
	  	userBloodGroup = "<?php echo $_SESSION['bloodGroup']; ?>";
	  	<?php } ?>
	  	// console.log(userBloodGroup);
	  	selectedBlood = $(this).parent("td").prev().prev().text();
	  	// console.log(selectedBlood);

	  	if(userBloodGroup != selectedBlood) {
	  		$(".alertDiv").css("display", "block");
	  		$("#alertType").removeClass("alert-success");
	  		$("#alertType").addClass("alert-danger");
	  		$("#infoText").text("You cannot request this blood group sample.");
	  		setTimeout(function(){ $(".alertDiv").css("display", "none"); }, 2000);
	 	}
	 	else{
	 		// ajax for blood sample request
	 		<?php  if(isset($_SESSION['bloodGroup'])) {?>
	  			var rec_id = "<?php echo $_SESSION['rec_id']; ?>";
	  		<?php } ?>
	 		
	 		var hosp_email = $(this).parent("td").prev().prev().prev().text();
	 		console.log(rec_id, hosp_email);
	 		$.ajax({
		 	method  : "POST",
		 	url     : "backend/requestSample.php",
		 	data: {
		 			rec_id: rec_id,
	         		hosp_email: hosp_email
		 	},
		 	dataType: "json"
		 	}).done(function(res){	
		 	$(".alertDiv").css("display", "block");
		 	$("#alertType").removeClass("alert-danger");
	  		$("#alertType").addClass("alert-success");
		 	$("#infoText").text("Successfully requested for sample.");
	  		setTimeout(function(){ $(".alertDiv").css("display", "none"); }, 2000); 
		 	});

	 	}	
	  
	  }//user = receiver
  });//onClick

}, 1000);

$("#addSamples").on("click", function(){
	var bloodgroup = $("#bloodgroup").val();
	var count = $("#count").val();
	
	 $.ajax({
	 	method  : "POST",
	 	url     : "backend/addSamples.php",
	 	data: {
	 			bloodgroup: bloodgroup,
	 			count: count,
         		hosp_id: hospitalId
	 	},
	 	dataType: "json"
	 	}).done(function(res){	
	 		$("#info").text(res.message);  
	 	});
});
	
</script>
</body>
</html>