<!--Mahasiswa Model-->
<?php
    
    function insert ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/log-itb/db.php';
        $sql = "INSERT INTO Mahasiswa VALUES ('".$nim."','".$nama."','".$email."','".$alamat."','".$telp."')";
        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/log-itb/db.php';
        $sql = "SELECT * FROM Mahasiswa";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nim'][$i]=$r['nim'];
            $value['nama'][$i]=$r['nama'];
            $value['email'][$i]=$r['email'];
            $value['alamat'][$i]=$r['alamat'];
            $value['telp'][$i]=$r['noTelp'];
            $i++;
        }
        return $value;
    }
    function viewByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/log-itb/db.php';
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
    function update ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/log-itb/db.php';
        $sql = "UPDATE Mahasiswa SET nama='".$nama."',email='".$email."',alamat='".$alamat."',noTelp='".$telp."' WHERE nim='".$nim."'";
        return mysqli_query($link,$sql);
    }
    function delete ($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/log-itb/db.php';
        $sql = "DELETE FROM Mahasiswa WHERE nim='".$nim."'";
        return mysqli_query($link,$sql);
    }
?>
