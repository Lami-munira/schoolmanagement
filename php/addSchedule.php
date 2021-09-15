<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: ../pages/manageRoutine.php');
    }
    if (isset($_POST['addSch'])) {
        include("connection.php");
        $d1 = $_POST['d1'];
        $d2 = $_POST['d2'];
        $time = $_POST['time'];
        $class = $_POST['class'];
        $sub = $_POST['sub'];
        if (empty($d1) || empty($d2) || empty($time) || empty($class) || empty($sub)) {
            echo '<div class="alert alert-danger" role="alert">Enter all informations!!!!</div>';
        } else {
            $che = "INSERT INTO `schedule` (`id`, `cid`, `subid`, `day1`, `day2`, `time`) VALUES (NULL, '$class', '$sub', '$d1', '$d2', '$time');";
            $R = mysqli_query($conn, $che);
            if ($R) {
                echo "<script>window.open('../pages/manageRoutine.php?add=schedule has been added','_self')</script>";
            } else {
                echo '
                <div class="alert alert-danger" role="alert">  Unsuccessful !! <br>' . $conn->error . '. <br>Try Again  </div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Add Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/s.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
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
    </div>
    <div>
        <br>
        <h4> Enter the information of the schedule<br><br></h4>
        <!-- <p class = "msg"> A student has been added successfully!! <br><br></p>
        post is secure get -> shob dekhabe-->


        <form action="addSchedule.php" method="post">
            <label class="form-label">Class:
                <select name="class">
                    <?php
                    include("../php/connection.php");
                    $viwU = "SELECT * FROM class order by id;";
                    $run = mysqli_query($conn, $viwU);
                    while ($x = mysqli_fetch_assoc($run)) {
                        $id = $x['id'];
                    ?>
                        <option value="<?php echo $id; ?>"> <?php echo $id; ?> </option>
                    <?php
                    }
                    ?>
                </select>


                Subject:
                <select name="sub">
                    <?php
                    include("../php/connection.php");
                    $viwU = "SELECT * FROM subject order by id;";
                    $run = mysqli_query($conn, $viwU);
                    while ($x = mysqli_fetch_assoc($run)) {
                        $id = $x['id'];
                        $name = $x['name'];
                    ?>
                        <option value="<?php echo $id; ?>"> <?php echo $name; ?> </option>
                    <?php
                    }
                    ?>
                </select>
                <br>
                Day1:
                <select name="d1">
                    <option value="SUN"> Sun </option>
                    <option value="MON"> Mon </option>
                    <option value="TUES"> Tues </option>
                    <option value="WED"> Wed </option>
                    <option value="THURS"> Thurs </option>
                </select>
                Day2:
                <select name="d2">
                    <option value="SUN"> Sun </option>
                    <option value="MON"> Mon </option>
                    <option value="TUES"> Tues </option>
                    <option value="WED"> Wed </option>
                    <option value="THURS"> Thurs </option>
                </select>
                Class Time:
                <input type="time" name="time" style="width: 16%" placeholder="Enter time of the class"> </label>
            <label> <button name="addSch" class="green-button">Submit</button>
                <button name="back" class="green-button">Go back</button> </label>
            <!--  -->
        </form>
    </div>
    </div>

</body>

</html>