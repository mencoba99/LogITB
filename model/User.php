<!--User Model-->
<?php
    
    function insert ($username,$password){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "INSERT INTO user VALUES ('".$username."','".$password."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO user VALUES (?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
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
//        $sql = "SELECT * FROM user WHERE username='".$username."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM user WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $username);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
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
        $deskripsi = sha1($password);
//        $sql = "UPDATE user SET password='".$deskripsi."' WHERE username='".$username."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "UPDATE user SET password=? WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $password, $username);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
    }
    function delete ($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "DELETE FROM user WHERE username='".$username."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "DELETE FROM user WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $username);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
    }
    
    function viewByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM mahasiswa WHERE nim='".$nim."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM mahasiswa WHERE nim=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nim);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
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
//        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM dosen WHERE nip=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nip);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
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
//        $sql = "SELECT * FROM karyawan WHERE nip='".$nip."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM karyawan WHERE nip=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nip);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
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
//        $sql = "INSERT into userrole VALUES ('".$username."','".$role."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO userrole VALUES (?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $username, $role);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
    }
    
    function clearRole($username){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "DELETE FROM userrole WHERE username='".$username."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "DELETE FROM userrole WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $username);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
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
    
    function checkPassword($username,$password){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM user WHERE username='".$username."'";
//        $row = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM user WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $username);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if($r = mysqli_fetch_assoc($row)){
            $pass = $r['password'];
        }else{
            return false;
        }
        if(isset($pass)){
            if($pass==sha1($password)){
                return true;
            }else{
                return false;
            }
        }
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
//        $sql = "SELECT * FROM userrole WHERE username='".$username."'";
//        $row = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM userrole WHERE username=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $username);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        while($r = mysqli_fetch_assoc($row)){
            $value[$i]=$r['idrole'];
            $i++;
        }
        return $value;
    }
    function viewPengumuman(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        
        $sql = "SELECT * FROM pengumuman";
        $res = mysqli_query($link, $sql);
        date_default_timezone_set("Asia/Jakarta");
        $skrg = strtotime(date('Y-m-d'));
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            if(strtotime($r['tanggalawal'])<=$skrg && $skrg<=strtotime($r['tanggalakhir'])){
                $value['id'][$i]=$r['id'];
                $value['author'][$i]=getNamaDosenByNip($r['author']);
                $value['judul'][$i]=$r['judul'];
                $value['isi'][$i]=$r['isi'];
                $value['tgl1'][$i]=$r['tanggalawal'];
                $value['tgl2'][$i]=$r['tanggalakhir'];
                $i++;
            }
            
        }
        return $value;
    }
    function getNamaDosenByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM dosen WHERE nip=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nip);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value=$r['nip']."-".$r['nama'];
            $i++;
        }else{
            $value="";
        }
        return $value;
    }
?>
