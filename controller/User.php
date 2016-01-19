<!--User Controller-->
<?php

 include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/User.php';

    
    if(isset($_POST['add'])){
        if(matchPassword($_POST['password'], $_POST['password2'])){
            if(checkUser($_POST['username'])){
                $r = insert($_POST['username'], $_POST['password']);
                if($r){
                    session_start();
                    $_SESSION['success']="Berhasil tambah User";
                    header('Location: ../AddUser.php');
                }
            }else{
                 session_start();
                 $_SESSION['fail']="Username bukan termasuk, NIM, NIP atau ID terdaftar";
                 header('Location: ../AddUser.php');
            }
        }else {
            session_start();
            $_SESSION['fail']="Password tidak sama";
            header('Location: ../AddUser.php');
        }
    }
    
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view();
            $_SESSION['post'] = viewPengumuman();
        }
        if($_SESSION['status']=="viewUser"){
            $_SESSION['data'] = viewByUsername($_SESSION['username']);
        }
    }
    
    if(isset($_POST['edit'])){
        $r = viewByUsername($_POST['username']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditUser.php');
    }
    
    if(isset($_POST['update'])){
        if(checkPassword($_POST['username'], $_POST['password'])&&  matchPassword($_POST['passwordbaru'], $_POST['passwordbaru2'])){
            $r = update($_POST['username'], $_POST['passwordbaru']);
            session_start();
            if($r){
                $_SESSION['success']="Berhasil Ubah Data User";
                header('Location: ../EditUser.php');
            }
        }else{
            $_SESSION['fail']="Gagal Ubah Data User";
            header('Location: ../EditUser.php');
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
        session_start();
        $_SESSION['datadetail']=$r;
        $value = checkUserValue($r['username']);
        $id="";
        if($value=="Karyawan"){
            $id=viewByNipKaryawan($r['username']);
            $nama=$id['nama'];
        }
        if($value=="Dosen"){
            $id=viewByNipDosen($r['username']);
            $nama=$id['nama'];
        }
        if($value=="Mahasiswa"){
            $id=viewByNim($r['username']);
            $nama=$id['nama'];
        }
        $role = viewRole($r['username']);
        $str = "Nama : ".$nama."<br />";
        $str .= "<table class=\"table table-bordered\">";
        $str .= "<tr><th>Role</th></tr>";
        $x=count($role);
        for($i=0;$i<$x;$i++){
            $str .= "<tr><td>".$role[$i]."</td></tr>";
        }
        $str .= "</table>";
        $_SESSION['datadetail']['str']=$str;
        header('Location: ../ViewDetailUser.php');
    }
    
    if(isset($_POST['managerole'])){
        $r = viewByUsername($_POST['username']);
        session_start();
        $_SESSION['managerole']=$r;
        header('Location: ../ManageRole.php');
    }
    
    if(isset($_POST['saverole'])){
        clearRole($_POST['username']);
        $x = count($_POST['role']);
        for($i=0;$i<$x;$i++){
            addRole($_POST['username'], $_POST['role'][$i]);
        }
        session_start();
        header('Location: ../ViewUser.php');
    }
    
    
    
?>
