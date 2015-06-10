<?php
    $host="localhost";
    $user="root";
    $pass="bajaksaja";
    $db="log-itb";

    $link = mysqli_connect($host,$user,$pass,$db) or die("Error : " . mysqli_error($con));
?>