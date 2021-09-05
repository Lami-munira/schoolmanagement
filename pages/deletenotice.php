<?php
include('../php/connection.php');
$info = $_GET['id'];
$sq = "delete from notice where id = '$info'";
$update = mysqli_query($conn, $sq);
if($update)
{ 
    echo "<script>window.open('./managenotice.php?del=user has been deleted','_self')</script>";
    //header('Location: view_users.php');

}
else
{
    echo 'T  R  Y  A G A I N L A T E R';
}

?>