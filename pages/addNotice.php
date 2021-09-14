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
    <title>Add Notice</title>
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

            </nav>
        </div>
        <!--Navbar end-->
    </div>

    <div class="container addStudentBox"><center>
        <h2>Add notice</h2>
        <form action="../php/addnotice.php" method="POST">
            <textarea name="desc" id="desc" cols="9" rows="9" placeholder="Enter Content of Notice..."></textarea><br>
            <input type="submit" class="green-button" name="addnotice" value="Submit">
            <a href = "managenotice.php"> <button class = "green-button" name="back" >Back</button></a>
          </form> </center>
    </div>
    <!--
    <script src="../scripts/addStudentScript.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    -->
</body>
</html>