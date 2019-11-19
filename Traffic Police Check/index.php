<?php
  session_start();
  include 'include/func/connect_db.php';
  if (isset($_POST['search_driver'])) {
    $_SESSION['driver_id'] = $_POST['driver_id'];
  }
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>E-Traffic || Home</title>
    <link rel="stylesheet" type="text/css" href="include/ui//css/bootstrap.css">
    <!-- script -->
    <script>
      document.getElementById('search').addEventListener('click', loadUser);

      function loadUser(){
        var xhr=new XMLHttpRequest();
        xhr.open('GET', 'search.php', true);

        xhr.onload=function(){
          var users=JSON.parse(this.responseText);

          var output='';
          
          output += '<ul>'+
            '<li> Id: '+users.drvr_name+'</li>'+
            '<li> Id: '+users.drvr_id+'</li>'+
            '<li> Id: '+users.s=]+'</li>'+
            '<li> Id: '+users.+'</li>'+
            '<li> Id: '+users.+'</li>'+
            '<li> Id: '+users.+'</li>'+
            '<li> Id: '+users.+'</li>'+
            '<li> Id: '+users.+'</li>'+
        }
      }
    </script>
    <!-- end script -->
  
  </head>
  <body>

  <nav class="navbar ">
      <div class="nal-link ml-auto">
        <a href="driver.php" class="btn btn-sm btn-success">Driver Portal</a>
      </div>
  </nav>

    <div class="row" style="justify-content: center;">
  	  <div class="col-md-1"></div>
  	  <div class="col-md-8 text-center mt-5">
  	    <div class="bg-dark py-3 my-1 text-light">
  	       <h3>E-Traffic Police Check</h3>
           <!--registering citizen-->
           <!-- <button class="btn btn-outline-primary" data-toggle="collapse" data-target="#register" aria-controls="nav_C-BID">Register
           </button> -->
           <a href="#register" data-toggle="collapse"  class="btn btn-outline-primary btn-sm">Register</a>
           
  	    </div>
        <!--form for reegitration of citizen-->
        <?php
          if (isset($_POST['register'])) {
            //create varibles
            $driver_name=$_POST['driver_name'];
            $driver_id=$_POST['driver_id'];
            $driver_img=$_POST['driver_img'];
            $driver_nationality=$_POST['driver_nationality'];
            $driver_password1=$_POST['driver_password1'];
            $driver_password2=$_POST['driver_password2'];
            $driver_age=$_POST['driver_age'];
            $driver_residence=$_POST['driver_residence'];
            $driver_licence=$_POST['driver_licence'];
            $driver_bldgrp=$_POST['driver_bldgrp'];
            $vehicle_plate=$_POST['vehicle_plate'];
            $vehicle_insurance=$_POST['vehicle_insurance'];
            $vehicle_org=$_POST['vehicle_org'];
            //checking if all fields are not = null
            if ($driver_name!== '' && $driver_id!=='' && $driver_nationality!=='' && $driver_age!=='' && $driver_residence!=='' && $driver_licence!=='' && $driver_bldgrp!=='' && $vehicle_plate!=='' && $vehicle_insurance!=='') {
                //checking if the charactes are less than "<NNN"
              if (strlen($driver_id)<4) {
                echo '<h4 class="lead text-danger" role="danger">';
                echo "DRIVER LICENCE DOES NOT EXIST.<br>10 CHARACTERS";
                echo '<h4>';
              }
              else if (strlen($vehicle_plate)<3) {
                echo '<h4 class="lead text-danger" role="danger">';
                echo "THE PLATE IS TOO SHORT";
                echo '<h4>';
              }
              else{
                //registration of citizen
                $register_user_query=$conn->query("INSERT INTO driver(drvr_name, drvr_id, drvr_img, drvr_nat, drvr_pswd, drvr_age,
                                                  drvr_residence, drvr_licence, drvr_bldgrp, vhcl_plate, vhcl_insurance, vhcl_org) VALUES ('$driver_name', '$driver_id', '$driver_img', '$driver_nationality', '$driver_password1', '$driver_age', '$driver_residence', '$driver_licence', '$driver_bldgrp', '$vehicle_plate', '$vehicle_insurance', '$vehicle_org')");
                if ($register_user_query) {?>
                  <script type="text/javascript">
                    alert("Registration Successfull:")
                  </script><?php
                  header('location: index.php');
                }
              }
            }
            else{
              echo '<div class="text-center text-danger">';
              echo '<h5 class="lead">Please fill all!</h5>';
              echo '</div>';
            }
          }
         ?>
        <!--collapsable for registering-->
        <div class="collapse text-center" id="register">
          <!--form for registering-->
          <form class="mb-5" action="index.php" method="POST">
            <!--personal details-->
            <div class="mt-3 py-2 bg-dark text-light">
              <h4 class="lead">Personal Details</h4>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="driver_name" class="form-control">
                </div>
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" name="driver_id" class="form-control">
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" name="driver_nationality" class="form-control">
                </div>
                <div class="form-group">
                  <label>Age</label>
                  <input type="text" name="driver_age" class="form-control">
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Residence</label>
                  <input type="text" name="driver_residence" class="form-control">
                </div>
                <div class="form-group">
                  <label>License Expiry</label>
                  <input type="text" name="driver_licence" class="form-control">
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Blood group</label>
                  <input type="text" name="driver_bldgrp" class="form-control">
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="driver_img"  accept=".png, .jpg, .jpeg">
                </div>
              </div>
            </div>
            <!--vehicle details-->
            <div class="mt-3 py-2 bg-dark text-light">
              <h4 class="lead">Vehicle Details</h4>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Plate</label>
                  <input type="text" name="vehicle_plate" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurance</label>
                  <input type="text" name="vehicle_insurance" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Organizaiton <small><i>(if any)</i></small></label>
                  <input type="text" name="vehicle_org" class="form-control">
                </div>
              </div>
            </div>
            <!--password details-->
            <div class="mt-3 py-2 bg-dark text-light">
              <h4 class="lead">Password Details</h4>
            </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="driver_password1" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="driver_password2" class="form-control">
                </div>
              </div>
            </div>
            <!--submittion btns-->
            <div class="text-center">
              <input type="submit" name="register" class="btn btn-outline-primary" value="Register">
            </div>
          </form>
        </div>

        <!--form for searching driver-->
  	    <form method="post" action="index.php" >
  	  	  <div class="form-froup">
  	  	    <label>National ID:</label>
  	  	    <input type="text" name="driver_id" class="form-control">
  	  	  </div>
  	  	  <div class="form-group">
          <input type="submit" name="search_driver" class="btn btn-outline-primary" value="Search">
          
          <!-- ajax btn -->
          <button id="search" class="btn btn-sm btn-default">ajax search</button>
          <!-- ajax btn -->

        </div>
        </form>
        <hr>
        <div id="search_result"></div>


        <!--php qeury for searchng in the database-->
        <?php
          if (isset($_POST['search_driver'])) {
            //initialization of variables
            $driver_id=$_POST['driver_id'];

            if ($driver_id=='') {
              echo '<h5 class="text-danger text-center>Please fill all</h5>';
             }
            else{
              //select above from the database
              $driver_detials_query=$conn->query("SELECT * FROM driver WHERE drvr_id='$driver_id'");
              //fetching offence data
              $offence_query=$conn->query("SELECT * FROM offence WHERE drvr_id='$driver_id'");
        ?>

  	    <!--display result section-->
  	    <div class="bg-light">
  	      <form class="row" method="post" action="offence.php">

             <?php while($driver_details_result=mysqli_fetch_assoc($driver_detials_query)):?>
              <?php $_SESSION['ss_driver_id'] = $_POST['driver_id']; ?>

      	     	<div class="col-md-6">
      	     	  <div class="image_sec">
      	     	  	<img src="include/data/img/<?=$driver_details_result['drvr_img']?>" style="width: 80px; height: 80px;">
      	     	  </div>
      	     	  <div class="details_sec">
      	     	  	<div class="form-group">
      	     	  	  <label>Name</label>
      	     	  	  <input type="text" name="driver_name" class="form-control" value="<?= $driver_details_result['drvr_name']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>ID</label>
      	     	  	  <input type="text" name="driver_id" class="form-control" value="<?= $driver_details_result['drvr_id']?>"  readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>Nationality</label>
      	     	  	  <input type="text" name="driver_nationality" class="form-control" value="<?=$driver_details_result['drvr_nat']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>Age</label>
      	     	  	  <input type="text" name="driver_age" class="form-control" value="<?=$driver_details_result['drvr_age']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>Residence</label>
      	     	  	  <input type="text" name="driver_residence" class="form-control" value="<?=$driver_details_result['drvr_residence']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>License Expiry</label>
      	     	  	  <input type="text" name="driver_license" class="form-control" value="<?=$driver_details_result['drvr_licence']?>" readonly>
      	     	  	</div>
      	     	  	<div class="form-group">
      	     	  	  <label>Blood group</label>
      	     	  	  <input type="text" name="driver_name" class="form-control" value="<?=$driver_details_result['drvr_bldgrp']?>" readonly>
      	     	  	</div>
      	     	  </div>
      	     	</div>
              <div class="col-md-6 text-center mt-3">
                <h4>Vehicle Details</h4>
      	     	  <div class="form-group mb-3">
      	  	     	<div class="form-group">
      	  	     	  <label>Number Plate:</label>
      	  	     	  <input type="text" class="form-control" value="<?=$driver_details_result['vhcl_plate']?>" readonly>
      	  	     	</div>
      	     	  </div>

                <div class="container">
                  <button class="btn btn-outline-danger" type="submit" name="driver_offence">Offence</button>
                </div>
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
  	  </div>
  	  <div class="col-md-1"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--local sript-->
    <script src="include/ui/js/bootstrap.js"></script>
    <script src="include/ui/js/bootstrap.min.js"></script>
</body>
</html>
