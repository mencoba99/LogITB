<!--SeminarTA1 Model-->
<?php
    
    function insert ($nim,$tgl,$jam,$tempat,$penguji,$judul,$catatan,$ket){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $nosk="";
        $sql = "SELECT nosk FROM skbimbinganta WHERE peserta='".$nim."' AND status='Aktif'";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            $nosk=$r['nosk'];
        }
        $kodeperiode=  getPeriode(1)['kode'];
        $sql = "INSERT INTO seminarta1 VALUES ("
                .$kodeperiode.",'".$nim."','".$nosk."','".$tgl."','".$jam."','".$tempat."','".$penguji."','".$judul."','".$catatan."','".$ket."')";
        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM skbimbinganta";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nosk'][$i]=$r['nosk'];
            $value['peserta'][$i]=$r['peserta'];
            $value['p1'][$i]=getNamaDosenByNip($r['pembimbing1']);
            $value['p2'][$i]=getNamaDosenByNip($r['pembimbing2']);
            $value['judulta'][$i]=$r['judulta'];
            $value['status'][$i]=$r['status'];
            $value['file'][$i]=$r['file'];
            $i++;
        }
        return $value;
    }
    function viewByID($id){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM tugasakhir WHERE id='".$id."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['id']=$r['id'];
            $value['nim']=$r['nim'];
            $value['judul']=$r['judul'];
            $value['topik']=$r['topik'];
            $value['p1']=getNamaDosenByNip($r['pembimbing1']);
            $value['p2']=getNamaDosenByNip($r['pembimbing2']);
            $i++;
        }
        return $value;
    }
    function update ($sk,$status){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $stat="";
        
        if($status=="Activate"){
            $stat = "Aktif";
        }else{
            $stat = "Tidak Aktif";
        }
        $sql = "UPDATE skbimbinganta SET status='".$stat."' WHERE nosk='".$sk."'";
        return mysqli_query($link,$sql);
    }
    function delete ($sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        unlink("../SK/".$sk.".pdf");
        $sql = "DELETE FROM skbimbinganta WHERE nosk='".$sk."'";
        return mysqli_query($link,$sql);
    }
    
    function viewDosen(){
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
    
    function viewMhs(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $value="";
        $sql = "SELECT peserta FROM syaratseminarta1 where tspersetujuanpembimbing1 IS NOT NULL OR tspersetujuanpembimbing2 IS NOT NULL";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nim'][$i]=$r['peserta'];
//            $value['nama'][$i]=$r['nama'];
//            $value['email'][$i]=$r['email'];
//            $value['alamat'][$i]=$r['alamat'];
//            $value['telp'][$i]=$r['noTelp'];
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
            $value=$r['nip']."-".$r['nama'];
            $i++;
        }else{
            $value="";
        }
        return $value;
    }
    
    function getPeriode($jenis){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $result="";
        $sql = "SELECT kodeperiode,tglmulai,tglselesai FROM periodeta WHERE jenis=".$jenis." ORDER BY kodeperiode DESC";
        $res = mysqli_query($link, $sql);
        if($r = mysqli_fetch_assoc($res)){
            $result['kode']=$r['kodeperiode'];
            $result['min']=$r['tglmulai'];
            $result['max']=$r['tglselesai'];
        }
        return $result;
    }
?>
