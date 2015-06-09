<?php
    $host="localhost";
    $user="root";
    $pass="bajaksaja";
    $db="logitb";

    $link = mysqli_connect($host,$user,$pass,$db) or die("Error : " . mysqli_error($con));
?>