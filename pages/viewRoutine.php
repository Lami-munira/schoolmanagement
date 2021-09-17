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
    <title>Routine</title>
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
    <?php

    include('../php/connection.php');
    $v = "SELECT distinct cid FROM schedule order by cid;"; // 0 or many value return korbe 
    $r = mysqli_query($conn, $v); // associative array and array type
    while($lam = mysqli_fetch_array($r)){
        $cls = $lam[0];
    ?>
    <h1> <b>Class <?php echo $cls ; ?> </b>   </h1></a>
                        <br>
  
        <div class="rou1">
            <table border="1" cellspacing="0">
                <thead>
                    <th colspan="5"> Subject Name</th>
                    <th colspan="5"> Day1 </th>
                    <th colspan="5"> Day2 </th>
                    <th colspan="5"> Time </th>
                </thead>
                <tbody id="tmp">
                    <?php
                    include('../php/connection.php');
                    $viwU = "SELECT * FROM schedule s join subject sb on sb.id = s.subid where s.cid = '$cls' order by s.day1 , s.time ;"; // 0 or many value return korbe 
                    $run = mysqli_query($conn, $viwU); // associative array and array type

                    while ($x = mysqli_fetch_array($run)) { //
                        $id = $x[0];
                        $sname = $x[7];
                        $sid = $x[2];
                        $d1 = $x[3];
                        $d2 = $x[4];
                        $tim = $x[5];
                    ?>

                        <tr>
                            <th colspan="5"> <?php echo  $sname; ?> </th>
                            <th colspan="5"> <?php echo  $d1; ?> </th>
                            <th colspan="5"> <?php echo  $d2; ?> </th>
                            <th colspan="5"> <?php echo  $tim; ?> </th>
                        </tr>

                    <?php
                    }
                    ?>
                </table><br> <br>
            <?php
    }
    ?>
    

    <div class="container back-btn">
        <a href="teacherLogged.php"><button class="green-button">Go back</button></a>
    </div>
    <br> <br><br> <br></center>

</body>

</html>