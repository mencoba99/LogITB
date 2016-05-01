<?php
    session_start();
    if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Mahasiswa")){
        if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="TU_Akademik")){
            if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Tim_TA")){
                if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Penguji")){
                    if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Pembimbing")){
                        header("Location: index.php");    
                    }
                }
            }
        }
    }
//    $_SESSION['status']='viewMhs';
//    include 'controller/Mahasiswa.php';
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
                            <li><a href="DBMhs.php">Mahasiswa</a></li>
                            <li class="active">Dashboard Mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
	</section>
	<section id="content">
            <div class="container">
		<div class="row">
                    <div class="col-lg-2">
                        <?php 
                            include './SideMenu.php';
//                            $mhs = $_SESSION['mhs'];
//                            unset($_SESSION['mhs']);
//                            $sk = $_SESSION['sk'];
//                            unset($_SESSION['sk']);
                        ?>
                    </div>
                    <div class="col-lg-10">
                        <h3>Detail Seminar Tugas Akhir 1 </h3>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>Data Umum Seminar Tugas Akhir 1</strong></div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Periode</td>
                                        <td>(Periode)</td> 
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>(NIM Mahasiswa)</td> 
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>(Nama Mahasiswa)</td> 
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>(Tanggal Seminar)</td> 
                                    </tr>
                                    <tr>
                                        <td>Jam</td>
                                        <td>(Jam Seminar)</td> 
                                    </tr>
                                    <tr>
                                        <td>Penguji</td>
                                        <td>(Penguji)</td> 
                                    </tr>
                                    <tr>
                                        <td>Judul Tugas Akhir</td>
                                        <td>(Judul Tugas Akhir)</td> 
                                    </tr>
                                </table>
                                <div class="form-group">
                                <label for="ket">Catatan Seminar</label>
                                <textarea name="catatan" id="catatan" class="form-control" rows="6" readonly="readonly"></textarea>
                                </div>
<!--                                <button onclick="location.href = 'http://localhost/LogITB/EditSeminarTA1.php';" type="submit" class="btn btn-green">Ubah Data</button>-->
                                <!--Kalau Rolenya TU maka button diatas muncul, jika tidak tidak muncul-->
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>Data Nilai Seminar Tugas Akhir 1</strong></div>
                            <div class="panel-body">
                                <table class="table table-bordered">                 
                                    <tr>
                                        <th>Nilai Pembimbing 1</th>
                                        <th>Nilai Penguji</th> 
                                        <th>Nilai Dosen TA 1</th>
                                        <th>Nilai Akhir</th>
                                        <th>Status Lulus</th>
                                    </tr>
                                    <tr class="middle">
                                        <td>(Nilai Pembimbing 1)</td>
                                        <td>(Nilai Penguji)</td>
                                        <td>(Nilai Dosen TA 1)</td>
                                        <td>(Nilai Akhir)</td>
                                        <td>(Status Lulus)</td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea name="ket" id="ket" class="form-control" rows="6" readonly="readonly"></textarea>
                                </div>
<!--                                <button onclick="location.href = 'http://localhost/LogITB/AddNilaiTA1.php';" type="submit" class="btn btn-blue">Masukan Nilai</button>-->
                                    <button type="button" class="btn btn-blue " data-toggle="modal" data-target="#modalAddNilai">Masukan Nilai</button>
<!--                                <button onclick="location.href = 'http://localhost/LogITB/EditNilaiTA1.php';" type="submit" class="btn btn-green">Ubah Nilai</button>-->
                                    <button type="button" class="btn btn-green " data-toggle="modal" data-target="#modalEditNilai">Ubah Nilai</button>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>Data Daftar Hadir Seminar</strong></div>
                            <div class="panel-body">
<!--                            <button onclick="location.href = 'http://localhost/LogITB/AddDaftarHadirSeminarTA1.php';" type="submit" class="btn btn-blue">Tambah Data</button>-->
                                <button type="button" class="btn btn-blue " data-toggle="modal" data-target="#modalAddDaftarHadir">Tambah Data</button>
                                <table class="table table-bordered">                 
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM Mahasiswa</th> 
                                        <th>Nama Mahasiswa</th>
                                        <th>Aksi</th>
                                        </tr>
                                    <tr class="middle">
                                         <td>1</td>
                                         <td>(NIM Mahasiswa)</td>
                                         <td>(Nama Mahasiswa)</td>
                                         <td>
                                            <div class="btn-group-vertical">
                                                <button  type="submit" class="btn btn-red">Hapus</button>
                                            </div>
                                         </td>
                                    </tr>
                                    <tr class="middle">
                                         <td>2</td>
                                         <td>(NIM Mahasiswa)</td>
                                         <td>(Nama Mahasiswa)</td>
                                         <td>
                                             <div class="btn-group-vertical">
                                                <button  type="submit" class="btn btn-red">Hapus</button>
                                            </div>
                                         </td>
                                    </tr>
                                    <tr class="middle">
                                         <td>3</td>
                                         <td>(NIM Mahasiswa)</td>
                                         <td>(Nama Mahasiswa)</td>
                                         <td>
                                             <div class="btn-group-vertical">
                                                <button  type="submit" class="btn btn-red">Hapus</button>
                                            </div>
                                         </td>
                                    </tr>
                                    <tr class="middle">
                                         <td>4</td>
                                         <td>(NIM Mahasiswa)</td>
                                         <td>(Nama Mahasiswa)</td>
                                         <td>
                                             <div class="btn-group-vertical">
                                                <button  type="submit" class="btn btn-red">Hapus</button>
                                            </div>
                                         </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
    <div id="modalAddNilai" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <form action="./controller/Dosen.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Nilai Seminar Tugas Akhir 1</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                                <label for="nilaipembimbing">Nilai Pembimbing 1</label>
                                <input type="text" name="nilaipembimbing1" id="nilaipembimbing1" class="form-control" placeholder="Nilai Pembimbing 1" value="">
                            </div>
                            <div class="form-group">
                                <label for="nilaipenguji">Nilai Penguji</label>
                                <input type="text" name="nilaipenguji" id="nilaipenguji" class="form-control" placeholder="Nilai Penguji" value="">
                            </div>
                            <div class="form-group">
                                <label for="nilaidosenta">Nilai Dosen TA 1</label>
                                <input type="text" name="nilaidosenta1" id="nilaidosenta1" class="form-control" placeholder="Nilai Dosen TA 1" value="">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan Nilai</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-blue" data-dismiss="modal">Tambah Data</button>
                          <button type="button" class="btn btn-red" data-dismiss="modal">Tutup</button>
                        </div>
                          </form>
                      </div>

                    </div>
                </div>
    
    <div id="modalEditNilai" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <form action="./controller/Dosen.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Ubah Nilai Seminar Tugas Akhir 1</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                                <label for="nilaipembimbing">Nilai Pembimbing 1</label>
                                <input type="text" name="nilaipembimbing1" id="nilaipembimbing1" class="form-control" placeholder="Nilai Pembimbing 1" value="(Nilai Pembimbing 1)">
                            </div>
                            <div class="form-group">
                                <label for="nilaipenguji">Nilai Penguji</label>
                                <input type="text" name="nilaipenguji" id="nilaipenguji" class="form-control" placeholder="Nilai Penguji" value="(Nilai Penguji 1)">
                            </div>
                            <div class="form-group">
                                <label for="nilaidosenta">Nilai Dosen TA 1</label>
                                <input type="text" name="nilaidosenta1" id="nilaidosenta1" class="form-control" placeholder="Nilai Dosen TA 1" value="(Nilai Dosen TA 1)">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan Nilai</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="6"> Keterangan sebelumnya</textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-green" data-dismiss="modal">Ubah Data</button>
                          <button type="button" class="btn btn-red" data-dismiss="modal">Tutup</button>
                        </div>
                          </form>
                      </div>

                    </div>
                </div>
    
    <div id="modalAddDaftarHadir" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <form action="./controller/Dosen.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Daftar Hadir Seminar</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>NIP Mahasiswa</th>
                                    </tr>
                                    <tr>
                                        <td class="middle">1</td>
                                        <td><input type="text" name="mahasiswa1" id="mahasiswa1" class="form-control" placeholder="NIP" value=""></td>
                                    </tr>
                                    <tr>
                                        <td class="middle">2</td>
                                        <td><input type="text" name="mahasiswa2" id="mahasiswa2" class="form-control" placeholder="NIP" value=""></td>
                                    </tr>
                                    <tr>
                                        <td class="middle">3</td>
                                        <td><input type="text" name="mahasiswa3" id="mahasiswa3" class="form-control" placeholder="NIP" value=""></td>
                                    </tr>
                                    <tr>
                                       <td class="middle">4</td>
                                        <td><input type="text" name="mahasiswa4" id="mahasiswa4" class="form-control" placeholder="NIP" value=""></td>
                                    </tr>
                                    <tr>
                                        <td class="middle">5</td>
                                        <td><input type="text" name="mahasiswa5" id="mahasiswa5" class="form-control" placeholder="NIP" value=""></td>
                                    </tr>
                                </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-blue" data-dismiss="modal">Tambah Data</button>
                          <button type="button" class="btn btn-red" data-dismiss="modal">Tutup</button>
                        </div>
                          </form>
                      </div>

                    </div>
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
</body>
</html>
