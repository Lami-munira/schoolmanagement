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



    <center>
        <h1>Students: </h1><br> <br>
    </center>
    <center>
<br> <br>
        <form action="add.php" method="post">
        <?php
            include("../php/connection.php");
            $tid = 3;
            $class = 2;
            $assigned = "SELECT * FROM studentsinclass where classID = '$class';";
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
                    echo '<br>' ;
                    echo $cid . ":  hi " ;
            ?>
            <input type="radio" name="test" value="value2"> Value 2
            <input type="radio" name="test" value="value3"> Value 3
            <?php
                }
            }
                ?>
                            <input type="submit" name="submit" value="submit">

        </form>
        <div class="container back-btn">
            <a href="teacherLogged.php"><button class="green-button">Go back</button></a>
        </div>
        <br> <br><br> <br>
    </center>
</body>

</html>