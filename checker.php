<?php
    session_start();
    if(isset($_SESSION['role'])){
//        $x=  count($_SESSION['role']);
//        for($i=0;$i<$x;$i++){
//            echo $_SESSION['role'][$i]."<br />";
//        }
        if(isset($_POST['Admin'])){
            $_SESSION['usedrole']="Admin";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['TU_Akademik'])){
            $_SESSION['usedrole']="TU_Akademik";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Mahasiswa'])){
            $_SESSION['usedrole']="Mahasiswa";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Pembimbing_TA'])){
            $_SESSION['usedrole']="Pembimbing_TA";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Penguji_TA'])){
            $_SESSION['usedrole']="Penguji_TA";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Kaprodi'])){
            $_SESSION['usedrole']="Kaprodi";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Tim_TA'])){
            $_SESSION['usedrole']="Tim_TA";
            header('Location: ViewProfile.php');
        }
        
        if(isset($_POST['Wali'])){
            $_SESSION['usedrole']="Wali";
            header('Location: ViewProfile.php');
        }
    }
?>

