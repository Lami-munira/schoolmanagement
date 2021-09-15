<?php
session_start();
if (!isset($_SESSION['Temail'])) {
  header("Location: teacherLogin.html");
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
                        <a class="nav-link" href="teacherLogged.php"><button class="green-button">Home</button></a>
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
    <<?php
  include("../php/connection.php");
  $id = $_SESSION['Tid'];
  $viwU = "select * from teacher where id = '$id';";
  $run = mysqli_query($conn, $viwU);
  $x = mysqli_fetch_assoc($run);
  $name = $x['name'];
  $gender = $x['gender'];
  $email = $x['email'];
  $dob = $x['dob'];
  $address = $x['address'];
  $phone = $x['phone'];
  ?>
  <br> <br>
  <center>
    <table>
      <tr>
        <td> Name </td>
        <td colspan="10"> </td>
        <td> <?php echo $name; ?> </td>
      </tr>

      <tr>
        <td> Email </td>
        <td colspan="10"> </td>
        <td> <?php echo $email; ?> </td>
      </tr>

      <tr>
        <td> Phone </td>
        <td colspan="10"> </td>
        <td> <?php echo $phone; ?> </td>
      </tr>

      <tr>
        <td> Address </td>
        <td colspan="10"> </td>
        <td> <?php echo $address; ?> </td>
      </tr>

      <tr>
        <td> Gender </td>
        <td colspan="10"> </td>
        <td> <?php echo $gender; ?> </td>
      </tr>

      <tr>
        <td> Date of Birth : </td>
        <td colspan="10"> </td>
        <td> <?php echo $dob; ?> </td>
      </tr>

    </table>
    <button class="green-button">Edit</button>
    <button class="green-button">Go back</button>
  </center>
</body>
</html>