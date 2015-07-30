<!--Approve Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Approve.php';
    
    
    
    if(isset($_POST['unapprove'])){
        update($_POST['id'], 0);
        header("Location: ../Approval.php");
    }
    
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view(sk($_SESSION['username']));
        }
        if($_SESSION['status']=="viewMhs"){
            
            $_SESSION['value']=viewMhs($_SESSION['username']);
        }
        
        
    }
    
    if(isset($_POST['view'])){
        echo $_POST['sk'];
        session_start();
        $_SESSION['value2']=view($_POST['sk']);
        header("Location: ../Approval.php");
    }
    
    if(isset($_POST['detail'])){
        echo $_POST['sk'];
        session_start();
        $_SESSION['data']=getDetail($_POST['no'],$_POST['sk']);
        header("Location: ../DetailBimbingan.php");
    }
    
    if(isset($_POST['approve'])){
        session_start();
        echo $_SESSION['username']."-".$_POST['no']."-".$_POST['sk'];
        approve($_SESSION['username'],$_POST['no'],$_POST['sk']);
        header("Location: ../DBPembimbing.php");
    }
?>
