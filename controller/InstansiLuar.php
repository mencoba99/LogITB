<!--Instansi Luar Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/InstansiLuar.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['kodeinstansi'], $_POST['jenis'], $_POST['namalengkap'], $_POST['namasingkat'], 
                $_POST['alamat'], $_POST['email'], $_POST['notelp'], $_POST['website'], 
                $_POST['namakontak'], $_POST['keterangan']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah Instansi Luar.. :)";
            header('Location: ../AddInstansiLuar.php');
        }
    }else{
        //echo "ga ada data";
    }
    
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view();
    }
    
    if(isset($_POST['edit'])){
        $r = viewByKodeInstansi($_POST['kodeinstansi']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditInstansiLuar.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['kodeinstansi'], $_POST['jenis'], $_POST['namalengkap'], 
                $_POST['alamat'], $_POST['email'], $_POST['notelp'], $_POST['website'], 
                $_POST['namakontak'], $_POST['keterangan']);
        if($r){
            header('Location: ../ViewInstansiLuar.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['nip']);
        if($r){
            header('Location: ../ViewInstansiLuar.php');
        }
    }
?>
