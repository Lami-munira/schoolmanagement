<?php
if(!isset($_SESSION['Aemail']))
{
    header("Location: adminLogin.html");
}
?>
<?php
if(isset($_POST['back']))
{
    header('Location: manageClass.php');
}
if(isset($_POST['addCsub']))
{
    include("../php/connection.php");
    $id = $_POST['classID'];
    $teacher = $_POST['teacherid'];
    $che = "Select * from class where id = '$id';";
    $R = mysqli_query($conn, $che);
    if (mysqli_num_rows($R)>0) {
        header('Location: manageClass.php');
    }
    else
    {
        $che = "INSERT INTO `class` (`id`, `classTeacherID`) VALUES ('$id', '$teacher');";
        $R = mysqli_query($conn, $che);
        if($R)
        {

        }
        else
        {
            
        }
    }
}


?>