<!--Dosen Controller-->
<?php

 include '../model/Dosen.php';
    session_start();
    if(isset($_POST['add'])){
        $r = insert($_POST['nip'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            $_SESSION['success']="Berhasil tambah Dosen.. :)";
            header('Location: ../AddDosen.php');
        }
    }else{
        echo "ga ada data";
    }
    
?>
