<!--Mahasiswa Controller-->
<?php
    include '../model/Mahasiswa.php';
    session_start();
    if(isset($_POST['add'])){
        $r = insert($_POST['nim'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            $_SESSION['success']="Berhasil tambah mahasiswa.. :)";
            header('Location: ../AddMahasiswa.php');
        }
    }else{
        echo "ga ada data";
    }
    
?>

