<?php
session_start();
if (!isset($_SESSION['Temail'])) {
  header("Location: TeacherLogin.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <style>
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
  </style> -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher | <?php echo $_SESSION['Tname']; ?> </title>
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
                <a class="nav-link" href="teacherProfile.php"><button class="green-button">Profile</button></a>
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
  </div>
  <!-- <div class="container">
    <div class="row">
      <div class="col">
        <img src="../assets/TeacherLogged/classroom.png" alt="">
      </div>
      <div class="col info">
        <center>
          <ul type="none">
            <li> <a href="viewRoutine.php"><button class="x">Class routine</button></a></li> <br> <br>
            <li> <a href="#"><button class="x">Attendence</button></a></li> <br> <br>
            <li> <a href="studentSubject.html"><button class="x">Grade Students</button></a></li><br> <br>
            <li> <a href="teacherChangePassword.php"><button class="x">Change password</button></a></li>
          </ul>
        </center>
      </div>
    </div> -->

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
            <h5 class="card-title">Attendence</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/dossier.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="studentSubject.html">
            <h5 class="card-title">Grade students</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/StudentLogged/password.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="teacherChangePassword.php">
            <h5 class="card-title">Change password</h5>
          </a>
        </div>
      </div>
    </div>

</body>

</html>