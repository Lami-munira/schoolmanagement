<?php
include("connection.php");
if (isset($_POST['back'])) {
    header('Location: ../index.html');
}
if (isset($_POST['Tlogin'])) {
    $user = $_POST['email'];
    $ok = $_POST['tpd'];
    if ($user == '') {
        echo "Please Enter Your Email";
        echo "<script> window.open('../pages/TeacherLogin.html','_self') </script>";
        exit();
    }
    if ($ok == '') {
        echo "Please Enter Your Password";
        echo "<script> window.open('../pages/TeacherLogin.html','_self') </script>";
        exit();
    }
    $che = "select * from teacher where email = '$user' and password = '$ok'";
    $R = mysqli_query($conn , $che);
    if(mysqli_num_rows($R)==1){
        session_start();
        $_SESSION['Temail'] = $user ;
        $row = mysqli_fetch_assoc($R);
        $_SESSION['Tid'] = $row['id'];
        $_SESSION['Tname'] = $row['name'];
        header('Location: ../pages/teacherLogged.php');
    } 
    else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/TeacherLogin.html','_self') </script>";

    }
} 
else {
    echo "<script> alert('Invalid Email or Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/TeacherLogin.html','_self') </script>";
}
?>
