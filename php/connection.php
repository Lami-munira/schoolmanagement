<?php 
  $server ="localhost";
  $password ="";
  $username = "root";
  $database_name = "practice";
 
  $conn = mysqli_connect($server, $username , $password , $database_name);
 
  if(!$conn)
  {
      echo die("Connection Failed: " . mysqli_connect_error());
  }
?>