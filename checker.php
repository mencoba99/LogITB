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
        
        if(isset($_POST['Mahasiswa'])){
            $_SESSION['usedrole']="Mahasiswa";
            header('Location: DBMhs.php');
        }
        
        if(isset($_POST['Pembimbing_TA'])){
            $_SESSION['usedrole']="Pembimbing_TA";
            header('Location: DBPembimbing.php');
        }
        
        if(isset($_POST['TU_Akademik'])){
            $_SESSION['usedrole']="TU_Akademik";
            header('Location: DBTU.php');
        }
    }
?>

