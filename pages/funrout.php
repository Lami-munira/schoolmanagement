<?php 
  $server ="localhost";
  $password ="";
  $username = "root";
  $database_name = "prac";
 
  $conn = mysqli_connect($server, $username , $password , $database_name);
  
  $che = "select distinct class from schedule order by class";
  $R = mysqli_query($conn , $che);
  $xy = 0 ;
  while ($x = mysqli_fetch_array($R)) {

      $cid =  $x['class'];
            $clan = "select * from schdule where class = $cid";
echo $cid;
$dx = mysqli_query($conn , $clan);
if(mysqli_num_rows($dx)==2) {
    echo 'Hi';
}
  }


  ?>