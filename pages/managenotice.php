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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMS | Notices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/adminLoggedStyle.css">
</head>
<body>
    <div class="container d-flex justify-content-between">
        <!-- Navbar logo -->
        <div class="top">
                <img src="../assets/ICON/LogoBKP.png" alt="">
        </div>
        <!-- Navbar elements -->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="viewStudents.html">Students</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="adminLogged.php">Admin</a>
                        </li>
                        <li class="nav-item">
                <a class="nav-link" href="logout.php"><button class="green-button">Logout</button></a>
              </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Navbar end-->
    </div>

    <div class="container searchBox">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <input class="form-control" type="text" name="live_search" id="live_search" autocomplete="off" placeholder="Search notice . . .  ">
            </div>
            <div class="p-2 bd-highlight">
                <a href="managenotice.php">
                <button class = "green-button" onclick="return confirm('Are you sure?');"> Reset </button></a>
            </div>            
            <div class="p-2 bd-highlight">
                <a href="addNotice.php"><button class="green-button">Add</button></a>
            </div>
          </div>
        <div>
            <table class = "table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Content</th>
                  </tr>
                </thead> 

    <tbody id = "tmp"> 


        <?php
            include('../php/connection.php');
            $viwU = "SELECT * FROM notice;"; // 0 or many value return korbe 
            $run = mysqli_query($conn, $viwU); // associative array and array type
            // mysqli_fetch_assoc()

            while ($x = mysqli_fetch_array($run)) { //
              $UID = $x[0];
              $UN = $x[1];
        ?>

        <tr>
            <th> <?php echo  $UID; ?> </th>
            <th> <?php echo  $UN; ?> </th>
            <td>
             <a class = "green-button" href="editnoticeUI.php?id=<?=$UID; ?>">
             <button class = "green-button" >  Edit </button></a>
             </td>
            <td>
                <a href="deletenotice.php?id=<?=$UID;?>">
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
                        url: '../php/livesearchnotice.php',
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
        $(document).ready(function () {
            $("#live_search").keydown(function () {
                var query = $(this).val();
                if (query != "") {
                  $(document).click(function(data) {
                      $("#tmp").hide();
                    });
                    $.ajax({
                        url: '../php/livesearchnotice.php',
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
