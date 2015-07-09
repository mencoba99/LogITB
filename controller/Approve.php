<!--Approve Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Approve.php';
    
    if(isset($_POST['approve'])){
        update($_POST['id'], 1);
        header("Location: ../Approval.php");
    }
    
    if(isset($_POST['unapprove'])){
        update($_POST['id'], 0);
        header("Location: ../Approval.php");
    }
    
    if(isset($_SESSION['status'])){
        $_SESSION['value'] = view($_SESSION['username']);
    }
?>
