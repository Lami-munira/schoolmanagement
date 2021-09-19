<?php // ?id=<?= $id;
session_start();
if (!isset($_SESSION['Temail'])) {
    header("Location: TeacherLogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendence</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/style.css">

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


<?php $clss = $_GET['id']; ?>
    <center>
        <h1>Students: </h1><br> <br>
    </center>
    <div class='container'>
        <form action="ii.php?id=<?= $clss;?>" method="POST">
        <input type="date" name="student[]" id="dob" placeholder="Enter date" value = "2021-09-20">
            <table class='table'>
                <br><br>
                <thead>
                    <tr>
                        <th scope="col"> Student ID</th>
                        <th scope="col"> Status</th>
                    </tr>
                </thead>
                <?php
                include("../php/connection.php");
                $tid = $_SESSION['Tid'];
                $class = $_GET['id'];
            
                $assigned = "SELECT * FROM studentsinclass where classID = '$class' order by studentid ;";
                $rex = mysqli_query($conn, $assigned);
                if (mysqli_num_rows($rex) == 0) {
                ?>
                    <tr>
                        <td colspan="15"> No students have enrolled . . . </td>
                    </tr>
                    <?php
                } else {
                    while ($lam = mysqli_fetch_array($rex)) {
                        $cid = $lam[1];
                    ?>
                        <!-- <tr>
                            <td colspan="5"> <?php echo  $cid; ?> </td>
                            <td colspan="10">
                            <select name='student[]'>
                            <option value="p">Present</option>
                            <option value="a">Absent</option>
                        </select>
                            </td>
                        </tr> -->
                        <tbody>
                            <tr>
                                <th><?php echo  $cid; ?></th>
                                <th>
                                    <select name='student[]'>
                                        <option value="p">Present</option>
                                        <option value="a">Absent</option>
                                    </select>
                                </th>
                            </tr>
                        </tbody>

                <?php
                    }
                }
                ?>
            </table>
            <div class="container back-btn">
                <input class="green-button" type="submit" name="Submit" value="Submit">
                <input class="green-button" type="submit" name="back" value="Back">
            </div>
        </form><br> <br>br> <br>

        
        <br> <br><br> <br>
            </div>
</body>

</html>