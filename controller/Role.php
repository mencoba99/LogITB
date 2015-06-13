<!--Role Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Role.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['idrole'], $_POST['deskripsi']);
        if($r){
            $_SESSION['success']="Berhasil tambah Role.. :)";
            header('Location: ../AddRole.php');
        }
    }else{
        //echo "ga ada data";
    }
    
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view();
    }
    
    if(isset($_POST['edit'])){
        $r = viewByIdRole($_POST['idrole']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditRole.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['idrole'], $_POST['deskripsi']);
        if($r){
            header('Location: ../ViewRole.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['idrole']);
        if($r){
            header('Location: ../ViewRole.php');
        }
    }
?>
