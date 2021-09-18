<?php
session_start();
if (!isset($_SESSION['Semail'])) {
  header("Location: studentLogin.html");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/studentLoggedStyle.css">
</head>

<body>
  <div class="container d-flex justify-content-between">
    <!-- Navbar logo -->
    <div class="top">
      <img src="../assets/ICON/LogoBKP.png" alt="DMS">
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
              <a class="nav-link" href="studentLogged.php"><button class="green-button">Home</button></a>
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

  <?php
  include("../php/connection.php");
  $id = $_SESSION['Sid'];
  $viwU = "select * from studentsclassrecord where studentID = '$id';";
  $run = mysqli_query($conn, $viwU);
  $x = mysqli_fetch_assoc($run);
  $total_attendence = $x['total_attendence'];
  $total_grade = $x['total_grade'];
  $grade = $x['grade'];
  $finishing_year = $x['finishing_year'];
  $starting_year = $x['starting_year'];
  ?>
  <br> <br>
  <center>
    <table>
      <tr>
        <td> Total attendance: </td>
        <td colspan="10"> </td>
        <td> <?php echo $total_attendence; ?> </td>
      </tr>

      <tr>
        <td> Total grade: </td>
        <td colspan="10"> </td>
        <td> <?php echo $total_grade; ?> </td>
      </tr>

      <tr>
        <td> Grade: </td>
        <td colspan="10"> </td>
        <td> <?php echo $grade; ?> </td>
      </tr>

      <tr>
        <td> Starting year: </td>
        <td colspan="10"> </td>
        <td> <?php echo $starting_year; ?> </td>
      </tr>

      <tr>
        <td> Finishing year: </td>
        <td colspan="10"> </td>
        <td> <?php echo $finishing_year; ?> </td>
      </tr>

    </table>
    <a href = "../php/editSbyS.php" ><button class="green-button">Edit</button>
    <a href = "studentLogged.php" ><button class="green-button">Go back</button> </a>
  </center>
</body>

</html>