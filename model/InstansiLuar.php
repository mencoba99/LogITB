<!--Instansi Luar Model-->
<?php
    
    function insert ($kodeinstansi,$jenis,$namalengkap,$namasingkat,$alamat,$email,$notelp,$website,$namakontak,$keterangan){
        include '../db.php';
//        $sql = "INSERT INTO instansiluar VALUES ('".$kodeinstansi."','".$jenis."','".$namalengkap."','".$namasingkat."'"
//                . ",'".$alamat."','".$email."','".$notelp."','".$website."','".$namakontak."','".$keterangan."')";
//        return mysqli_query($link,$sql);
        $stmt = mysqli_prepare($link, "INSERT INTO instansiluar VALUES (?,?,?,?,?,?,?,?,?,?)");
        $bind = mysqli_stmt_bind_param($stmt, 'ssssssssss', $kodeinstansi, $jenis, $namalengkap, $namasingkat, $alamat, $email, $notelp, $website, $namakontak, $keterangan);
        $exec = mysqli_stmt_execute($stmt);
        return $exec;
        mysqli_stmt_close($stmt);
    }
    
    function view(){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM instansiluar";
        $res = mysqli_query($link, $sql);
        $i=0;
        while($r = mysqli_fetch_assoc($res)){
            $value['kodeinstansi'][$i]=$r['kodeinstansi'];
            $value['jenis'][$i]=$r['jenis'];
            $value['namalengkap'][$i]=$r['namalengkap'];
            $value['namasingkat'][$i]=$r['namasingkat'];
            $value['alamat'][$i]=$r['alamat'];
            $value['email'][$i]=$r['email'];
            $value['notelp'][$i]=$r['notelp'];
            $value['website'][$i]=$r['website'];
            $value['namakontak'][$i]=$r['namakontak'];
            $value['keterangan'][$i]=$r['keterangan'];
            $i++;
        }
        return $value;
    }
    function viewByNip($nip){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "SELECT * FROM instansiluar WHERE nip='".$kodeinstansi."'";
        $res = mysqli_query($link, $sql);
        $i=0;
        if($r = mysqli_fetch_assoc($res)){
            $value['kodeinstansi'][$i]=$r['kodeinstansi'];
            $value['jenis'][$i]=$r['jenis'];
            $value['namalengkap'][$i]=$r['namalengkap'];
            $value['namasingkat'][$i]=$r['namasingkat'];
            $value['alamat'][$i]=$r['alamat'];
            $value['email'][$i]=$r['email'];
            $value['notelp'][$i]=$r['notelp'];
            $value['website'][$i]=$r['website'];
            $value['namakontak'][$i]=$r['namakontak'];
            $value['keterangan'][$i]=$r['keterangan'];
            $i++;
        }
        return $value;
    }
    function update ($kodeinstansi,$jenis,$namalengkap,$namasingkat,$alamat,$notelp,$email,$website,$namakontak,$keterangan){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE insntasiluar SET jenis='".$jenis."',"
                . "namalengkap='".$namalengkap.","
                . "namasingkat='".$namasingkat."',"
                . "alamat='".$alamat."',"
                . "notelp='".$email."',"
                . "notelp='".$notelp."',"
                . "website='".$website."',"
                . "namakontak='".$namakontak."',"
                . "keterangan='".$keterangan."',"
                . "WHERE kodeinstansi='".$kodeinstansi."'";
        return mysqli_query($link,$sql);
    }
    function delete ($kodeinstansi){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM insntasiluar WHERE kodeinstansi='".$kodeinstansi."'";
        return mysqli_query($link,$sql);
    }
    
?>
