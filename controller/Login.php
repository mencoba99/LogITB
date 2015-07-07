<?php
    include '../db.php';
    session_start();
    if(isset($_POST['login'])){
        $sql = "SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".sha1($_POST['password'])."'";
        $row = mysqli_query($link, $sql);
        if($r =  mysqli_fetch_assoc($row)){
            $_SESSION['username']=$r['username'];
        }else{
            $_SESSION['fail']="Username atau Password Salah";
            header("Location: ../index.php");
        }
        if(isset($_SESSION['username'])){
            $sql = "SELECT idrole FROM userrole WHERE username='".$_SESSION['username']."'";
            $row = mysqli_query($link, $sql);
            $i=0;
            while($r = mysqli_fetch_assoc($row)){
                $_SESSION['role'][$i]=$r['idrole'];
                $i++;
            }
            header("Location: ../etalase.php");
        }
    }
?>

