<!--Approve Model-->
<?php
    function update ($id,$status){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE bimbingan SET approved=".$status." WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
    
    function view($sk,$pb){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbinganta WHERE nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['no'][$i]=$r['nourut'];
            $value['sk'][$i]=$r['nosk'];
            $value['kode'][$i]=$r['kodeta'];
            $value['nim'][$i]=$r['peserta'];
            $value['tgl'][$i]=$r['tanggal'];
            if($pb=="Pembimbing 1"){
                if($r['tspersetujuanpembimbing1']!=NULL){
                    $value['approve'][$i]=1;
                }else{
                    $value['approve'][$i]=0;
                }
            }
            if($pb=="Pembimbing 2"){
                if($r['tspersetujuanpembimbing2']!=NULL){
                    $value['approve'][$i]=1;
                }else{
                    $value['approve'][$i]=0;
                }
            }
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
    
    function viewMhs($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT skbimbinganta.nosk as nosk,skbimbinganta.status as stts,skbimbinganta.peserta as nim,syaratseminarta1.nosk as noskt, "
                . "mahasiswa.nim as anim, mahasiswa.nama as nama from skbimbinganta,syaratseminarta1,mahasiswa "
                . "WHERE skbimbinganta.nosk=syaratseminarta1.nosk AND skbimbinganta.peserta=mahasiswa.nim AND skbimbinganta.status='Aktif'";
        $res = mysqli_query($link, $sql);
        $s=0;
        while($r = mysqli_fetch_assoc($res)){
            $syarat['sk'][$s]=$r['nosk'];
            $syarat['nim'][$s]=$r['nim'];
            $syarat['nama'][$s]=$r['nama'];
            $s++;
        }
        $sql = "SELECT * FROM skbimbinganta WHERE (pembimbing1='".$nip."' OR pembimbing2='".$nip."') AND status='Aktif'";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['sk'][$i]=$r['nosk'];
            if($s>0){
                if(in_array($r['nosk'], $syarat['sk'])){
                    $value['seminar'][$i]=1;
                }else{
                    $value['seminar'][$i]=0;
                }
            }else{
                $value['seminar'][$i]=0;
            }
            $value['nim'][$i]=$r['peserta'];
            $n = array_search($r['peserta'], $syarat['nim']);
            $value['nama'][$i]=$syarat['nama'][$n];
            $value['judul'][$i]=$r['judulta'];
            if($nip==$r['pembimbing1']){
                $p="Pembimbing 1";
            }
            if($nip==$r['pembimbing2']){
                $p="Pembimbing 2";
            }
            $value['status'][$i]=$p;
            $value['file'][$i]=$r['file'];
            $i++;
        }
        return $value;
    }
    
    function getDetail($no,$sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbinganta WHERE nourut=".$no." AND nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['no']=$r['nourut'];
            $value['sk']=$r['nosk'];
            $value['kode']=$r['kodeta'];
            $value['nim']=$r['peserta'];
            $value['tgl']=$r['tanggal'];
            $value['lapor']=$r['catatanbimbingan'];
            $value['tgl2']=$r['tglbimbinganyad'];
            $value['lapor2']=$r['rencanabimbinganyad'];
            if($r['tspersetujuanpembimbing1']==NULL){
                $value['p'][1]=0;
            }else{
                $value['p'][1]=1;
            }
            if($r['tspersetujuanpembimbing2']==NULL){
                $value['p'][2]=0;
            }else{
                $value['p'][2]=1;
            }
            $i++;
        }
        return $value;
    }
    
    function getDetailSS($sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM syaratseminarta1 WHERE nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['nim']=$r['peserta'];
            $value['sk']=$r['nosk'];
            $value['hadir']=$r['jmlhadirkuliah'];
            $value['bimbi']=$r['jmlbimbingan'];
            $value['tugas']=$r['jmltugastambahan'];
            $value['tgl']=$r['tgllaporanmasuk'];
            $value['p1']=$r['tspersetujuanpembimbing1'];
            $value['p2']=$r['tspersetujuanpembimbing2'];
            $value['d1']=$r['tspersetujuandosenta1'];
            $value['ket']=$r['keterangan'];
            $i++;
        }
        return $value;
    }
    
    function approve($nip,$no,$sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT pembimbing1,pembimbing2 FROM skbimbinganta WHERE (pembimbing1='".$nip."' OR pembimbing2='".$nip."') AND nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $x=0;
        if($r = mysqli_fetch_assoc($res)){
            if($nip==$r['pembimbing1']){
                $x=1;
            }
            if($nip==$r['pembimbing2']){
                $x=2;
            }
        }
        $sql = "UPDATE bimbinganta SET tspersetujuanpembimbing".$x."=now() WHERE nourut=".$no." AND nosk='".$sk."'";
        mysqli_query($link, $sql);
        
    }
    
    function approvess($nip,$sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT pembimbing1,pembimbing2,nosk FROM skbimbinganta WHERE (pembimbing1='".$nip."' OR pembimbing2='".$nip."') AND nosk='".$sk."'";
        $res = mysqli_query($link, $sql);
        $x=0;
        if($r = mysqli_fetch_assoc($res)){
            if($nip==$r['pembimbing1']){
                $x=1;
            }
            if($nip==$r['pembimbing2']){
                $x=2;
            }
        }
        $sql = "UPDATE syaratseminarta1 SET tspersetujuanpembimbing".$x."=now() WHERE nosk='".$sk."'";
        mysqli_query($link, $sql);
        
    }
    
    function getDataDosen($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM dosen WHERE nip='".$nip."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['nip']=$r['nip'];
            $value['nama']=$r['nama'];
            $value['inisial']=$r['inisial'];
            $value['email']=$r['email'];
            $value['alamat']=$r['alamat'];
            $value['telp']=$r['noTelp'];
            $i++;
        }
        return $value;
    }
?>