<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Teachers</title>
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
                            <a class="nav-link" href="adminLogged.html">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loginPage.html">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar end-->
    </div>
    <!-- all works related to showing + adding + searching + deleting + editing -->
    <div class="container searchBox">
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th></th>
                        <th>
                            <a href="addTeacher.php"><button class="green-button">Add</button></a>
                        </th>
                    </tr>
                </thead>
                <tbody id="tmp">


                    <?php
                    include('../php/connection.php');
                    $viwU = "SELECT * FROM teacher;"; // 0 or many value return korbe 
                    $run = mysqli_query($conn, $viwU); // associative array and array type


                    while ($x = mysqli_fetch_assoc($run)) { //
                        $id = $x['id'];
                        $name = $x['name'];
                        $gender = $x['gender'];
                        $phone = $x['phone'];
                        $email = $x['email'];
                    ?>

                        <tr>
                            <th> <?php echo  $id; ?> </th>
                            <th> <?php echo  $name; ?> </th>
                            <th> <?php echo  $gender; ?> </th>
                            <th> <?php echo  $phone; ?> </th>
                            <th> <?php echo  $email; ?> </th>
                            <td>
                                <a class="green-button" href="../php/editTbyA.php?id=<?= $id; ?>">
                                    <button class="green-button"> Edit </button></a>
                            </td>
                            <td>
                                <a href="../php/delT.php?id=<?= $id; ?>">
                                    <button class="green-button" onclick="return confirm('Are you sure?');"> Delete </button></a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>

                <tbody id="searchR"></tbody>
            </table>
        </div>
    </div>
    <div class="container back-btn">
        <a href="adminLogged.php"><button class="green-button">Go back</button></a>
    </div>

</body>

</html>