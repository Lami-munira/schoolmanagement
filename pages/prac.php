<?php

include("../php/connection.php");
$ch = "INSERT INTO `schedule` (`id`, `cid`, `subid`, `day1`, `day2`, `time`) VALUES (NULL, '7', '2', 'MON', 'WED', '09:00:00'), (NULL, '7', '9', 'MON', 'WED', '');";
$R = mysqli_query($conn,$ch);

if($R==true)
{
    echo "hi";
}
else
{
    echo "bye" .$conn->error;
}

?>