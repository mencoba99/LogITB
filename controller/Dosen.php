<!--Dosen Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Dosen.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nip'], $_POST['nama'], $_POST['inisial'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah Dosen.. :)";
            header('Location: ../AddDosen.php');
        }
    }else{
        //echo "ga ada data";
    }
    
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view();
        }
        if($_SESSION['status']=="viewDosen"){
            $_SESSION['data'] = viewByNip($_SESSION['username']);
        }
    }
    
    if(isset($_POST['edit'])){
        $r = viewByNip($_POST['nip']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditDosen.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['nip'], $_POST['nama'], $_POST['inisial'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            if($_SESSION['usedrole']=="Admin"){
                header('Location: ../ViewDosen.php');
            }else{
                header('Location: ../etalase.php');
            }
        }else{
            echo "error".$r;
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['nip']);
        if($r){
            header('Location: ../ViewDosen.php');
        }
    }
?>
