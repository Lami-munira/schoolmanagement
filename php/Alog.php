<?php

include("connection.php");

if (isset($_POST['back'])) {
    header('Location: ../index.html');
}

if (isset($_POST['Alogin'])){

    $user = $_POST['email'];
    $ok = $_POST['apd'];

    if ($user == '') {
        echo "Please Enter Your Email";
        echo "<script> window.open('../pages/adminLogin.html','_self') </script>";
        exit();
    }

    if ($ok == '') {
        echo "Please Enter Your Password";
        echo "<script> window.open('../pages/adminLogin.html','_self') </script>";
        exit();
    }

    $che = "select * from admin where email = '$user' and password = '$ok' ";

    $R = mysqli_query($conn, $che);
    
    if (mysqli_num_rows($R) == 1) {
        session_start();
        $_SESSION['Aemail'] = $user;
        header('Location: ../pages/adminLogged.php');
    } else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/adminLogin.html','_self') </script>";
    }
} 
else {
    echo "<script> alert('Invalid Email or Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/adminLogin.html','_self') </script>";
}
?>