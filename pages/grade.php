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
    <title>Grade</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/style.css">

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


    <?php $clasSub = $_GET['id']; ?>
    <center>
        <h1>Students: </h1><br> <br>
    </center>
    <div class='container'>
        <form action="gradeupdate.php?id=<?= $clasSub; ?>" method="POST">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col"> Student ID</th>
                        <th scope="col"> Student Name</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <?php
                include("../php/connection.php");
                $assigned = "SELECT s.name,s.id FROM subjectsinclass sc join student s on sc.classID = s.current_class where sc.id = '$clasSub order by s.id,s.name';";
                $rex = mysqli_query($conn, $assigned);
                if (mysqli_num_rows($rex) == 0) {
                ?>
                    <tr>
                        <td colspan="15"> No students have enrolled . . . </td>
                    </tr>
                    <?php
                } else {
                    while ($lam = mysqli_fetch_array($rex)) {
                        $sname = $lam[0];
                        $sid = $lam[1];
                    ?>
                        <!-- <tr>
                            <td colspan="5"> <?php echo  $sid; ?> </td>
                            <td colspan="5"> <?php echo  $sname; ?> </td>
                            <td colspan="10">
                                <select name='student[]'> ('A','A-','B','B-','C','D','I')
                                    <option value="A">A</option>
                                    <option value="A-">A-</option>
                                    <option value="B">B</option>
                                    <option value="B-">B-</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="I">I</option>
                                </select>
                            </td>
                        </tr> -->

                        <tbody>
                            <tr>
                                <th><?php echo  $sid; ?></th>
                                <th><?php echo  $sname; ?></th>
                                <th>
                                    <select name='student[]'> ('A','A-','B','B-','C','D','I')
                                        <option value="A">A</option>
                                        <option value="A-">A-</option>
                                        <option value="B">B</option>
                                        <option value="B-">B-</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="I">I</option>
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
        </form><br> <br>


        <br> <br><br> <br>
    </div>
</body>

</html>