<!--Role Model-->
<?php
    
    function insert ($idrole,$deskripsi){
        include '../db.php';
        $sql = "INSERT INTO Role VALUES ('".$idrole."','".$deskripsi."')";
        return mysqli_query($link,$sql);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM role";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['idrole'][$i]=$r['idrole'];
            $value['deskripsi'][$i]=$r['deskripsi'];
            $i++;
        }
        return $value;
    }
    function viewByIdRole($idrole){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM Role WHERE idrole='".$idrole."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['idrole']=$r['idrole'];
            $value['deskripsi']=$r['deskripsi'];
            $i++;
        }
        return $value;
    }
    function update ($idrole,$deskripsi){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE Role SET deskripsi='".$deskripsi."' WHERE idrole='".$idrole."'";
        return mysqli_query($link,$sql);
    }
    function delete ($idrole){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM Role WHERE idrole='".$idrole."'";
        return mysqli_query($link,$sql);
    }
    
?>
