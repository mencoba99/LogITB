<!--Karyawan Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Karyawan.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nip'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah Karyawan.. :)";
            header('Location: ../AddKaryawan.php');
        }
    }else{
        //echo "ga ada data";
    }
    
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view();
        }
        if($_SESSION['status']=="viewKaryawan"){
            $_SESSION['data'] = viewByNip($_SESSION['username']);
        }
    }
    
    if(isset($_POST['edit'])){
        $r = viewByNip($_POST['nip']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditKaryawan.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['nip'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            header('Location: ../ViewKaryawan.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['nip']);
        if($r){
            header('Location: ../ViewKaryawan.php');
        }
    }
?>
