<!--Laporan Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Laporan.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nim'], $_POST['sk'],$_POST['tgl'],$_POST['lapor'],$_POST['tgl2'],$_POST['lapor2']);
        echo $_POST['nim']."-".$_POST['sk']."-(".$_POST['tgl'].")(".$_POST['tgl2'].")";
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah TA.. :)";
            header('Location: ../Laporan.php');
        }
    }else{
        
    }
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view(sk($_SESSION['username']));
        }
        if($_SESSION['status']=="collect"){
            
            $_SESSION['nosk']=sk($_SESSION['username']);
        }
    }
    
?>

