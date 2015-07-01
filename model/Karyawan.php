<!--Karyawan Model-->
<?php
    
    function insert ($nip,$nama,$email,$alamat,$telp){
        include '../db.php';
        $sql = "INSERT INTO karyawan VALUES ('".$nip."','".$nama."','".$email."','".$alamat."','".$telp."')";
        return mysqli_query($link,$sql);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM karyawan";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nip'][$i]=$r['nip'];
            $value['nama'][$i]=$r['nama'];
            $value['email'][$i]=$r['email'];
            $value['alamat'][$i]=$r['alamat'];
            $value['telp'][$i]=$r['noTelp'];
            $i++;
        }
        return $value;
    }
    function viewByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM karyawan WHERE nip='".$nip."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nip']=$r['nip'];
            $value['nama']=$r['nama'];
            $value['email']=$r['email'];
            $value['alamat']=$r['alamat'];
            $value['telp']=$r['noTelp'];
            $i++;
        }
        return $value;
    }
    function update ($nip,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE karyawan SET nama='".$nama."',email='".$email."',alamat='".$alamat."',noTelp='".$telp."' WHERE nip='".$nip."'";
        return mysqli_query($link,$sql);
    }
    function delete ($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM karyawan WHERE nip='".$nip."'";
        return mysqli_query($link,$sql);
    }
    
?>
