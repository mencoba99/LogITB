<!--TA Model-->
<?php
    
    function insert ($nim,$judul,$topik){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "INSERT INTO tugasakhir(nim,judul,topik) VALUES ('".$nim."','".$judul."','".$topik."')";
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
            $i++;
        }
        return $value;
    }
    function update ($id,$nim,$judul,$topik){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "UPDATE tugasakhir SET nim='".$nim."',judul='".$judul."',topik='".$topik."' WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
    function delete ($id){
        include $_SERVER['DOCUMENT_ROOT'].'/LogITB/db.php';
        $sql = "DELETE FROM tugasakhir WHERE id='".$id."'";
        return mysqli_query($link,$sql);
    }
?>
