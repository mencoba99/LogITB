<?php
session_start();
if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="TU_Akademik")){
    if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Tim_TA")){
        header("Location: index.php");
    }
}
$_SESSION['status']="collect";
include 'controller/SyaratSeminarTA1.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Log ITB</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
         <?php
            include($_SERVER['DOCUMENT_ROOT'] . "/LogITB/Menu.php");
        ?>
	</header>
	<!-- end header -->
	<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                            <li><a href="DBTU.php">Tata Usaha Akademik</a></li>
                            <li class="active">Tambah SK Bimbingan</li>
                        </ul>
                    </div>
                </div>
            </div>
	</section>
	<section id="content">
            <div class="container">
		<div class="row">
                    <div class="col-lg-2">
                        <?php include './SideMenuManager.php';?></div>
                    <div class="col-lg-10">
                        <h3>Tambah Data Syarat Seminar Tugas Akhir 1</h3>
                        <div class="alert-success"><?php if(isset($_SESSION['success'])){echo $_SESSION['success'];unset($_SESSION['success']);}?></div>
                        <div class="alert-danger"><?php if(isset($_SESSION['fail'])){echo $_SESSION['fail'];unset($_SESSION['fail']);}?></div>
                        <form action="./controller/SyaratSeminarTA1.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" list="dataNIM" name="nim" id="nim" class="form-control" placeholder="NIM" value="" autocomplete="off">
                                <datalist id="dataNIM">
                                    <?php
                                        $nim = $_SESSION['mhs']['nim'];
                                        $x=  count($nim);
                                        for($i=0;$i<$x;$i++){
                                            echo "<option value=".$nim[$i].">";
                                        }
                                    ?>
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="hadir">Jumlah Hadir Kuliah</label>
                                <input type="text" name="hadir" id="hadir" class="form-control" placeholder="Jumlah Kehadiran Perkuliahan" value="">
                            </div>
                            <div class="form-group">
                                <label for="bimbi">Jumlah Bimbingan</label>
                                <input type="text" name="bimbi" id="bimbi" class="form-control" placeholder="Jumlah Bimbingan Tugas Akhir" value="">
                            </div>
                            <div class="form-group">
                                <label for="tugas">Jumlah Tugas Tambahan</label>
                                <input type="text" name="tugas" id="tugas" class="form-control" placeholder="Jumlah Tugas Tambahan" value="">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Laporan Masuk</label>
                                <input type="text" name="tgl" id="datetimepicker2" class="form-control" placeholder="Tanggal Laporan Masuk" value="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea name="ket" id="ket" class="form-control" rows="6"></textarea>
                            </div>
                            <input type="submit" name="add" value="Add" class="btn btn-blue" />
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
		</div>
            </div>
	</section>
	<footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
<!--                        <div class="widget">
                            <h5 class="widgetheading">Info Lebih Lanjut</h5>
                            <address>
                                <strong>Contact Person: Dian Ramadhani</strong><br>
                                Institut Teknologi Bandung<br>
                                Labtek V Jl. Ganesha 10 Bandung
                            </address>
                            <p>
                                <i class="icon-phone"></i> +62-85265863357 (a.n. Dian Ramadhani) <br/>
                                <i class="icon-phone"></i> +62-22-2508135 (a.n. Fazat Nur Azizah)<br/>
                                Fax: +62-22-2500940 <br/>
                                <i class="icon-envelope-alt"></i> dse@informatika.org <br/>
                                Facebook fan page	: DSE Days
                            </p>
                        </div>-->
                    </div>
                    <div class="col-lg-3">
<!--                        <div class="widget">
                            <h5 class="widgetheading">Pages</h5>
                            <ul class="link-list">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="registrasi.html">Registrasi</a></li>
                                <li><a href="contact.html">Hubungi Kami</a></li>
                            </ul>
                        </div>-->
                    </div>
                    <div class="col-lg-3">
<!--                        <div class="widget">
                            <h5 class="widgetheading">Kegiatan DSE Days</h5>
                            <ul class="link-list">
                                <li>Tutorial on Software Engineering in DevOps Context</li>
                                <li>Konferensi Nasional Rekayasa Data</li>
                                <li>Seminar dan Workshop Pendidikan Rekayasa Perangkat Lunak</li>
                                <li>Tutorial on Data Analytics and Visualization</li>
                            </ul>
                        </div>-->
                    </div>
                    <div class="col-lg-3">
<!--                        <div class="widget">
                            <h5 class="widgetheading">Link</h5>
                            <div class="flickr_badge">
                                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
                            </div>
                            <div class="clear">
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>
$('#datetimepicker2').datetimepicker({
	lang:'id',
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d'
});
</script>
</body>
</html>