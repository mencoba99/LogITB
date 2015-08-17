<!--Mahasiswa Model-->
<?php
    
    function insert ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "INSERT INTO mahasiswa VALUES ('".$nim."','".$nama."','".$email."','".$alamat."','".$telp."')";
        return mysqli_query($link,$sql);
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
    }
    function viewByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM mahasiswa WHERE nim='".$nim."'";
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
    
    function viewSKByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM skbimbinganta WHERE peserta='".$nim."' AND status='Aktif'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nosk']=$r['nosk'];
            $value['nim']=$r['peserta'];
            $value['p1']=getNamaDosenByNip($r['pembimbing1']);
            $value['p2']=getNamaDosenByNip($r['pembimbing2']);
            $value['judul']=$r['judulta'];
            $value['status']=$r['status'];
            $i++;
        }
        return $value;
    }
    
    function viewBimbinganDB($sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbinganta where nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $approve="";
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nourut'][$i]=$r['nourut'];
            $value['tgl'][$i]=$r['tanggal'];
            $value['lapor'][$i]=$r['catatanbimbingan'];
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
            if($i==3){
                break;
            }
            
        }
        $value['count']=$i;
        return $value;
    }
    
    function update ($nim,$nama,$email,$alamat,$telp){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE mahasiswa SET nama='".$nama."',email='".$email."',alamat='".$alamat."',noTelp='".$telp."' WHERE nim='".$nim."'";
        return mysqli_query($link,$sql);
    }
    function delete ($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM mahasiswa WHERE nim='".$nim."'";
        return mysqli_query($link,$sql);
    }
    function getNamaDosenByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
        $res = mysqli_query($link, $sql);
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
