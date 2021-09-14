<?php
include("connection.php");
if (isset($_POST['back'])) {
    header('Location: ../index.html');
}
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
    $che = "select * from student where email = '$user' and password = '$ok'";
    $R = mysqli_query($conn , $che);
    if(mysqli_num_rows($R)==1){
        session_start();
        $_SESSION['Semail'] = $user ;
        $r = mysqli_fetch_assoc($R);
        echo "<script> alert('Successful') </script>"; 
        $_SESSION['Sid'] = $r['id']; // issue 
        $_SESSION['Sname'] = $r['name']; // issue 
        header('Location: ../pages/studentLogged.php');
    } else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/studentLogin.html','_self') </script>";

    }
} else {
    echo "<script> alert('Enter Email and Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/studentLogin.html','_self') </script>";
}
?>
