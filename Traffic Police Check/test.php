<!--including php in html-->
<?php 
  //server variables 
  $servername = "localhost";
  $username = "root";
  $password = "#pM@tErry213191";
  $dbName = "c_bid";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);
 ?>
 <?php 
  if (isset($_GET['id_no'])) {
  	$id_no=$_GET['id_no'];
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Test Traffic E-Check</title>
    <link rel="stylesheet" type="text/css" href="include/ui/bootstrap4.3/css/bootstrap.css">
</head>
<body>
  <!--code for retrieving user-->
  <?php 
    if (isset($_POST["insert"])) {
      $id_no=$_POST["id_no"];

      $record_item=$conn->query("INSERT INTO user(user_na, item_price, item_image, user_mobile) VALUES ('$item_name', '$item_price', '$item_image', '$user_mobile')");
      	if ($record_item) {?>
      	  <script type="text/javascript">
      	    alert ('Successfull');
      	  </script>
      	  <?php
      	}
    }
   ?>
  <form action="test.php" method="POST">
  	<input type="text" name="id_no">
  	<input type="submit" name="insert">
  	<input type="submit" name="search" value="Search">
    <input type="calendar" name="">
  </form>  
   <!-- table displaying contents being sold-->
          <?php 
          if (isset($_POST['search'])) {
          	$id_no=$_POST['id_no'];
          	$user=$conn->query("SELECT * FROM user WHERE id='id_no'");
           ?>
          <table class="table table-striped">
          	<thead class="thead thead-inverse">
          	  <th>Name</th>
          	  <th>Image</th>
          	  <th>Price</th>
          	  <th>...</th>
          	</thead>
          	<tbody>
          	<?php while($user_result=mysqli_fetch_assoc($user)):
          	   ?>
          	  <tr>     	  	
          	  	<td><?=$user_result['username']?></td>
          	  	<td><?=$user_result['user_mobile']?></td>
          	  	<td><?=$user_result['user_password']?></td>
          	  </tr>
          	<?php endwhile ?>
          <?php } ?>
          	</tbody>
          </table>
</body>
</html>