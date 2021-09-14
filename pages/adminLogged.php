<?php
session_start();
if(!isset($_SESSION['Aemail']))
{
    header("Location: adminLogin.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

  <!-- Selector -->
  <div class="container pageSelector">
    <div class="card-group">
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/student.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="manageStudents.php">
            <h5 class="card-title">Students</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/teacher.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="manageTeachers.php">
            <h5 class="card-title">Teachers</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/notice.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="managenotice.php">
            <h5 class="card-title">Notices</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/classroom.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="manageClass.php">
            <h5 class="card-title">Classes</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/routine.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="manageRoutine.php">
            <h5 class="card-title">Schedule</h5>
          </a>
        </div>
      </div>
      <div class="card text-center">
        <img class="mx-auto d-block" src="../assets/AdminLogged/bookshelf.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="manageSubject.php">
            <h5 class="card-title">Subjects</h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>