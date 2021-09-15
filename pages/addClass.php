<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: manageClass.php');
    }
    if (isset($_POST['addCsub'])) {
        include("../php/connection.php");
        $id = $_POST['classID'];
        $teacher = $_POST['teacherid'];
        $che = "Select * from class where id = '$id';";
        $R = mysqli_query($conn, $che);
        if (mysqli_num_rows($R)) {
            echo "<script> alert('Class Already Exist!!') </script>";
            // header('Location: manageClass.php');
        } else {
            $che = "INSERT INTO `class` (`id`, `classTeacherID`) VALUES ('$id', '$teacher');";
            $R = mysqli_query($conn, $che);
            if ($R) {
                echo '<div class="alert alert-success" role="alert">New Class Added </div>';
                header('Location: manageClass.php');
            } else {
                echo '<div class="alert alert-danger" role="alert">Unsuccessful. Try Again Later </div>';

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
    <title>DMS | Add Class</title>
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
    </div>

    <?php
    include("../php/connection.php");
    $sq = "SElect id from class order by id desc limit 1";
    $update = mysqli_query($conn, $sq);
    if ($update) {
        $i = mysqli_fetch_array($update);
        $id = $i[0] + 1;
    }
    ?>
    <div class="container addStudentBox">
        <h2>Add class</h2>
        <div class="inputs">
            <form action = "addClass.php" method="POST">
                <div class="inputBox">
                    <label for="ClassName" class="form-label">Class ID</label>
                    <input type="text" name="classID" class="form-control" id="ClassName" value="<?php echo $id; ?>" >
                </div>
                <div class="inputBox">
                    <label for="TeacherID" class="form-label">Teacher ID</label> <br>
                    <select name="teacherid">
                        <?php
                        include("../php/connection.php");
                        $viwU = "SELECT * FROM teacher;";
                        $run = mysqli_query($conn, $viwU);
                        while ($x = mysqli_fetch_assoc($run)) {
                            $id = $x['id'];
                            $name = $x['name'];  ?>
                            <option value="<?php echo $id; ?>"> <?php echo $name; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button name="addCsub" class="green-button">Submit</button>
                <button name="back" class="green-button">Go back</button>
            </form>
        </div>
    </div>
</body>

</html>