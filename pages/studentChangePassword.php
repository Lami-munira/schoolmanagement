<?php
session_start();
if (!isset($_SESSION['Semail'])) {
  header("Location: studentLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: ../pages/studentLogged.php');
    }
    if (isset($_POST['schange'])) {
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
            $che = "Select * from student where password = '$op' and id = '$id';";
            $R = mysqli_query($conn, $che);
                if (mysqli_num_rows($R) ==1) { // 
                  $che = "UPDATE `student` SET `password` = '$np' WHERE `student`.`id` = '$id';";
                  $R = mysqli_query($conn, $che);
                  if ($R) {
                    echo "<script>window.open('../pages/studentLogged.php?update=Password has been updated','_self')</script>";
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
                // header('Location: manageClass.php');
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
  <title>Change Password </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/studentLoggedStyle.css">
</head>

<body>
  <div class="top">
    <div class="container d-flex justify-content-between">
      <!-- Navbar logo -->
      <div class="top">
        <a href="../index.html">
          <img src="../assets/ICON/LogoBKP.png" alt="">
        </a>
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
                <a class="nav-link" href="logout.php"><button class="green-button">Logout</button></a>
              </li>

            </ul>
          </div>
        </nav>
      </div>
      <!--Navbar end-->
    </div>
  </div>
  <!--Navbar end-->
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="../assets/padlock.png" alt="">
      </div>
      <?php
      $idd = $_SESSION['Sid'];
      ?>
      <div class="col info">
        <form action="studentChangePassword.php?id=<?= $idd; ?>" method="POST">
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
          <button name="schange" class="green-button">Submit</button>
            <button name="back" class="green-button">Go back</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>