<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: manageTeachers.php');
    }
    if (isset($_POST['addteach'])) {
        include("../php/connection.php");
        include("../php/test2.php");
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pass = generatepass();
        if(empty($name) || empty($gender) ||empty($email)  || empty($dob) ||empty($phone) || empty($address))
        {
            echo '<div class="alert alert-danger" role="alert">Enter all informations!!!!</div>';
        }
        else{
        $che = "Select * from teacher where email = '$email';";
        $R = mysqli_query($conn, $che);
        if (mysqli_num_rows($R)) {
            echo '<div class="alert alert-danger" role="alert">Email Already Exist. Try with a different Email!!!</div>';
           // echo '<div class="alert alert-danger" role="alert">'Email Already Exist. Try with a different Email!! </div>';
            // header('Location: manageClass.php'); INSERT INTO `student` (`id`, `name`, `current_class`, `phone`, `email`, `gender`, `password`, `address`, `dob`) empty($gender) ||empty($email) || empty($class) || empty($dob) ||empty($phone) || empty($address))
        } else {

            $che = "INSERT INTO `teacher` (`id`, `name`, `phone`, `email`, `gender`, `password`, `address`, `dob`) VALUES (NULL, '$name', '$phone', '$email', '$gender', '$pass', '$address', '$dob');";
            $R = mysqli_query($conn, $che);
            if ($R) {
                echo '<div class="alert alert-success" role="alert">New Student Added </div>';
                header('Location: manageTeachers.php');
            } else {
                echo '<div class="alert alert-danger" role="alert">Unsuccessful. Try Again Later </div>';

            }
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
    <title>DMS | Add Teacher</title>
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
    <div class="cont">
        <br>
        <h4> Enter the information of the teacher<br><br></h4>
        <!-- <p class = "msg"> A student has been added successfully!! <br><br></p>
        post is secure get -> shob dekhabe-->


        <form action="addTeacher.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter name">
            <input type="email" name="email" id="email" placeholder="Enter email">
            <label text-align = "left" class="form-label">Gender
            <select name="gender">
            <option value="Others">Others</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            </select></label> 
            <input type="phone" name="phone" id="phone" placeholder="Enter phone number">
            <input type="date" name="dob" id="dob" placeholder="Enter date of birth">
            <input type="text" name="address" id="address" placeholder="Enter Address">
            <!-- CLASS  R NICHE ONEK OBJ BUT ID IS FOR UNIQUE IDENTIFICATION -->
            <button  name="addteach" class="green-button">Submit</button> <br>
                <button name="back" class="green-button">Go back</button>
            <!--<button class="btn">Reset</button>-->
            <!--  -->
        </form>
    </div>
    </div>

</body>

</html>