<!--Laporan Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Laporan.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nim'], $_POST['p'], $_POST['lapor'],$_POST['tgl']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah TA.. :)";
            header('Location: ../Laporan.php');
        }
    }else{
        
    }
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view();
        }
        if($_SESSION['status']=="collect"){
            
            $_SESSION['dosen']=viewDosen($_SESSION['username']);
        }
    }
    
?>

