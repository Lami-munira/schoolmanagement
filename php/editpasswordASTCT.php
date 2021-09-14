<?php
session_start();
if(!isset($_SESSION['Aemail']))
{
    header("Location: adminLogin.html");
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
    <title>Edit Notice</title>
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
<?php
include("../php/connection.php");
$info = $_GET['id'];
$gt = "select * from notice where id = $info" ;
$fnd = mysqli_query($conn,$gt);
$row = mysqli_fetch_assoc($fnd);
/*
echo $row['sid']; echo '<br>' ; 
echo $row['name']; echo '<br>' ; 
echo $row['age']; echo '<br>' ; 
echo $row['gender']; echo '<br>' ; 
echo $row['email']; echo '<br>' ; 
echo $row['phone']; echo '<br>' ; 
echo $row['date']; echo '<br>' ; */
?>
<br> <br>
<br> <br>
<center>
<form action = "editnotice.php?id=<?=$row['id']?>" method = "post">
<textarea name="desc" id="desc" cols="9" rows="9" placeholder="<?php echo $row['content']; ?>"><?php echo $row['content']; ?></textarea><br>
<input class = "green-button" type = "submit" name = "update" value ="Update">
<input class = "green-button" type = "submit" name = "back" value ="Back"><br>
</form>
</body>

</html>