<?php
echo "hi";
if(isset($_POST['adminlogin']))
{
echo "hi";
    $pass = $_POST['Apass'];
    $user = $_POST['adminU'];
    if($user=='')
{
    echo "<script> window.open('./studentLogin.html','_self') </script>";
    exit();
}
if($pass=='')
{
    echo "<script> alert('Please Enter Your Password') </script>";
    echo "<script> window.open('./studentLogin.html','_self') </script>";
    exit();
}
    if($pass == 'admin' && $user == 'root'){    echo "<script> alert('Successful') </script>";
       // header('Location: ./studentLogged.html');
    } 
    else{
        echo "<script> alert('Invalid Email Or Password.Please Try Again!!') </script>";
        //echo "<script> window.open('./studentLogin.html','_self') </script>";

    }
}
?>