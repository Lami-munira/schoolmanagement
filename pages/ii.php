<?php
if(isset($_POST['submit'])){
    include("../php/connection.php");
    $class = $_GET['id']; // INSERT INTO `attendence` (`stdid`, `clsid`, `date`, `status`) VALUES ('20', '7', '2021-09-11', 'p') on duplicate key UPDATE status = 'a';

    $i = 1 ;
     $fac = $_POST['student'];
     $date = $fac[0];
     $success = true ;
    $assigned = "SELECT * FROM studentsinclass where classID = '$class' order by studentid ;";
    $rex = mysqli_query($conn, $assigned);
    if (mysqli_num_rows($rex) != 0) {
        $tran = "start transaction";
        $saction = mysqli_query($conn, $tran);
        while ($lam = mysqli_fetch_array($rex)) {
            $cid = $lam[1];
            $aorp = $fac[$i]; $i++;
            $p = "INSERT INTO `attendence` (`stdid`, `clsid`, `date`, `status`) VALUES ('$cid', '$class', '$date', '$aorp') on duplicate key UPDATE status = '$aorp';";
            $rx = mysqli_query($conn, $p);
            if (!$rx) {
                $success = false ;
              }
        }
        if($success)
        {
            $commit = "commit;";
            $rx = mysqli_query($conn, $commit);
            header('Location: teacherLogged.php');
        }
        else{
            $rol = "rollback;";
            $rx = mysqli_query($conn, $rol);
        }
}
}
?>