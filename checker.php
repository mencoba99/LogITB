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
        
        if(isset($_POST['TU_Akademik'])){
            $_SESSION['usedrole']="TU_Akademik";
            header('Location: DBTU.php');
        }
        
        if(isset($_POST['Mahasiswa'])){
            $_SESSION['usedrole']="Mahasiswa";
            header('Location: DBMhs.php');
        }
        
        if(isset($_POST['Pembimbing_TA'])){
            $_SESSION['usedrole']="Pembimbing_TA";
            header('Location: DBPembimbingTA.php');
        }
        
        if(isset($_POST['Penguji_TA'])){
            $_SESSION['usedrole']="Penguji_TA";
            header('Location: DBPengujiTA.php');
        }
        
        if(isset($_POST['Pembimbing_KP'])){
            $_SESSION['usedrole']="PembimbingKP";
            header('Location: DBPembimbingKP.php');
        }
        
        if(isset($_POST['Penguji_KP'])){
            $_SESSION['usedrole']="PengujiKP";
            header('Location: DBPengujiKP.php');
        }
        
        if(isset($_POST['Kaprodi'])){
            $_SESSION['usedrole']="Kaprodi";
            header('Location: DBKaprodi.php');
        }
        
        if(isset($_POST['Tim_TA'])){
            $_SESSION['usedrole']="Tim_TA";
            header('Location: DBTimTA.php');
        }
        
        if(isset($_POST['Tim_KP'])){
            $_SESSION['usedrole']="Tim_KP";
            header('Location: DBTimKP.php');
        }
        
        if(isset($_POST['Tim_Kemahasiswaan'])){
            $_SESSION['usedrole']="Tim_Kemahasiswaan";
            header('Location: DBTimSKPI.php');
        }
        
        if(isset($_POST['Wali'])){
            $_SESSION['usedrole']="Wali";
            header('Location: DBWali.php');
        }
    }
?>

