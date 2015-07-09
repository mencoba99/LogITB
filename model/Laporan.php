<!--Laporan Model-->
<?php
    
    function insert ($nim,$p1,$lapor,$tanggal){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        list($inisial1,$nama1)=  explode("-", $p1);
        
        $sql = "SELECT nip FROM dosen where inisial='".$inisial1."'";
        $row = mysqli_query($link, $sql);
        $r = mysqli_fetch_assoc($row);
        $nip1 = $r['nip'];
        date_default_timezone_set("Asia/Jakarta");
        $ts = date("Y-m-d H:i:s");
        $sql = "INSERT INTO bimbingan(nim,pembimbing,laporan,tanggal,timestamp) VALUES ('".$nim."','".$nip1."','".$lapor."','".$tanggal."','".$ts."')";
        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbingan";
        $res = mysqli_query($link, $sql);
        $approve="";
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['id'][$i]=$r['id'];
            $value['nim'][$i]=$r['nim'];
            $value['p'][$i]=getNamaDosenByNip($r['pembimbing']);
            $value['laporan'][$i]=$r['laporan'];
            $value['tanggal'][$i]=$r['tanggal'];
            $value['timestamp'][$i]=$r['timestamp'];
            if($r['approved']==0){
                $approve="No";
            }else{
                $approve="Yes";
            }
            $value['approved'][$i]=$approve;
            $i++;
        }
        return $value;
    }
    function viewByID($id){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbingan WHERE id='".$id."'";
        $res = mysqli_query($link, $sql);
        $approve="";
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['id']=$r['id'];
            $value['nim']=$r['nim'];
            $value['p']=getNamaDosenByNip($r['pembimbing']);
            $value['laporan']=$r['laporan'];
            $value['tanggal']=$r['tanggal'];
            $value['timestamp']=$r['timestamp'];
           if($r['approved']==0){
                $approve="No";
            }else{
                $approve="Yes";
            }
            $value['approved']=$approve;
            $i++;
        }
        return $value;
    }
        
    function viewDosen($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT dosen.nip,dosen.nama,dosen.inisial,tugasakhir.nim,tugasakhir.pembimbing1,tugasakhir.pembimbing2 FROM dosen,tugasakhir WHERE dosen.nip=tugasakhir.pembimbing1 OR dosen.nip=tugasakhir.pembimbing2";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nip'][$i]=$r['nip'];
            $value['nama'][$i]=$r['nama'];
            $value['inisial'][$i]=$r['inisial'];
            $i++;
        }
        return $value;
    }
    
    function viewMhs(){
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
    
    function getNamaDosenByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value=$r['inisial']."-".$r['nama'];
            $i++;
        }else{
            $value="";
        }
        return $value;
    }
?>
