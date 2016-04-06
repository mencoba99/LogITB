<!--Laporan Model-->
<?php
    
    function insert ($nim,$sk,$tgl,$lapor,$tgl2,$lapor2){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT count(peserta) as jml FROM bimbinganta WHERE nosk='".$sk."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT count(peserta) as jml FROM bimbinganta WHERE nosk=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $sk);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if($r = mysqli_fetch_assoc($res)){
            $jml=$r['jml']+1;
        }else{
            $jml=1;
        }
        mysqli_stmt_close($stmt);
//        $sql = "INSERT INTO bimbinganta(nourut,nosk,kodeta,peserta,tanggal,catatanbimbingan,tglbimbinganyad,rencanabimbinganyad) VALUES "
//                . "(".$jml.",'".$sk."',1,'".$nim."','".$tgl."','".$lapor."','".$tgl2."','".$lapor2."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO bimbinganta(nourut,nosk,kodeta,peserta,tanggal,catatanbimbingan,tglbimbinganyad,rencanabimbinganyad) VALUES "
                . "(?,?,1,?,?,?,?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'issssss', $jml, $sk, $nim, $tgl, $lapor, $tgl2, $lapor2);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
    }
    function view($sk){
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
        return $value;
        mysqli_stmt_close($stmt);
    }
    function viewByID($id){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM bimbingan WHERE id='".$id."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM bimbingan WHERE id=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $id);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
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
        mysqli_stmt_close($stmt);
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
        mysqli_stmt_close($stmt);
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
        mysqli_stmt_close($stmt);
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
            $value=$r['inisial']."-".$r['nama'];
            $i++;
        }else{
            $value="";
        }
        return $value;
        mysqli_stmt_close($stmt);
    }
    
    function sk($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT nosk FROM skbimbinganta WHERE peserta='".$nim."' AND status='Aktif'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT nosk FROM skbimbinganta WHERE peserta=? AND status='Aktif'");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nim);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if($r = mysqli_fetch_assoc($res)){
            $nosk=$r['nosk'];
        }
        return $nosk;
        mysqli_stmt_close($stmt);
    }
?>
