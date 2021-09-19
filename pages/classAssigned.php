<?php
session_start();
if (!isset($_SESSION['Temail'])) {
    header("Location: teacherLogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        table {
            font-style: italic;
            border: 6px solid #380505;
            border-radius: 12px;
            outline: none;
            width: 90%;
            margin: 11px auto;
            padding: 0px;
            font-size: 20px;
            text-align: center;
        }

        th {
            width: 100px;
            height: 100px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/studentLoggedStyle.css">
</head>

<body>
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




    <center>
        <h1>Assigned Classes: </h1><br> <br>
    </center>
    <center>
        <table>
            <thead>
                <th colspan="5"> Class </th>
                <th colspan="10"> </th>
            </thead>


            <?php
            include("../php/connection.php");
            $tid = $_SESSION['Tid'];
            $assigned = "SELECT * FROM class where  classTeacherID = '$tid';";
            $rex = mysqli_query($conn, $assigned);
            if (mysqli_num_rows($rex) == 0) {
            ?>
                <tr>
                    <td colspan="20"> No classes have been assigned.... </td>
                </tr>
                <?php
            } else {
                while ($lam = mysqli_fetch_array($rex)) {
                    $id = $lam[0];
                ?>
                    <tr>
                        <th colspan="5"> <?php echo  $id; ?> </th>
                        <th colspan="10"><a href="attendence.php?id=<?= $id;?>">
                                <h5 class="card-title">Take Attendence</h5>
                            </a></th>
                    </tr>

            <?php
                }
            }
            ?>
        </table><br> <br>

        <div class="container back-btn">
            <a href="teacherLogged.php"><button class="green-button">Go back</button></a>
        </div>
        <br> <br><br> <br>
    </center>

</body>

</html>