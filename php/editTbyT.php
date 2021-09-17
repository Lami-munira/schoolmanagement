<?php
session_start();
if (!isset($_SESSION['Temail'])) {
    header("Location: ../pages/teacherLogin.html"); // teacherProfile
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: ../pages/teacherProfile.php');
    }
    if (isset($_POST['eTbyT'])) {
        include("connection.php");
        $id = $_GET['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        if (empty($name) || empty($gender) || empty($email) || empty($dob) || empty($phone) || empty($address)) {
            echo '<div class="alert alert-danger" role="alert">Enter all informations!!!!</div>';
        } else {
            $che = "Select * from teacher where email = '$email' and id<> '$id';";
            $R = mysqli_query($conn, $che);
            if (mysqli_num_rows($R)) {
                echo '<div class="alert alert-danger" role="alert">Email already Exist in database. Use another email!!!!!!</div>';
                // header('Location: manageClass.php');
            } else {
                $che = "UPDATE `teacher` SET `name` = '$name' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                $che = "UPDATE `teacher` SET `gender` = '$gender' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                $che = "UPDATE `teacher` SET `email` = '$email' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                $che = "UPDATE `teacher` SET `dob` = '$dob' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                $che = "UPDATE `teacher` SET `address` = '$address' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                $che = "UPDATE `teacher` SET `phone` = '$phone' WHERE `teacher`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                if ($R) {
                    echo "<script>window.open('../pages/teacherProfile.php?update=record has been updated','_self')</script>";
                } else {
                    echo '<div class="alert alert-danger" role="alert">Unsuccessful. Problem in Database. Try Again Later </div>';
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        textarea {
            border: 6px solid black;
            border-radius: 16px;
            outline: none;
            width: 64%;
            margin: 11px auto;
            padding: 15px;
            font-size: 16px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/s.css">

</head>

<body>
    <div class="top">
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

                </nav>
            </div>
            <!--Navbar end-->
        </div>
    </div>
    <br> <br>
    <br> <br>
    <?php
    include("../php/connection.php");
    $idd = $_SESSION['Tid'];
    $viwU = "select * from teacher where id = '$idd';";
    $run = mysqli_query($conn, $viwU);
    $x = mysqli_fetch_assoc($run);
    $name = $x['name'];
    $gender = $x['gender'];
    $email = $x['email'];
    $dob = $x['dob'];
    $address = $x['address'];
    $phone = $x['phone'];
    ?>
    <div class="cont">
        <br>
        <h4> The informations: <br><br></h4>

        <form action="editTbyT.php?id=<?= $idd; ?>" method="post">
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter name">
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter email">
            <label text-align="left" class="form-label">Gender
                <select name="gender">
                    <option value="<?php echo $gender; ?>"> <?php echo $gender; ?> </option>
                    <option value="Others">Others</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select></label>
            <input type="phone" name="phone" value="<?php echo $phone; ?>" id="phone" placeholder="Enter phone number">
            <input type="date" name="dob" value="<?php echo $dob; ?>" id="dob" placeholder="Enter date of birth">
            <input type="text" name="address" value="<?php echo $address; ?>" id="address" placeholder="Enter Address">
            <button name="eTbyT" class="green-button">Submit</button> <br>
            <button name="back" class="green-button">Go back</button>
        </form>
    </div>
    </div>
</body>

</html>