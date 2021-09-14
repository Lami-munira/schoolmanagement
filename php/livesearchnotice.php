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
      $query = "SELECT * FROM notice WHERE content LIKE '%$q%'";
      $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $id    =  $row[0];
          $content  =  $row[1];
          echo
          "<tr>
            <td scope='col' >$id</td>
            <td colspan = '10' scope='col'>$content</td>
            <td></td><td>
             <a class = 'green-button' href='editnoticeUI.php?id=<?=$id; ?>'>
             <button class = 'green-button' >  Edit </button></a>
                <a href='deletenotice.php?id=<?=$id; ?>'>
                <button class = 'green-button' onclick='return confirm('Are you sure?');'> Delete </button></a>
            </td>
          </tr>";

          }
    } else {
      echo "<div> <br><br> <center> Notice not found . . . </center> <br> </div>";
    }
  }

?>