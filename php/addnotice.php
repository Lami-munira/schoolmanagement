<?php
session_start();
if(!isset($_SESSION['Aemail']))
{
    header("Location: adminLogin.html");
}
?>
<?php
// INSERT INTO `notice` (`id`, `content`, `date`) VALUES (NULL, 'Random Thoughts . . . . . ', current_timestamp());
include("connection.php");

if (isset($_POST['back'])) {
    header('Location: ../pages/managenotice.php');
}

include('addfunc.php');

if (isset($_POST['addnotice'])){
    $dsc = $_POST['desc'];
    $nc = trim($dsc);
    if(!$conn)
    {
        die("connection tso this databse failed due to" . mysqli_connect_error());
    }

 $che = "INSERT INTO `notice` (`id`, `content`, `date`) VALUES (NULL, '$nc', current_timestamp());";
 if(empty($nc))
 {
     echo "<script> alert('Notice is empty!!') </script>";
     header('Location: ../pages/managenotice.php');
 }
 else if($conn->query($che) == true){

    header('Location: ../pages/managenotice.php');    
    echo "<script>alert('Successfully added notice!')</script>";

}
 else
 {
     //echo "Error: $che <br> $conn->error";
 }
 $conn->close();
}
else{
    echo "<script> window.open('../pages/adminLogged.php','_self') </script>";
}
?>
