<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
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
            background-color: rgb(255 253 255);
        }

        th {
            width: 100px;
            height: 100px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Routine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
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
                            <a class="nav-link" href="adminLogged.php">Admin</a>
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
    <div class="container searchBox">
        <!--

        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <input class="form-control" type="text" placeholder="Search" aria-label="default input example">
            </div>
            <div class="p-2 bd-highlight">
                <a href="addTeacher.html"><button class="green-button">Add</button></a>
            </div>
          </div>
        <div> -->
        <center>
            <div class="rou1">
                <table border="1" cellspacing="0">
                    <thead>
                        <th colspan="5"> Class </th>
                        <th colspan="5"> Subject Name</th>
                        <th colspan="5"> Day1 </th>
                        <th colspan="5"> Day2 </th>
                        <th colspan="5"> Time </th>
                        <th colspan="10"><a href="../php/addSchedule.php"><button class="green-button">Add</button></a>
                        </th>
                    </thead>
                    <tbody id="tmp">
                        <?php
                        include('../php/connection.php');
                        $viwU = "SELECT * FROM schedule s join subject sb on sb.id = s.subid order by s.cid , s.day1 , s.time;"; // 0 or many value return korbe 
                        $run = mysqli_query($conn, $viwU); // associative array and array type

                        while ($x = mysqli_fetch_array($run)) { //
                            $cid = $x[1];
                            $id = $x[0];
                            $sname = $x[7];
                            $sid = $x[2];
                            $d1 = $x[3];
                            $d2 = $x[4];
                            $tim = $x[5];
                        ?>

                            <tr>
                                <th colspan="5"> <?php echo  $cid; ?> </th>
                                <th colspan="5"> <?php echo  $sname; ?> </th>
                                <th colspan="5"> <?php echo  $d1; ?> </th>
                                <th colspan="5"> <?php echo  $d2; ?> </th>
                                <th colspan="5"> <?php echo  $tim; ?> </th>
                                <td colspan="5">
                                    <a href="../php/editSchedule.php?id=<?= $id; ?>">
                                        <button class='green-button'> Edit </button></a>
                                </td>
                                <td colspan="5">
                                    <a href="../php/delSchedule.php?id=<?= $id; ?>">
                                        <button class='green-button' onclick="return confirm('Are you sure?');"> Delete </button></a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>

                    <tbody id="searchR"></tbody>
                </table>
        </center>
        <div class="container back-btn">
            <a href="adminLogged.php"><button class="green-button">Go back</button></a>
        </div> <br>
</body>

</html>