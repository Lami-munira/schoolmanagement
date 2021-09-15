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
    <title>DMS | Subject</title>
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
                <input class="form-control" type="text" name="live_search" id="live_search" placeholder="Search Subject . . .  ">
            </div>
            <div class="p-2 bd-highlight">
                <a href="manageSubject.php">
                <button class = "green-button" onclick="return confirm('Are you sure?');"> Reset </button></a>
            </div>  
            <div class="p-2 bd-highlight">
                <a href="addsub.php"><button class="green-button">Add</button></a>
            </div>
          </div>
        <div>
            <table class="table">
                <thead>
                  <tr>
                  <th scope="col">Subject ID</th>
                  <th scope="col">Subject Name </th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Teacher Email</th>
                  </tr>
                </thead>
                <tbody id = "tmp"> 


<?php
    include('../php/connection.php');
    $viwU = "select s.id, s.subjectTeacher , s.name , t.name , t.email from subject s join teacher t on s.subjectTeacher = t.id order by s.id;"; 
    $run = mysqli_query($conn, $viwU); // associative array and array type


    while ($x = mysqli_fetch_array($run)) { //
        $sid = $x[0]; // s.id
        $sname = $x[2]; //  s.name 
        $tid = $x[1]; // , s.subjectTeacher ,
        $tname = $x[3]; // , t.name 
        $email = $x[4]; // , t.email
?>

<tr>
<th> <?php echo  $sid; ?> </th>
<th> <?php echo  $sname; ?> </th>
<th> <?php echo  $tname; ?> </th>
<th> <?php echo  $email; ?> </th>
    <td>
    <a class = "green-button" href="../php/editSub.php?id=<?= $sid; ?>">
     <button class = "green-button" >  Edit </button></a>
     </td>
    <td>
        <a href="../php/deletesubject.php?id=<?= $sid; ?>">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                  $(document).click(function(data) {
                      $("#tmp").hide();
                    });
                    $.ajax({
                        url: '../php/searchsubject.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {

                            $('#tmp').html("");
                            $('#searchR').html(data);
                        }
                    });
                } else {
                   $('#tmp').css('display', 'none');
                }
            });
        });
        
    </script>
</body>
</html>