<!--Role Model-->
<?php
    
    function insert ($idrole,$deskripsi){
        include '../db.php';
//        $sql = "INSERT INTO role VALUES ('".$idrole."','".$deskripsi."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO role VALUES (?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $idrole, $deskripsi);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
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
        mysqli_stmt_close($stmt);
    }
    function viewByIdRole($idrole){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM role WHERE idrole='".$idrole."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM role WHERE idrole=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $idrole);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['idrole']=$r['idrole'];
            $value['deskripsi']=$r['deskripsi'];
            $i++;
        }
        return $value;
        mysqli_stmt_close($stmt);
    }
    function update ($idrole,$deskripsi){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "UPDATE role SET deskripsi='".$deskripsi."' WHERE idrole='".$idrole."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "UPDATE role SET deskripsi=? WHERE idrole=?");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $deskripsi, $idrole);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
    }
    function delete ($idrole){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "DELETE FROM role WHERE idrole='".$idrole."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "DELETE FROM role WHERE idrole=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $idrole);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
    }
    
?>
