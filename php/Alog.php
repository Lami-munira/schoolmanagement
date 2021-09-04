<?php
if (isset($_POST['Alogin'])) {
    $user = $_POST['email'];
    $ok = $_POST['pd'];
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
    if ($ok == 'root' && $user == 'admin') { 
        echo "<script> alert('Successful') </script>";
        header('Location: ../pages/adminLogged.html');
    } else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/adminLogin.html','_self') </script>";

    }
} else {
    echo "<script> alert('Invalid Email or Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/adminLogin.html','_self') </script>";
}
?>
