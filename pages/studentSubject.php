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
    <title>Subjects</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
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
                            <a class="nav-link disabled" href="studentLogged.php">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar end-->
    </div>

    <?php
    include("../php/connection.php");
    $sid = $_SESSION['Sid'];
    $sclass = $_SESSION['Sclass'];
    $sname = $_SESSION['Sname'];
    $che = "select * from subjectsinclass sb join subject s on s.id = sb.subjectID where sb.classID = '$sclass';";
    $r = mysqli_query($conn, $che);
    ?>

    <div class="container searchBox">
        <div class="recordTable">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Grade</th>
                        <th scope="col">CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($x = mysqli_fetch_array($r)) {
                        $sb = $x[0];
                        $nm = $x[4];
                        $th = $x[5];
                        $ce = "select CGPA , grd from grade where id = '$sb' ;";
                        $rp = mysqli_query($conn, $ce);

                        if (mysqli_num_rows($rp) == 0) $y = 'N/A';
                        else {
                            $xy = mysqli_fetch_array($rp);
                            $y = $xy[0];
                            $ye = $xy[1];
                        }

                    ?>

                        <tr>
                            <td><?php echo $nm; ?> </td>
                            <td><?php echo $th; ?> </td>
                            <td><?php echo $ye; ?> </td>
                            <td><?php echo $y; ?> </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container back-btn">
        <a href="studentLogged.php"><button class="green-button">Go back</button></a>
    </div>

</body>

</html>