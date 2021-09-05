<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About DMS</title>
</head>
<body>
    <h1>This page is under construction...</h1>
    <a href = "#" ><button> Go Back </button></a>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
    <link rel="stylesheet" href="../styles/style.css">
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
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link"" href=" ../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="loginType.html"><button class="green-button">Sign in</button></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar end-->
    </div>
</div>
    <br>
    <br>
    <center> <h2> Notice </h2> <br>
    <table class = "table">
        <thead colspan = "10"></thead>
                <?php
        include('../php/connection.php');
        $viwU = "SELECT * FROM notice order by id desc;"; // 0 or many value return korbe 
        $run = mysqli_query($conn, $viwU); // associative array and array type
        // mysqli_fetch_assoc()
        while ($x = mysqli_fetch_array($run)) { //
            $UN = $x[1];
        ?>
            <tr>
                <th colspan = "10"> <?php echo  $UN; echo '<br>'; ?> </th>
            </tr> 
        <?php
        }
        ?>
            </table>
</center>
</body>
</html>