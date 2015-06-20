<!--User Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/User.php';

    
    if(isset($_POST['add'])){
        if(checkUser($_POST['username'])){
            $r = insert($_POST['username'], $_POST['password']);
            if($r){
                session_start();
                $_SESSION['success']="Berhasil tambah User.. :)";
                header('Location: ../AddUser.php');
            }
        }
        else{
             session_start();
             $_SESSION['fail']="Username bukan termasuk, NIM, NIP atau ID terdaftar";
             header('Location: ../AddUser.php');
        }
    }
    
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view();
    }
    
    if(isset($_POST['edit'])){
        $r = viewByUsername($_POST['username']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditUser.php');
    }
    
    if(isset($_POST['update'])){
        $r = update($_POST['username'], $_POST['password']);
        if($r){
            header('Location: ../ViewUser.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['username']);
        if($r){
            header('Location: ../ViewUser.php');
        }
    }
    
    if(isset($_POST['detail'])){
        $r = viewByUsername($_POST['username']);
        //echo $r['username'];
        session_start();
        $_SESSION['datadetail']=$r;
        header('Location: ../ViewDetailUser.php');
    }
    
    function checkUser ($username){
    $valid = false;
    if(is_null(viewByNim($username))){
            if(is_null(viewByNipDosen($username))){
                if(is_null(viewByNipKaryawan($username))){
                }
                else{
                    $valid=true;} 
            }
            else {
               $valid=true;}           
        }
        else {
           $valid=true;}
    return $valid;
    }
    
?>
