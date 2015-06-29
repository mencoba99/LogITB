<!--User Model-->
<?php
    
    function insert ($username,$password){
        include '../db.php';
        $sql = "INSERT INTO User VALUES ('".$username."','".$password."')";
        return mysqli_query($link,$sql);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM User";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['username'][$i]=$r['username'];
            $value['password'][$i]=$r['password'];
            $i++;
        }
        return $value;
    }
    function viewByUsername($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM User WHERE username='".$username."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['username']=$r['username'];
            $value['password']=$r['password'];
            $i++;
        }
        return $value;
    }
    function update ($username,$password){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE User SET password='".$deskripsi."' WHERE username='".$username."'";
        return mysqli_query($link,$sql);
    }
    function delete ($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM User WHERE username='".$username."'";
        return mysqli_query($link,$sql);
    }
    
    function viewByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM Mahasiswa WHERE nim='".$nim."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nim']=$r['nim'];
            $value['nama']=$r['nama'];
            $value['email']=$r['email'];
            $value['alamat']=$r['alamat'];
            $value['telp']=$r['noTelp'];
            $i++;
        }
        return $value;
    }
        
    function viewByNipDosen($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM Dosen WHERE nip='".$nip."'";
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
        
        
    function viewByNipKaryawan($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM Karyawan WHERE nip='".$nip."'";
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
    
    function addRole($username,$role){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "INSERT into USERROLE VALUES ('".$username."','".$role."')";
        return mysqli_query($link,$sql);
    }
    
?>
