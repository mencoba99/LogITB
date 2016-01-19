<!--Periode Model-->
<?php
    
    function insert ($jenis,$tgl,$tgl2,$smt,$tahun){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "INSERT INTO periodeta(jenis,tglmulai,tglselesai,semester,tahun) VALUES ('".$jenis."','".$tgl."','".$tgl2."','".$smt."','".$tahun."')";
        return mysqli_query($link,$sql);
    }
    
?>
