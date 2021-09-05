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
    $che = "select * from users where email = '$user' and password = '$ok' and status = 'Student'";
    $R = mysqli_query($conn , $che);
    if(mysqli_num_rows($R)==1){
        session_start();
        $_SESSION['email'] = $user ;
        $row = mysqli_fetch_array($R);
        
        echo "<script> alert('Successful') </script>"; 
        $_SESSION['id'] = $row['id']; // issue 
        header('Location: ../pages/studentLogged.html');
    } else {
        echo "<script> alert('Wrong Email Or Password.Please Try Again!!') </script>";
        echo "<script> window.open('../pages/studentLogin.html','_self') </script>";

    }
} else {
    echo "<script> alert('Enter Email and Password.Please Try Again!!') </script>";
    echo "<script> window.open('../pages/studentLogin.html','_self') </script>";
}
?>
