<!--Approve Model-->
<?php
    function update ($id,$status){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE bimbingan SET approved=".$status." WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
    
    function view($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM bimbingan where pembimbing='".$nip."'";
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