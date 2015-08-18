<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
    $nip="197308092006041001";
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
        echo $value['nama'][0];
?>

