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
    $che = "select * from users where email = '$user' and password = '$ok' and status = 'Teacher'";
    $R = mysqli_query($conn , $che);
    if(mysqli_num_rows($R)==1){
        session_start();
        $_SESSION['email'] = $user ;
        $row = mysqli_fetch_array($R);
        
        echo "<script> alert('Successful') </script>"; 
        $_SESSION['id'] = $row['id']; // issue 
        header('Location: ../pages/teacherLogged.html');
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
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 45b759d5294230d96bf1655aebb96b2aeaf994d8
