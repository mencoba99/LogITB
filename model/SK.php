<!--SK Model-->
<?php
    
    function insert ($sk,$nim,$p1,$p2,$judul,$status,$file){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        list($nip1,$nama1)=  explode("-", $p1);
        if($p2!=""){
            list($nip2,$nama2)=  explode("-", $p2);
        }
//        $sql = "SELECT nip FROM dosen where inisial='".$inisial1."'";
//        $row = mysqli_query($link, $sql);
//        $r = mysqli_fetch_assoc($row);
//        $nip1 = $r['nip'];
//        if($p2!=""){
//            $sql = "SELECT nip FROM dosen where inisial='".$inisial2."'";
//            $row = mysqli_query($link, $sql);
//            $r = mysqli_fetch_assoc($row);
//            $nip2 = $r['nip'];
//        }else{
//            $nip2="";
//        }
//        $sql = "INSERT INTO skbimbinganta (nosk,peserta,pembimbing1,pembimbing2,judulta,status,file) VALUES ('".$sk."','".$nim."','".$nip1."','".$nip2."','".$judul."','".$status."','".$file."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO skbimbinganta (nosk,peserta,pembimbing1,pembimbing2,judulta,status,file) VALUES (?,?,?,?,?,?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'sssssss', $sk, $nim, $nip1, $nip2, $judul, $status, $file);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
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
//        $sql = "SELECT * FROM tugasakhir WHERE id='".$id."'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM tugasakhir WHERE id=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $id);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['id']=$r['id'];
            $value['nim']=$r['nim'];
            $value['judul']=$r['judul'];
            $value['topik']=$r['topik'];
            $value['p1']=getNamaDosenByNip($r['pembimbing1']);
            $value['p2']=getNamaDosenByNip($r['pembimbing2']);
            $value['file']=$r['file'];
            $i++;
        }
        return $value;
    }
    
    function viewByNim($nim){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
//        $sql = "SELECT * FROM tugasakhir WHERE peserta='".$nim."' AND status='Aktif'";
//        $res = mysqli_query($link, $sql);
        $stmt = mysqli_prepare($link, "SELECT * FROM tugasakhir WHERE peserta=? AND status='Aktif'");
        $bind = mysqli_stmt_bind_param($stmt, 's', $nim);
        $exec = mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['id']=$r['id'];
            $value['nim']=$r['nim'];
            $value['judul']=$r['judul'];
            $value['topik']=$r['topik'];
            $value['p1']=getNamaDosenByNip($r['pembimbing1']);
            $value['p2']=getNamaDosenByNip($r['pembimbing2']);
            $value['file']=$r['file'];
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
//        $sql = "UPDATE skbimbinganta SET status='".$stat."' WHERE nosk='".$sk."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "UPDATE skbimbinganta SET status=? WHERE nosk=?");
        $bind = mysqli_stmt_bind_param($stmt, 'ss', $stat, $sk);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
    }
    function delete ($sk){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        unlink("../SK/".$sk.".pdf");
//        $sql = "DELETE FROM skbimbinganta WHERE nosk='".$sk."'";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "DELETE FROM skbimbinganta WHERE nosk=?");
        $bind = mysqli_stmt_bind_param($stmt, 's', $sk);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
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
    }
?>
