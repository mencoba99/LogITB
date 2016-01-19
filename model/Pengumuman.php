<!--Pengumuman Model-->
<?php
    
    function insert ($dosen,$judul,$isi,$tgl1,$tgl2){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        list($nip1,$nama1)=  explode("-", $dosen);
        $sql = "INSERT INTO pengumuman (author,judul,isi,tanggalawal,tanggalakhir) VALUES ('"
                .$nip1."','".$judul."','".$isi."','".$tgl1."','".$tgl2."')";
        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        
        $sql = "SELECT * FROM pengumuman";
        $res = mysqli_query($link, $sql);
        date_default_timezone_set("Asia/Jakarta");
        $skrg = strtotime(date('Y-m-d'));
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            if(strtotime($r['tanggalawal'])<=$skrg && $skrg<=strtotime($r['tanggalakhir'])){
                $value['id'][$i]=$r['id'];
                $value['author'][$i]=getNamaDosenByNip($r['author']);
                $value['judul'][$i]=$r['judul'];
                $value['isi'][$i]=$r['isi'];
                $value['tgl1'][$i]=$r['tanggalawal'];
                $value['tgl2'][$i]=$r['tanggalakhir'];
                $i++;
            }
            
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
        $sql = "SELECT peserta FROM skbimbinganta where status='Aktif'";
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
?>
