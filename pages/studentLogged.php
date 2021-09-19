<?php
session_start();
if (!isset($_SESSION['Semail'])) {
  header("Location: studentLogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
.mr-auto, .mx-auto {
    padding: 20px;
    margin-right: auto!important;
    width: 200px;
    height: 200px;
}

    </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student DashBoard | <?php echo $_SESSION['Sname']; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!-- Changes -->
    <div class="container pageSelector">
    <div class="card-group">
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/routine.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="viewClassRoutine.php">
            <h5 class="card-title">Class routine</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/books.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="studentSubject.php">
            <h5 class="card-title">Subjects</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/dossier.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="studentsclassrecord.php">
            <h5 class="card-title">Class records</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/password.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="studentChangePassword.php">
            <h5 class="card-title">Change password</h5>
          </a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>