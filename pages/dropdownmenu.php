<?php
include("../php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Notices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
</head>
<body>
    <form action="select.php" method="POST">
        <input id = "namee" >
    <select name  = "teacherid"> 
    <?php
include("../php/connection.php");
$viwU = "SELECT * FROM teacher;"; 
    $run = mysqli_query($conn, $viwU); 
    while ($x = mysqli_fetch_assoc($run)) { 
        $id = $x['id'];
        $name = $x['name'];  ?>
        <option value = "<?php echo $id ;?>"> <?php echo $name ;?> </option>
    <?php 
    }
    ?>
    </select>
<button id = "submit" >Submit </button> </form>
</body>
</html>
