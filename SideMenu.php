<?php
?>
<h3>Menu</h3>
<h4>Magemen User</h4>
<div id="cssmenu">
    <ul>
        <li><a href="ViewProfil.php"><span >Kelola Akun</span></a></li>
    </ul>
</div>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))){?>
<h4>Umum</h4>
<div id="cssmenu">
        <!-- ==================Menu TU_Akademik================================ -->
        <ul>
        <?php if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik")){?>
        <li><a href="ViewInstansiLuar.php"><span >Instansi Luar</span></a></li>
        <li><a href="ViewOrganisasiInternal.php"><span >Organisasi Internal</span></a></li>
        <li><a href="ViewBidangKeilmuan.php"><span >Bidang Keilmuan</span></a></li>
        <li><a href="ViewDaftarHadirKuliah.php"><span >Daftar Hadir Kuliah</span></a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))){?>
        <li><a href="ViewMataKuliah.php"><span >Mata Kuliah</span></a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))){?>
        <li><a href="ViewPengambilanMK.php"><span >Pengambilan Mata Kuliah</span></a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi"))){?>
        <li><a href="ViewDosenWali.php"><span >Dosen Wali</span></a></li>
        <?php }?>
        <?php if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik")){?>
        <li><a href="ViewMahasiswaWali.php"><span >Mahasiswa Wali</span></a></li>
        <?php }?> 
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kaprodi"))){?>
        <li><a href="ViewPengumuman.php"><span >Pengumuman</span></a></li>
        <?php }?>
        <?php if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa")){?>
        <li><a href="ViewPengambilanMKMahasiswa.php">Pengambilan Mata Kuliah</a></li>
        <li><a href="ViewDaftarHadirMahasiswa.php">DaftarHadir</a></li>
        <li><a href="ViewDosenWaliMahasiswa.php">Dosen Wali</a></li> <?php }?>
    </ul>
</div>
            <?php }?>
<!-- ===================Menu Admin================================= -->
<?php if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Admin")){?>
<h4>Admin</h4>
<div id="cssmenu">
    <ul>
        <li><a href= "ViewMahasiswa.php"><span>Mahasiswa</span></a></li>
        <li><a href= "ViewDosen.php"><span>Dosen</span></a></li>
        <li><a href='ViewKaryawan.php'><span>Karyawan</span></a></li>
        <li><a href='ViewUserLain.php'><span>Pengguna Lain</span></a></li>
        <li><a href='ViewUser.php'><span>Pengguna</span></a></li>
        <li><a href='ViewRole.php'><span>Peran Pengguna</span></a></li>
<!--        <li><a href='LogSistem.php'><span>Log Sistem</span></a>
        </li>-->
    </ul>
</div><?php }?>
<!-- ===================End of Menu Admin================================= -->
<?php if(!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']!="Admin")){?>
<h4>Tugas Akhir</h4>
<div id="cssmenu">
    <ul>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))){?>
        <li><a href="ViewPeriodeTA.php"><span >Periode TA</span></a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))){?>
        <li><a href="ViewSKBimbinganTA.php">SK Bimbingan TA</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))){?>
        <li><a href='ViewBimbinganTA.php'><span>Bimbingan TA</span></a></li>
        <li><a href="ViewSyaratSeminarTA1.php">Syarat Seminar TA 1</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Penguji_TA"))){?>
        <li><a href="ViewSeminarTA1.php">Semninar TA 1</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))){?>
        <li><a href="ViewDaftarHadirSeminarTA1.php">Daftar Hadir Seminar TA 1</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Penguji_TA"))){?>
        <li><a href="ViewNilaiTA1.php">Nilai TA 1</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))){?>
        <li><a href="ViewSyaratSeminarTA2.php">Syarat Seminar TA 2</a></li>
         <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))){?>
        <li><a href="ViewSeminarTA2.php">Seminar TA 2</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))){?>
        <li><a href="ViewDaftarHadirSeminarTA2.php">Daftar Hadir Seminar TA 2</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))){?>
        <li><a href="ViewSyaratSidangTA2.php">Syarat Sidang TA 2</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))){?>
        <li><a href="ViewSKSidangTA2.php">SK Sidang TA 2</a></li>
        <?php }?>
        <?php if((!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="TU_Akademik"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Tim_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Kapordi"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Wali"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Mahasiswa"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Pembimbing_TA"))
                || (!isset($_SESSION['usedrole'])||(isset($_SESSION['usedrole'])&&$_SESSION['usedrole']=="Penguji_TA"))){?>
        <li><a href="ViewSidangTA2.php">Sidang TA 2</a></li>
        <li><a href="ViewNilaiTA2.php">Nilai TA 2</a></li>
        <li><a href="ViewPengumpulanTA2.php">Pengumpulan Hasil TA 2</a></li>
        <?php }?>
    </ul>
</div>
<?php }?>
