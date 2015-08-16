<!--Dashboard Model-->
<?php
    
    function getUserCount(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT COUNT(username) as jml FROM user";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            return $r['jml'];
        }else{
            return 0;
        }
    }
    
    function getRoleCount(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT COUNT(idrole) as jml FROM role";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            return $r['jml'];
        }else{
            return 0;
        }
    }
    
    function getTACount(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT COUNT(nosk) as jml FROM skbimbinganta";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            return $r['jml'];
        }else{
            return 0;
        }
    }
    
    function getTAAktif(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT COUNT(nosk) as jml FROM skbimbinganta WHERE status='Aktif'";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            return $r['jml'];
        }else{
            return 0;
        }
    }
?>

