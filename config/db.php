<?php
$con = mysqli_connect("localhost", "root", "", "veear");

if (!$con) {
    echo "Connection failed" . mysqli_error($con);
    ;
}


?>