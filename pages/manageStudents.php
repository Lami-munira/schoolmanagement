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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Students</title>
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
     <!-- all works related to showing + adding + searching + deleting + editing -->
    <div class="container searchBox">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <input class="form-control" type="text" placeholder="Search" aria-label="default input example">
            </div>
            <div class="p-2 bd-highlight">
                <a href="addTeacher.html"><button class="green-button">Add</button></a>
            </div>
          </div>
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Class</th>
                  </tr>
                </thead>
                <tbody id = "tmp"> 


<?php
    include('../php/connection.php');
    $viwU = "SELECT * FROM student;"; // 0 or many value return korbe 
    $run = mysqli_query($conn, $viwU); // associative array and array type


    while ($x = mysqli_fetch_assoc($run)) { //
        $id = $x['id'];
        $name = $x['name'];
        $gender = $x['gender'];
        $phone = $x['phone'];
        $email = $x['email'];
        $class = $x['current_class'];
?>

<tr>
<th> <?php echo  $id; ?> </th>
<th> <?php echo  $name; ?> </th>
<th> <?php echo  $gender; ?> </th>
<th> <?php echo  $phone; ?> </th>
<th> <?php echo  $email; ?> </th>
<th> <?php echo  $class; ?> </th>
    <td>
    <a class = "green-button" href="#">
     <button class = "green-button" >  Edit </button></a>
     </td>
    <td>
        <a href="#">
        <button class = "green-button" onclick="return confirm('Are you sure?');"> Delete </button></a>
    </td>
</tr>

     <?php
}
     ?>
     </tbody>

     <tbody id = "searchR"></tbody>
            </table>
        </div>
    </div>
    <div class="container back-btn">
        <a href="adminLogged.php"><button class="green-button">Go back</button></a>
    </div>

</body>
</html>