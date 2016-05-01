<?php
    if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Admin")){
        include './AdminMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa")){
        include './MhsMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik")){
        include './TUMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA")){
        include './PembimbingTAMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Penguji_TA")){
        include './PengujiTAMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA")){
        include './TimTAMenu.php';
    }
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali")){
        include './WaliMenu.php';
    } 
    else if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi")){
        include './KaprodiMenu.php';
    } 
?>