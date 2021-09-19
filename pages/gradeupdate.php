<?php // ?id=<?= $id;
session_start();
if (!isset($_SESSION['Temail'])) {
    header("Location: TeacherLogin.html");
}
?>

<?php
if(isset($_POST['back']))
{
    header("Location: teacherLogged.php");
}
if (isset($_POST['Submit'])) {
    include("../php/connection.php");
    $clasSub = $_GET['id']; // INSERT INTO `attendence` (`stdid`, `clsid`, `date`, `status`) VALUES ('20', '7', '2021-09-11', 'p') on duplicate key UPDATE status = 'a';

    $i = 0;
    $fac = $_POST['student'];
    $success = true;
    $assigned = "SELECT s.name,s.id FROM subjectsinclass sc join student s on sc.classID = s.current_class where sc.id = '$clasSub order by s.id,s.name';";
    $rex = mysqli_query($conn, $assigned);
    if (mysqli_num_rows($rex) != 0) {
        $tran = "start transaction";
        $saction = mysqli_query($conn, $tran);
        while ($lam = mysqli_fetch_array($rex)) {
            $sid = $lam[1];
            $grade = $fac[$i];
            $xp = 0.0;
            $grd = array(
                'A' => 4.0 ,
                'A-'=> 3.7 ,
                'B' => 3.3,
                'B-'=> 3.0,
                'C' => 2.7,
                'D'=> 2.3,
                'I'=> 0.1
            );
            $xp = $grd[$grade];
            $i++;
            $p = "INSERT INTO `grade` (`student`, `id`, `grd`, `cgpa`, `date`) VALUES ('$sid', '$clasSub', '$grade', '$xp', current_timestamp()) on duplicate key update grd = '$grade', cgpa = '$xp';";
            $rx = mysqli_query($conn, $p);
            if (!$rx) {
                $success = false;
            }
        }
        if ($success) {
            $commit = "commit;";
            $rx = mysqli_query($conn, $commit);
            header('Location: teacherLogged.php');
        } else {
            $rol = "rollback;";
            $rx = mysqli_query($conn, $rol);
        }
    }
}
?>