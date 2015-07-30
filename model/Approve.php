<!--Approve Model-->
<?php
    function update ($id,$status){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE bimbingan SET approved=".$status." WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
    
    function view($sk){
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
        $sql = "SELECT * FROM skbimbinganta WHERE pembimbing1='".$nip."' OR pembimbing2='".$nip."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['sk'][$i]=$r['nosk'];
            $value['nim'][$i]=$r['peserta'];
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
            $i++;
        }
        return $value;
    }
    
    function approve($nip,$no,$sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT pembimbing1,pembimbing2 FROM skbimbinganta WHERE pembimbing1='".$nip."' OR pembimbing2='".$nip."'";
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
?>