<!--Dosen Model-->
<?php
    
    function insert ($nip,$nama,$inisial,$email,$alamat,$telp){
        include '../db.php';
        $stmt = mysqli_prepare($link, "INSERT INTO dosen VALUES (?,?,?,?,?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'ssssss', $nip, $nama, $inisial, $email, $alamat, $telp);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
//        $sql = "INSERT INTO dosen VALUES ('".$nip."','".$nama."','".$inisial."','".$email."','".$alamat."','".$telp."')";
//        return mysqli_query($link,$sql);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM dosen";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nip'][$i]=$r['nip'];
            $value['nama'][$i]=$r['nama'];
            $value['inisial'][$i]=$r['inisial'];
            $value['email'][$i]=$r['email'];
            $value['alamat'][$i]=$r['alamat'];
            $value['telp'][$i]=$r['noTelp'];
            $i++;
        }
        return $value;
    }
    function viewByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nip']=$r['nip'];
            $value['nama']=$r['nama'];
            $value['inisial']=$r['inisial'];
            $value['email']=$r['email'];
            $value['alamat']=$r['alamat'];
            $value['telp']=$r['noTelp'];
            $i++;
        }
        return $value;
    }
    function update ($nip,$nama,$inisial,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $stmt = mysqli_prepare($link, "UPDATE dosen SET nama=?,inisial=?,email=?,alamat=?,noTelp=? WHERE nip=?");
        $bind = mysqli_stmt_bind_param($stmt, 'ssssss', $nama, $inisial, $email, $alamat, $telp, $nip);
        $exec - mysqli_stmt_execute($stmt);
        return $exec;
//        $sql = "UPDATE dosen SET nama='".$nama."',inisial='".$inisial."',email='".$email."',alamat='".$alamat."',noTelp='".$telp."' WHERE nip='".$nip."'";
//        return mysqli_query($link,$sql) or die(mysqli_error($link));
    }
    function delete ($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $stmt = mysqli_prepare($link, "DELETE FROM dosen WHERE nip=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nip);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
//        $sql = "DELETE FROM dosen WHERE nip='".$nip."'";
//        return mysqli_query($link,$sql);
    }
    
?>
