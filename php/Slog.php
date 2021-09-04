<?php
if (isset($_POST['Slogin'])) {
    $user = $_POST['email'];
    $ok = $_POST['pd'];
    if ($user == '') {
        echo "Please Enter Your Email";
        echo "<script> window.open('../pages/studentLogin.html','_self') </script>";
        exit();
    }
    if ($ok == '') {
        echo "Please Enter Your Password";
        echo "<script> window.open('../pages/studentLogin.html','_self') </script>";
        exit();
    }
    if ($ok == 'root' && $user == 'admin') {
        echo "<script> alert('Successful') </script>";
        header('Location: ../pages/studentMainPage.html');
    } else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/studentLogin.html','_self') </script>";

    }
} else {
    echo "<script> alert('Enter Email and Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/studentLogin.html','_self') </script>";
}
?>
