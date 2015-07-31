<!--TA Controller-->
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/LogITB/model/SK.php';
    if(isset($_POST['add'])){
        $r=false;
        $error="";
        $target_dir = "../SK/";
        $file = $_POST['sk'] .".pdf";
        $target_file = $target_dir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $error .= "Sorry, file already exists.<br />";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["upload"]["size"] > 10240000) {
            $error .= "Sorry, your file is too large > 10MB.<br />";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($fileType != "pdf") {
            $error .= "Sorry, only PDF files are allowed.<br />";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error .= "Sorry, your file was not uploaded.<br />";
        // if everything is ok, try to upload file
        } else {
            $target_file = $target_dir . $file;
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
                $r = insert($_POST['sk'],$_POST['nim'],$_POST['p1'],$_POST['p2'],$_POST['judul'],$_POST['status'],$file);
            } else {
                 $error .= "Sorry, there was an error uploading your file.";
            }
        }
        
        if($r){
            session_start();
            $_SESSION['success']="Berhasil tambah SK.. :)";
            header('Location: ../AddSKBimbingan.php');
        }else{
            session_start();
            $_SESSION['fail']=$error;
            header('Location: ../AddSKBimbingan.php');
        }
    }else{
        
    }
    if(isset($_SESSION['status'])){
        if($_SESSION['status']=="view"){
            $_SESSION['value'] = view();
        }
        if($_SESSION['status']=="collect"){
            $_SESSION['mhs']=viewMhs();
            $_SESSION['dosen']=viewDosen();
        }
    }
    
    if(isset($_POST['edit'])){
        $r = viewByID($_POST['id']);
      
        session_start();
        $_SESSION['data']=$r;
        header('Location: ../EditTA.php');
    }
    
    if(isset($_POST['aktif'])){
        $r = update($_POST['sk'], $_POST['aktif']);
        if($r){
            header('Location: ../ViewSKBimbingan.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $r = delete($_POST['sk']);
        if($r){
            header('Location: ../ViewSKBimbingan.php');
        }
    }
?>

