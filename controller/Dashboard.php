<!--Dashboard Controller-->
<?php
    
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Dashboard.php';
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=='viewAdmin'){
            $_SESSION['userCount']=getUserCount();
            $_SESSION['roleCount']=getRoleCount();
        }
        if($_SESSION['status']=='viewTU'){
            $_SESSION['TACount']=getTACount();
            $_SESSION['TAACount']=getTAAktif();
        }
    }
?>

