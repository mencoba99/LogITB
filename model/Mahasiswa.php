<!--Mahasiswa Model-->
<?php
    
    function insert ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "INSERT INTO mahasiswa VALUES ('".$nim."','".$nama."','".$email."','".$alamat."','".$telp."')";
        $stmt = mysqli_prepare($link, "INSERT INTO mahasiswa VALUES (?,?,?,?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'sssss' , $nim, $nama, $email, $alamat, $telp);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
//        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM mahasiswa";
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
        mysqli_stmt_close($stmt);
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
        mysqli_stmt_close($stmt);
    }
    
    function viewSKByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM skbimbinganta WHERE peserta='".$nim."' AND status='Aktif'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM mahasiswa WHERE skbimbinganta WHERE peserta=? AND status='Aktif'");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nim);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nosk']=$r['nosk'];
            $value['nim']=$r['peserta'];
            $value['p1']=getNamaDosenByNip($r['pembimbing1']);
            $value['p2']=getNamaDosenByNip($r['pembimbing2']);
            $value['judul']=$r['judulta'];
            $value['status']=$r['status'];
            $value['file']=$r['file'];
            $i++;
        }
        return $value;
        mysqli_stmt_close($stmt);
    }
    
    function viewBimbinganDB($sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM bimbinganta where nosk='".$sk."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM bimbinganta WHERE nosk=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $sk);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $approve="";
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nourut'][$i]=$r['nourut'];
            $value['tgl'][$i]=$r['tanggal'];
            $value['lapor'][$i]=$r['catatanbimbingan'];
            $value['tglnext'][$i]=$r['tglbimbinganyad'];
            $value['lapornext'][$i]=$r['rencanabimbinganyad'];
            if($r['tspersetujuanpembimbing1']==NULL){
                $value['p1'][$i]="Belum Setuju";
            }else{
                $value['p1'][$i]="Setuju";
            }
            if($r['tspersetujuanpembimbing2']==NULL){
                $value['p2'][$i]="Belum Setuju";
            }else{
                $value['p2'][$i]="Setuju";
            }
            $i++;
            
            
        }
        $value['count']=$i;
        return $value;
        mysqli_stmt_close($stmt);
    }
    
    function update ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $stmt = mysqli_prepare($link, "UPDATE mahasiswa SET nama=?,email=?,alamat=?,noTelp=? WHERE nim=?");
        $bind = mysqli_stmt_bind_param($stmt, 'sssss', $nama, $email, $alamat, $telp, $nim);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
//        $sql = "UPDATE mahasiswa SET nama='".$nama."',email='".$email."',alamat='".$alamat."',noTelp='".$telp."' WHERE nim='".$nim."'";
//        return mysqli_query($link,$sql);
    }
    function delete ($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $stmt = mysqli_prepare($link, "DELETE FROM mahasiswa WHERE nim=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nim);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
//        $sql = "DELETE FROM mahasiswa WHERE nim='".$nim."'";
//        return mysqli_query($link,$sql);
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
        mysqli_stmt_close($stmt);
    }
?>
