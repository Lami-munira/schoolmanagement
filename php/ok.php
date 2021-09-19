<html>

<head>
    <title>grade</title>
</head>

<body>
    <?php $idd = array();
    ?>
    <form action="../pages/ii.php" method="POST">
        <table>
            <tr>
                <th>studentid</th>
                <th>comments</th>
            </tr>
            <?php
            include("connection.php");
            $assigned = "SELECT * FROM studentsinclass where classID = 1;";
            $idd = array();
            $rex = mysqli_query($conn, $assigned);
            while ($lam = mysqli_fetch_array($rex)) {
                $stdid = $lam[1];
                // $idd[$stdid] = 'P'; student[3] = Present
                //student['$stdid']; 1 present 2 absent
            ?>
                <tr>
                    <td> <?php echo $stdid ;?>
                    </td>
                    <td><select name='student[]'>
                            <option value="p">Present</option>
                            <option value="a">Absent</option>
                        </select></label></td>
                </tr>
            <?php
            } ?>
        </table>
        <input type="submit" name = "submit" value="submit">
    </form>
</body>

</html>