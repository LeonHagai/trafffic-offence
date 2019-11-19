<?php 
session_start();
  include 'include/func/connect_db.php';
  ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>E-Traffic || Offence</title>
    <link rel="stylesheet" type="text/css" href="include/ui/bootstrap4.3/css/bootstrap.css">
</head>
<body>
	<div class="container">	
	<div class="bg-dark text-light text-center py-3 mt-5">
	  <h4 class="lead">Record Offence</h4>
	</div>	
 	  <div class="row">
 	  	<div class="col"></div>
 	  	<div class="col">
 	  		<?php 
 	  		  if (isset($_POST['driver_offence'])) {
 	  		  	$driver_offence=$_SESSION['ss_driver_id'];
 	  		  }

 	  		 ?>
 	  			<!--offence form--->
		  <form class="form-group mt-3" action="#" method="POST">
		    <input type="text" name="driver_id" class="form-control mb-2" value="<?=$driver_offence?>" readonly>
		 	<select class="form-control" name="driver_offence">
			  <option>Crime Committed</option> 
			  <option value="Overspeeding">Overspeeding ksh : 10000</table></option>
			  <option value="Use of Mobile while driving">Use of Mobile while driving ksh : 28000</option>
			  <option value="Sitbelt not fasten">Sitbelt not fasten >ksh : 50000></option>
			  <option value="Driving without car insurance">Driving without car insurance ksh : 60000</option>
			  <option value="Causing obstraction on road">Causing obstraction on road ksh : 75000</option>
			  <OPTION VALUE="Driving while drunk">Driving while drunk ksh : 80000</option>
			  <option value="Rudeness">Rudeness ksh : 90000</option>
			  <option value="Learner without L sign">Learner without L sign ksh : 100000</option>
			  <option value="Learner without L sign">Walking on pedestrian lane  ksh : 700000</option>
		 	</select>  	  
		    <!--button for submittion of offence-->
		    <input type="submit" name="submit_offence" class="btn btn-outline-primary" value="Submit">   	  	  	
		  </form>

		<?php 
		  if (isset($_POST['submit_offence'])) {
		    $driver_offence=$_POST['driver_offence'];
		    $driver_id=$_POST['driver_id'];

		    if ($driver_offence=='' || $driver_offence=='Crime Committed') {
		      echo '<h4 class="lead text-danger">No offence chosen</h4>';
		    }
		    else if($driver_id==''){
		      echo '<h4></h4>';
		    }
		    else{
		      $submit_query=$conn->query("INSERT INTO offence(drvr_id, drvr_offence) VALUES ('$driver_id', '$driver_offence')");
					// echo '<h4 class="lead text-success">Offence Updated!</h4>';
					echo "<script>alert('Offence Updated.!'); location.href='index.php ';</script>";					
		    }
		  }
		 ?>
  
 	  	</div>
 	  	<div class="col"></div>
 	  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	 
</body>
</html>