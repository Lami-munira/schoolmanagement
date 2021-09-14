<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: ../pages/adminLogin.html");
}
?>

<?php
include('connection.php');
$info = $_GET['id'];
$sq = "delete from subject where id = '$info'";
$update = mysqli_query($conn, $sq);
if($update)
{ 
    echo "<script>window.open('../pages/manageSubject.php?del=subject has been deleted','_self')</script>";
    //header('Location: view_users.php');

}
else
{
    echo 'T  R  Y  A G A I N L A T E R';
}

?>