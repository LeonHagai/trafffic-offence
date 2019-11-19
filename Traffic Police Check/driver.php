<?php
  include 'include/func/connect_db.php';
  ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>E-Traffic || Driver</title>
    <link rel="stylesheet" type="text/css" href="include/ui/css/bootstrap.css">
</head>
<body>
	<nav class=" container navbar navbar-expand-sm navbar-dark text-center text-light bg-dark" style="justify-content: center;">
	  <form method="post" action="#">
	    <div class="nav-link">
	  	  <input type="text" name="driver_id" placeholder="Nationa ID" class="form-control" style="width: 200px;">
	    </div>
	    <div class="nav-link">
	  	  <input type="password" name="driver_password" placeholder="Password" class="form-control" style="width: 200px;">
	    </div>
	    <button type="submit" class="btn btn-danger" name="search_driver">Search</button>
	  </form>
	</nav>

	 <!--php qeury for searchng in the database-->
        <?php
          if (isset($_POST['search_driver'])) {
            //initialization of variables
            $driver_id=$_POST['driver_id'];
            $driver_password=$_POST['driver_password'];

            if ($driver_id==''&& $driver_password=='') {
              echo '<h5 class="text-danger text-center>Please fill all</h5>';
             }
            else{
              //select above from the database
              $driver_detials_query=$conn->query("SELECT * FROM driver WHERE drvr_id='$driver_id' ");
              //fetching offence data
              $offence_query=$conn->query("SELECT * FROM offence WHERE drvr_id='$driver_id'");
        ?>

  	    <!--display result section-->
  	    <div class="bg-light container">
  	      <form class="row">

             <?php while($driver_details_result=mysqli_fetch_assoc($driver_detials_query)):?>
      	     	<div class="col-md-6">
      	     	  <div class="image_sec">
      	     	  	<img src="include/data/img/<?=$driver_details_result['driver_img']?>" style="width: 80px; height: 80px;">
      	     	  </div>
      	     	  <div class="details_sec">
      	     	  	<div class="form-group">
      	     	  	  <label>Name</label>
      	     	  	  <input type="text" name="drvr_name" class="form-control" value="<?= $driver_details_result['drvr_name']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>ID</label>
      	     	  	  <input type="text" name="drvr_id" class="form-control" value="<?= $driver_details_result['drvr_id']?>"  readonly>
      	     	  	</div>
      	     	  </div>
      	     	  <h4 class="lead mt-2">Vehicle Details</h4>
      	     	  <div class="form-group mb-3">
      	  	     	<div class="form-group">
      	  	     	  <label>Number Plate:</label>
      	  	     	  <input type="text" class="form-control" value="<?=$driver_details_result['vhcl_plate']?>" readonly>
      	  	     	</div>
      	     	  </div>
      	     	</div>
              <div class="col-md-6 text-center mt-3">
                <!--table of offences-->
                <table class="table table-striped mt-2">
                  <thead class="thead thead-inverse">
                    <th>#</th>
                    <th>Offence</th>
                    <th>Time</th>
                  </thead>
                  <tbody>
                  <?php
                    while ($offence_result=mysqli_fetch_assoc($offence_query)):?>
                    <tr>
                      <td><?=$offence_result['id']?></td>
                      <td><?=$offence_result['drvr_offence']?></td>
                      <td><?=$offence_result['time_in']?></td>
                    </tr>
                    <?php endwhile ?>
                  </tbody>
                </table>
              </div>
              <?php endwhile ?>
              <?php } ?>
            <?php } ?>
  	      </form>
  	    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
