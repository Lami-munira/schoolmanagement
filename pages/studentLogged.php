<?php
session_start();
if(!isset($_SESSION['Semail']))
{
    header("Location: studentLogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .x {
      background-color: rgb(33, 181, 115);
      margin-top: 10px;
      width: 200px;
      height: 100px;
      color: white;
      font-size: 20px;
      border-radius: 30px;
      border: none;
      cursor: pointer;

    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student DashBoard | <?php echo $_SESSION['Sname']; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/studentLoggedStyle.css">
</head>

<body>
  <div class="top">
    <div class="container d-flex justify-content-between">
      <!-- Navbar logo -->
      <div class="top">
          <img src="../assets/ICON/LogoBKP.png" alt="">
      </div>
      <!-- Navbar elements -->
      <div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="studentProfile.php"><button class="green-button">Profile</button></a>
              </li>
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
  <?php

  ?>
  </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="../assets/StudentLogged/students.png" alt="">
        </div>
        <div class="col info">  <center>
          <ul type="none">
            <li> <a href="viewRoutine.html"><button class="x">Class routine</button></a> <a href="studentSubject.html"><button class="x">Subjects</button></a></li><br> <br>
            <li> <a href="classRecords.html"><button class="x">Class Records</button></a> <a href="studentChangePassword.html"><button class="x">Change password</button></a></li>
          </ul></center>
        </div>
      </div>
</body>

</html>