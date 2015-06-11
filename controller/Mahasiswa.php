<!--Mahasiswa Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/log-itb/model/Mahasiswa.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nim'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah mahasiswa.. :)";
            header('Location: ../AddMahasiswa.php');
        }
    }else{
        
    }
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view();
    }
    
    if(isset($_POST['edit'])){
        $r = viewByNim($_POST['nim']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditMahasiswa.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['nim'], $_POST['nama'], $_POST['email'], $_POST['alamat'], $_POST['telp']);
        if($r){
            header('Location: ../ViewMahasiswa.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['nim']);
        if($r){
            header('Location: ../ViewMahasiswa.php');
        }
    }
?>

