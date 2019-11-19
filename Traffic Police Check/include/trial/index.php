<?php 
  $servername='localhost';
  $username='root';
  $pw='#pM@tErry213191';

  $conn=new mysqli($servername, $username, $pw);
  ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="../ui/bootstrap4.3/css/bootstrap.css">
  </head>
  <body class="container">
  	<form action="#" method="post" class="form-control">
      <div class="form-group">
       <input type="text" name="offence_id" placeholder="Offence ID">        
      </div>
        <div class="form-group">
      <input type="text" name="driver_offence" placeholder="driver offence">      
      </div>
        <div class="form-group">
      <input type="text" name="offence_fine" placeholder="offence fine">     
      </div>

  	  <button type="submit" name="register_offence">Register</button>
  	  <button type="submit" name="update_offence">Update</button>
  	</form>
  	<?php 
		  if (isset($_POST['register_offence'])) {
		    $offence_id=$_POST['offence_id'];
		    $driver_offence=$_POST['driver_offence'];
		    $offence_fine=$_POST['offence_fine'];

		    if ($offence_id=='' || $driver_offence=='' || $offence_fine=='') {
		      echo '<h4 class="lead text-danger">BLAKNS</h4>';
		    }
		    else{
		      $submit_query=$conn->query("INSERT INTO offence(offence_id, driver_offence, offence_value) VALUES ('$offence_id', '$driver_offence', '$offence_fine')");
		      echo '<h4 class="lead text-success">Offence Updated!</h4>';
		    }
		  }
		 ?>
  </body>
</html>