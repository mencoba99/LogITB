<!--User Model-->
<?php
    
    function insert ($username,$password){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "INSERT INTO user VALUES ('".$username."','".$password."')";
        return mysqli_query($link,$sql);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM user";
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
        $sql = "SELECT * FROM user WHERE username='".$username."'";
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
        $sql = "UPDATE user SET password='".$deskripsi."' WHERE username='".$username."'";
        return mysqli_query($link,$sql);
    }
    function delete ($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM user WHERE username='".$username."'";
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
        $sql = "INSERT into userrole VALUES ('".$username."','".$role."')";
        return mysqli_query($link,$sql);
    }
    
    function clearRole($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM userrole WHERE username='".$username."'";
        return mysqli_query($link,$sql);
    }
    
    function checkUser ($username){
    $valid = false;
    if(is_null(viewByNim($username))){
            if(is_null(viewByNipDosen($username))){
                if(is_null(viewByNipKaryawan($username))){
                }
                else{
                    $valid=true;} 
            }else{
               $valid=true;}           
        }else{
           $valid=true;}
    return $valid;
    }
    
    function checkUserValue ($username){
    $value = "";
    if(is_null(viewByNim($username))){
            if(is_null(viewByNipDosen($username))){
                if(is_null(viewByNipKaryawan($username))){
                }
                else{
                    $value="Karyawan";} 
            }else{
               $value="Dosen";}           
        }else{
           $value="Mahasiswa";}
    return $value;
    }
    
    function matchPassword($password,$ulangpassword){
        $match = false;
        if(strcmp($password, $ulangpassword)== 0){
            $match = true;
        }
        return $match;
    }
    
    function viewRole($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM userrole WHERE username='".$username."'";
        $row = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($row)){
            $value[$i]=$r['idrole'];
            $i++;
        }
        return $value;
    }
    
?>
