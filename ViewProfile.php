<?php
session_start();
//    if(!isset($_SESSION['usedrole'])){
//        header("Location: index.php");
//    }
$_SESSION['status']="viewUser";
include 'controller/User.php';
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
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/font-awesome.min.css" rel="stylesheet" />

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
                            <li><a href="ViewProfile.php">Admin</a></li>
                            <li class="active">Lihat Profil Pengguna</li>
                        </ul>
                    </div>
                </div>
            </div>
	</section>
	<section id="content">
            <div class="container">
                <div class="row whitebgc">
                    <div class="col-lg-2"><?php include './SideMenu.php';?></div>
                    <div class="col-lg-10">
                        <div class="col-lg-12">
                        <h3>Profil Pengguna</h3>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#profilEditModal"><i class='fa fa-pencil-square-o'></i> Ubah Profil Pribadi</button>
                        <button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#passwordEditModal"><i class='fa fa-pencil-square-o'></i> Ubah Password</button>
                        </div>
                        <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Akun Pengguna</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="vth">Username</th>
                                            <td><?php echo $_SESSION['data']['username'];?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Kelompok</th>
                                            <td><?php if($_SESSION['data']['kelompok']== 1){echo 'Dosen';}else if ($_SESSION['data']['kelompok']== 2){echo 'Mahasiswa';}else if ($_SESSION['data']['kelompok']== 3){echo 'Tendik';}else{echo 'Lain-lain';}?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Profil Pribadi Pengguna</h3>
                            </div>
                            <div class="panel-body">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="vth"><?php if($_SESSION['data']['kelompok']== 1|| $_SESSION['data']['kelompok']== 3){echo 'NIP';}else if ($_SESSION['data']['kelompok']== 2){echo 'NIM';}else{echo 'ID Lain';}?></th>
                                            <td><?php echo $_SESSION['data']['username'];?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>xxxxxxxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>Xxxxxxxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <th>Notelp</th>
                                            <td>Xxxxxxxxxx</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>Xxxxxxxxxx</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-2"></div>-->
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

<div id="passwordEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah Password</h4>
            </div>
            <div class="modal-body">
                <form action="./controller/User.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="idrole"  class="form-control" placeholder="Username" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password Sebelumnya</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                            </div>
                            <div class="form-group">
                                <label for="passwordbaru">Password Baru</label>
                                <input type="password" name="passwordbaru" id="passwordbaru" class="form-control" placeholder="Password Baru" value="">
                            </div>
                            <div class="form-group">
                                <label for="passwordbaru2">Ulangi Password Baru</label>
                                <input type="password" name="passwordbaru2" id="passwordbaru2" class="form-control" placeholder="Ulangi Password Baru" value="">
                            </div>
                            <div class="form-group" style="text-align: right">
                                <button type="submit" name="update" value="Update" class="btn btn-primary" style="width: 120px;"><i class="fa fa-pencil-square-o"></i> Ubah</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 120px;"><i class="fa fa-times"></i> Tutup</button>
                            </div>
                        </form>
            </div>
          </div>
    </div>
</div>
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
</body>
</html>