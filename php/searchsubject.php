<?php
session_start();
if (!isset($_SESSION['Aemail'])) {
    header("Location: adminLogin.html");
}
?>
<?php
    include("connection.php");

  if (isset($_POST['query'])) {
    $q = $_POST['query'];
      $viwU = "select s.id, s.subjectTeacher , s.name , t.name , t.email from subject s join teacher t on s.subjectTeacher = t.id where s.name like '%$q%' ";
      $run = mysqli_query($conn, $viwU);
    if (mysqli_num_rows($result) > 0) {
      while ($x = mysqli_fetch_array($run)) { //
        $sid = $x[0]; // s.id
        $sname = $x[2]; //  s.name 
        $tid = $x[1]; // , s.subjectTeacher ,
        $tname = $x[3]; // , t.name 
        $email = $x[4]; // , t.email
          echo
          "<tr>
          <th> <?php echo  $sid; ?> </th>
          <th> <?php echo  $sname; ?> </th>
          <th> <?php echo  $tname; ?> </th>
          <th> <?php echo  $email; ?> </th>
             <a class = 'green-button' href='../php/editSub.php?id=<?= $sid; ?>'>
             <button class = 'green-button' >  Edit </button></a>
                <a href='../php/deletesubject.php?id=<?= $sid; ?>'>
                <button class = 'green-button' onclick='return confirm('Are you sure?');'> Delete </button></a>
            </td>
          </tr>";

          }
    } else {
      echo "<div> <br><br> <center> Subjects not found . . . </center> <br> </div>";
    }
  }

?>