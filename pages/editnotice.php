<?php
session_start();
if(!isset($_SESSION['Aemail']))
{
    header("Location: adminLogin.html");
}
?>
<?php
include("../php/connection.php");
if(isset($_POST['back']))
header('Location: managenotice.php');

if(isset($_POST['update'])){
$use = $_POST['desc'];
$ids = $_GET['id'];
// echo $ids;
if(empty($use))
{
    header('Location: managenotice.php');
}
else{
$sq = "update notice set content = '$use' where id = '$ids'";
$update = mysqli_query($conn, $sq);
if($update)
{
    header('Location: managenotice.php');
}
else
{
    echo 'T  R  Y  A G A I N L A T E R';
}
}
}
else
{
    header('Location: managenotice.php');
}

?>