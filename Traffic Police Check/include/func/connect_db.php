<?php
  $servername = "localhost";
  $username = "root";
  $password = "eOqnJ0HTjmgQl1i7";
  $dbName = "traffic";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);
  if($conn->connect_error){
 	die("Connection Failed: ".$conn->connect_error);
  }
 ?>
