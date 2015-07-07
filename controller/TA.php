<!--TA Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/TA.php';
    
    if(isset($_POST['add'])){
        $r = insert($_POST['nim'], $_POST['judul'], $_POST['topik']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah TA.. :)";
            header('Location: ../AddTA.php');
        }
    }else{
        
    }
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view();
    }
    
    if(isset($_POST['edit'])){
        $r = viewByID($_POST['id']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditTA.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['id'], $_POST['nim'], $_POST['judul'], $_POST['topik']);
        if($r){
            header('Location: ../ViewTA.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['id']);
        if($r){
            header('Location: ../ViewTA.php');
        }
    }
?>

