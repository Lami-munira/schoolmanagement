<?php

include("connection.php");

if (isset($_POST['back'])) {
    header('Location: ../pages/managenotice.php');
}

if (isset($_POST['addnotice'])){
    $dsc = $_POST['desc'];
    $dsc = trim($dsc);
    echo 'takechk   ' . $dsc;

    if(!$conn)
    {
        die("connection tso this databse failed due to" . mysqli_connect_error());
    }
 $che = "insert into notice(`content`) values('$dsc');";
 if($conn->query($che) == true){

    echo "<script> alert('Successfully added notice!') </script>";
    header('Location: ../pages/managenotice.php');
 }
 else
 {
     //echo "Error: $che <br> $conn->error";
 }

}
// $conn->close();

else{
    echo 'erol chk   ' . $dsc;

    echo "<script> window.open('../pages/adminLogged.html','_self') </script>";
}
?>
