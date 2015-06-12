<!--Dosen Model-->
<?php
    
    function insert ($nip,$nama,$email,$alamat,$telp){
        include '../db.php';
        $sql = "INSERT INTO Dosen VALUES ('".$nip."','".$nama."','".$email."','".$alamat."','".$telp."')";
        return mysqli_query($link,$sql);
    }
?>
