<?php
session_start();
if (!isset($_SESSION['Temail'])) {
  header("Location: teacherLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: ../pages/teacherLogged.php');
    }
    if (isset($_POST['tchange'])) {
        include("../php/connection.php");
        $id = $_GET['id'];
        $op = $_POST['oldp'];
        $np = $_POST['newp'];
        $isnp = $_POST['isnewp'];
        if (empty($op) || empty($np) || empty($isnp)) {
            echo '<div class="alert alert-danger" role="alert">Enter all informations!!!!</div>';
        } 


        else {
            if($np == $isnp){
            $che = "Select * from teacher where password = '$op' and id = '$id';";
            $R = mysqli_query($conn, $che);
                if (mysqli_num_rows($R) ==1) { // 
                  $che = "UPDATE `teacher` SET `password` = '$np' WHERE `teacher`.`id` = '$id';";
                  $R = mysqli_query($conn, $che);
                  if ($R) {
                    echo "<script>window.open('../pages/teacherLogged.php?update=Password has been updated','_self')</script>";
                  } 

                  else {
                    echo '<div class="alert alert-danger" role="alert">Unsuccessful. Try Again Later </div>';
                  }
                }

                else {
                  echo '<div class="alert alert-danger" role="alert"> Invalid Password. Check again !!!!!!</div>';
    
                }
            }

            else {
              echo '<div class="alert alert-danger" role="alert"> New Passwords dont match. Check again !!!!!!</div>';

            }
        }

        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/studentLoggedStyle.css">
</head>
<body>
<div class="container d-flex justify-content-between">
        <!-- Navbar logo -->
        <div class="top">
                <img src="../assets/ICON/LogoBKP.png" alt="">
      
        </div>
        <!-- Navbar elements -->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="teacherLogged.php">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar end-->
    </div><br> <br>
    <?php
      $idd = $_SESSION['Tid'];
      ?>
      <div class="col info">
        <form action="teacherChangePassword.php?id=<?= $idd; ?>" method="POST">
          <div class="mb-3">
            <label class="form-label">Old Password</label>
            <input type="password" name="oldp" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="newp" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="isnewp" class="form-control" id="exampleInputPassword2">
          </div>
          <button name="tchange" class="green-button">Submit</button>
            <button name="back" class="green-button">Go back</button>
        </form>
</body>
</html>
