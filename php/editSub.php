<?php
session_start();
if(!isset($_SESSION['Aemail']))
{
    header("Location: ../pages/adminLogin.html");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['back'])) {
        header('Location: ../pages/manageSubject.php');
    }
    if (isset($_POST['editsub'])) {
        include("connection.php");
        $id = $_GET['id'];
        $teacher = $_POST['teacher'];
        $sub = $_POST['name'];
        $che = "Select * from subject where id = '$id';";
        $R = mysqli_query($conn, $che);
        if (mysqli_num_rows($R)==0) {
            echo "<script> alert('Subject already Exist!!') </script>";
            // header('Location: manageClass.php');
        } else if (empty($sub))
        {
            echo "<script> alert('Enter Subject Name!!') </script>";

        }
        else {
            $che = "UPDATE `subject` SET `subjectTeacher` = '$teacher' WHERE `subject`.`id` = '$id';";
            $R = mysqli_query($conn, $che);
            if ($R) {
                $che = "UPDATE `subject` SET name = '$sub' WHERE `subject`.`id` = '$id';";
                $R = mysqli_query($conn, $che);
                if ($R) {
                echo '<div class="alert alert-success" role="alert">New Class Added </div>';
                header('Location: ../pages/manageSubject.php');}
            } else {
                echo '<div class="alert alert-danger" role="alert">Unsuccessful. Try Again Later </div>';
                header('Location: ../pages/manageSubject.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
        textarea{
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
    <title>Edit Subject</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">

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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    $idd = $_GET['id'] ; 
    $viwU = "select s.id, s.subjectTeacher , s.name , t.name   from subject s join teacher t on s.subjectTeacher = t.id where s.id = '$idd';";
    $run = mysqli_query($conn, $viwU);
    $x = mysqli_fetch_array($run);
        $tid = $x[1];
        $sname = $x[2]; 
        $tname = $x[3]; 
        ?>

<div class="container addStudentBox">
            <form action = "editSub.php?id=<?= $idd; ?>" method="POST">
                <div class="mb-3">
                  <label  for="exampleInputEmail1" class="form-label">Subject Name</label>
                  <input type="text" name = "name" class="form-control" value = "<?php echo $sname; ?>">
                </div>
                <label  class="form-label">Teacher ID</label> <br>
                    <select name="teacher">
                    <option value="<?php echo $tid; ?>"> <?php echo $tname; ?> </option>
                        <?php
                        include("../php/connection.php");
                        $viwU = "SELECT * FROM teacher;";
                        $run = mysqli_query($conn, $viwU);
                        while ($x = mysqli_fetch_assoc($run)) {
                            $idx = $x['id'];
                            $namex = $x['name'];  ?>
                            <option value="<?php echo $idx; ?>"> <?php echo $namex; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                <button name="editsub" class="green-button">Submit</button>
                <button name="back" class="green-button">Go back</button>
            </form>
        </div>
    </div>
</body>

</html>