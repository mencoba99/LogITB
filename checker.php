<?php
    session_start();
    if(isset($_SESSION['role'])){
//        $x=  count($_SESSION['role']);
//        for($i=0;$i<$x;$i++){
//            echo $_SESSION['role'][$i]."<br />";
//        }
        if(isset($_POST['Admin'])){
            $_SESSION['usedrole']="Admin";
            header('Location: DBAdmin.php');
        }
    }
?>

