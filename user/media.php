<?php
error_reporting(0);
session_start();
if(!empty($_SESSION['nama'])){
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$guru=$_SESSION['idg'];
$siswa=$_SESSION['ids'];
include "config/conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik Sekolah</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="DataTables/extensions/TableTools/css/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="summernote/dist/summernote.css">

</head>
<body style="padding-top:60px; padding-bottom:40px;">
<div class="container">
<div class="navbar navbar-inverse navbar-fixed-top" style="background: #035e19">
      	<div style="margin-left: 20px">
			<img style="width: 250px; margin-bottom : 7px; margin-top : 7px; height:70px; display: inline; float: left" src="logo.png">
		</div>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-top : 84px">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                            <li><a href="media.php?module=home">Home</a>
                            <?php if ($level == "guru") {?>
                                <li><a href="media.php?module=berita&act=tambahberita">Tambah Artikel/Berita</a>
                                <li><a href="media.php?module=nilai">Nilai Siswa</a>
                                <li><a href="media.php?module=guru_det">Guru</a>
                            <?php } ?>

                            <?php if ($level == "siswa") {?>
                                <li><a href="media.php?module=laporan">Laporan Nilai</a>
                                <li><a href="media.php?module=siswa_det">Siswa</a>
                            <?php } ?>

                            <?php if ($level == 'admin_guru') {?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    
                                        
                                        <li><a href="media.php?module=ruangan">Ruangan</a>
                                        </li>
                                        <li><a href="media.php?module=jurusan">Jurusan</a>
                                        </li>
                                        <li><a href="media.php?module=kelas">Kelas</a>
                                        </li>
                                        <li><a href="media.php?module=siswa">Siswa</a>
                                        </li>
                                        <li><a href="media.php?module=guru">Guru</a>
                                        </li>
                                        <li><a href="media.php?module=mapel">Mata Pelajaran</a>
                                        </li>
                                        <li><a href="media.php?module=tahun">Tahun Pelajaran</a>
                                        </li>
                                        <li><a href="media.php?module=tingkat">Tingkat</a>
                                        </li>
                                        <li><a href="media.php?module=jenis_nilai">Jenis Nilai</a>
                                        </li>
                                        <li><a href="media.php?module=user">User</a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="media.php?module=berita">Berita</a>
                                    </li>
                                    <li><a href="media.php?module=pengumuman">Pengumuman</a>
                                    </li>
                                    <li><a href="media.php?module=galerifoto">Galeri foto</a>
                                    </li>
                                    <li><a href="media.php?module=kategori">kategori</a>
                                    </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PSB<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="media.php?module=info">Info PSB</a>
                                    </li>
                                    <li><a href="media.php?module=daya_tampung">Daya Tampung</a>
                                    </li>
                                    <li><a href="media.php?module=pendaftaran">Pendaftaran</a>
                                    </li>
                                    <li><a href="media.php?module=hasil_tes">Hasil Tes</a>
                                    </li>
                                    <li><a href="media.php?module=sekolah">Sekolah Asal</a>
                                    </li>
                                    </ul>
                                </li>

                                <li><a href="media.php?module=halamanstatis">Halaman</a>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kontak<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="media.php?module=bukutamu">Buku Tamu</a>
                                    </li>
                                    <li><a href="media.php?module=hubungi">Hubungi</a>
                                    </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="media.php?module=identitas">Identitas</a>
                                    </li>
                                    <li><a href="media.php?module=menu">Menu</a>
                                    </li>
                                    <li><a href="media.php?module=submenu">Sub Menu</a>
                                    </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layout<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="media.php?module=content">Content</a>
                                    </li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
            <div class="btn-group navbar-form pull-right">
				<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo "$usre ";?><b class="caret"></b></a>
				</a>
				<ul class="dropdown-menu">
                    <?php                     
                    if ($level == "admin_guru") {?>
                    <li><a href="media.php?module=ubahpassadmin&idu=<?php echo "$_SESSION[idu]"?>;">Ganti Password</a></li>
                    <?php }?>
                   

                    <?php 
                    if ($level == "guru") {?>
                    <li><a href="media.php?module=ubahpassguru&idg=<?php echo "$_SESSION[idg]"?>;">Ganti Password</a></li>
                    
                    <?php } ?>

                    <?php 
                    if ($level == "siswa") {?>
                    <li><a href="media.php?module=ubahpasssiswa&ids=<?php echo "$_SESSION[ids]"?>;">Ganti Password</a></li>
                    <?php }?>

					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
        </div>

		</nav>
</div>
<div class="container-fluid" style="margin-top : 80px;">
<?php include "content.php";?>
</div>
    <div class="navbar navbar-inverse navbar-fixed-bottom">
    <p class="navbar-text">&copy; Sistem Informasi Akademik Sekolah</p>
    </div>

	<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/media/js/jquery.dataTables.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        var editor = CKEDITOR.replace("summernote", {
            uiColor : '#035e19'
        });
    });
    </script>
</body>
</html>
<?php } ?>