<!--TA Model-->
<?php
    
    function insert ($nim,$judul,$topik,$p1,$p2){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        list($inisial1,$nama1)=  explode("-", $p1);
        if($p2!=""){
            list($inisial2,$nama2)=  explode("-", $p2);
        }
        $sql = "SELECT nip FROM dosen where inisial='".$inisial1."'";
        $row = mysqli_query($link, $sql);
        $r = mysqli_fetch_assoc($row);
        $nip1 = $r['nip'];
        if($p2!=""){
            $sql = "SELECT nip FROM dosen where inisial='".$inisial2."'";
            $row = mysqli_query($link, $sql);
            $r = mysqli_fetch_assoc($row);
            $nip2 = $r['nip'];
        }else{
            $nip2="";
        }
        $sql = "INSERT INTO tugasakhir(nim,judul,topik,pembimbing1,pembimbing2) VALUES ('".$nim."','".$judul."','".$topik."','".$nip1."','".$nip2."')";
        return mysqli_query($link,$sql);
    }
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM tugasakhir";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['id'][$i]=$r['id'];
            $value['nim'][$i]=$r['nim'];
            $value['judul'][$i]=$r['judul'];
            $value['topik'][$i]=$r['topik'];
            $value['p1'][$i]=getNamaDosenByNip($r['pembimbing1']);
            $value['p2'][$i]=getNamaDosenByNip($r['pembimbing2']);
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
    function update ($id,$nim,$judul,$topik,$p1,$p2){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        list($inisial1,$nama1)=  explode("-", $p1);
        if($p2!=""){
            list($inisial2,$nama2)=  explode("-", $p2);
        }
        $sql = "SELECT nip FROM dosen where inisial='".$inisial1."'";
        $row = mysqli_query($link, $sql);
        $r = mysqli_fetch_assoc($row);
        $nip1 = $r['nip'];
        if($p2!=""){
            $sql = "SELECT nip FROM dosen where inisial='".$inisial2."'";
            $row = mysqli_query($link, $sql);
            $r = mysqli_fetch_assoc($row);
            $nip2 = $r['nip'];
        }else{
            $nip2="";
        }
        $sql = "UPDATE tugasakhir SET nim='".$nim."',judul='".$judul."',topik='".$topik."',pembimbing1='".$nip1."',pembimbing2='".$nip2."' WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
    function delete ($id){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM tugasakhir WHERE id='".$id."'";
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
