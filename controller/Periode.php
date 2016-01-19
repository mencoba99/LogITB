<!--Periode Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/Periode.php';

    if(isset($_POST['add'])){
        $r = insert($_POST['jenis'], $_POST['tgl'], $_POST['tgl2'], $_POST['smt'], $_POST['tahun']);
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah periode.. :)";
            header('Location: ../AddPeriodeTA.php');
        }
    }else{
        echo "gagal insert";
    }

?>

