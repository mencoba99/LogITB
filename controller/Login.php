<?php
    include '../db.php';
    session_start();
    if(isset($_POST['login'])){
        $stmt = mysqli_prepare($link, "SELECT * FROM user WHERE username=? AND password=?");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $_POST['username'], sha1($_POST['password']));
        $exec = mysqli_stmt_execute($stmt);
        $row = mysqli_stmt_bind_result($stmt, $usr, $pss);
        if(mysqli_stmt_fetch($stmt)){
             $_SESSION['username']=$usr;
        }else{
             $_SESSION['fail']="Username atau Password Salah";
        }
        mysqli_stmt_close($stmt);
        if(isset($_SESSION['username'])){
            $stmt = mysqli_prepare($link, "SELECT idrole FROM userrole WHERE username=?");
            $bind = mysqli_stmt_bind_param($stmt, 's', $_SESSION['username']);
            $exec = mysqli_stmt_execute($stmt);
            $row = mysqli_stmt_get_result($stmt);
//            $sql = "SELECT idrole FROM userrole WHERE username='".$_SESSION['username']."'";
//            $row2 = mysqli_query($link, $sql);
            $i=0;
            while($r = mysqli_fetch_assoc($row)){
                $_SESSION['role'][$i]=$r['idrole'];
                $i++;
            }
            echo $_SESSION['username'];
            header("Location: ../etalase.php");
        }
//        $sql = "SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".sha1($_POST['password'])."'";
//        $row = mysqli_query($link, $sql);
    }
?>

