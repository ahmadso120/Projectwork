<?php
include "../config/conn.php";
if ($_GET['act']=='input_profil') {
	mysql_query("INSERT INTO profil_sekolah(nama_sekolah,tanggal_pendirian,telepon,email,website,alamat,kode_pos,provinsi,kota,nama_kepsek,nama_wakkepsek)
		VALUES('$_POST[nama_sekolah]',
			'$_POST[tanggal_pendirian]',
			'$_POST[telepon]',
			'$_POST[email]',
			'$_POST[website]',
			'$_POST[alamat]',
			'$_POST[kode_pos]',
			'$_POST[provinsi]',
			'$_POST[kota]',
			'$_POST[nama_kepsek]',
			'$_POST[nama_wakkepsek]')");
	echo "<script>window.alert('Data tersimpan');
			window.location=('../media.php?module=dashboard_admin')</script>";
}

if($_GET['act']=="input_siswa")
{
$mr=md5($_POST["k_password"]);
mysql_query("INSERT INTO siswa(nis,nama,jk,alamat,id_kelas,no_tlp,tempat_lahir,tanggal_lahir,id_tingkat,id_jurusan,pass) 
VALUES(
'$_POST[nis]',
'$_POST[nama]',
'$_POST[jk]',
'$_POST[alamat]',
'$_POST[kelas]',
'$_POST[tlp]',
'$_POST[tempat_lahir]',
'$_POST[tanggal_lahir]',
'$_POST[tingkat]',
'$_POST[jurusan]',
'$mr')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}
if($_GET['act']=="edit_siswa"){
$mr=md5($_POST["k_password"]);
mysql_query("UPDATE siswa SET nis='$_POST[nis]',
nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',
idk='$_POST[kelas]',
tlp='$_POST[tlp]',
bapak='$_POST[bapak]',
k_bapak='$_POST[k_bapak]',
ibu='$_POST[ibu]',
k_ibu='$_POST[k_ibu]',
pass='$mr'  where ids='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}
if($_GET['act']=="siswa_det"){
	$pw=md5($_POST['pass']);
if(!empty($_POST['pass'])){
mysql_query("UPDATE siswa SET pass='$pw' where ids='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa_det')</script>";
}else{
echo "<script>window.alert('Isi Password');
        window.location=('../media.php?module=siswa_det')</script>";

}
}
if($_GET['act']=="hapus"){
mysql_query("delete from siswa where ids='$_GET[ids]'");
echo "<script>window.alert('Data Terhapus');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}

if($_GET['act']=="input_user"){
$pw=md5($_POST['pass']);
mysql_query("INSERT INTO user(nama,pass,level) 
VALUES(
'$_POST[nama]',
'$pw',
'admin_guru')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=user')</script>";

}
if($_GET['act']=="edit_user"){
if(!empty($_POST['pass'])){
$pw=md5($_POST['pass']);
mysql_query("update user set nama='$_POST[nama]',
pass='$pw',id='$_POST[sekolah]' where idu='$_POST[idu]'");
}else{
mysql_query("update user set nama='$_POST[nama]',id='$_POST[sekolah]' where idu='$_POST[idu]'");	
	}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=user')</script>";

}
if($_GET['act']=="hapus_user"){
mysql_query("delete from user where idu='$_GET[idu]'");
echo "<script>window.alert('Data Terhapus');
        window.location=('../media.php?module=user')</script>";

}


if($_GET['act']=="input_sekolah"){
mysql_query("INSERT INTO sekolah(kode,nama,alamat) 
VALUES(
'$_POST[kode]',
'$_POST[nama]',
'$_POST[alamat]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}
if($_GET['act']=="edit_sekolah"){
mysql_query("update sekolah set kode='$_POST[kode]',
nama='$_POST[nama]',
alamat='$_POST[alamat]' where id='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}
if($_GET['act']=="hapus_sekolah"){
mysql_query("delete from sekolah where id='$_GET[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}

if ($_GET['act']=="input_kelas") {
	if (isset($_POST['submit'])) {
		$nama_kelas = $_POST['nama_kelas'];
		$jurusan = $_POST['jurusan'];
		$ruangan = $_POST['ruangan'];
		$tingkat = $_POST['tingkat'];
	}
	$cekData="SELECT * from kelas WHERE nama_kelas='$nama_kelas'";
	$cekData=mysql_query($cekData);
	$jumlah = mysql_num_rows($cekData);
	if($jumlah > 0){
		header("location:../media.php?module=input_kelas&act=input&pesandata=1&isidata=Maaf data sudah ada di database");
	}else {
	if (!empty($nama_kelas) and !empty($jurusan) and !empty($ruangan) and !empty($tingkat)) {
		$sql = "INSERT INTO kelas(nama_kelas,id_jurusan,id_ruangan,id_tingkat)
		VALUES('$nama_kelas','$jurusan','$ruangan','$tingkat')";
		$hasil = mysql_query($sql);
		if ($hasil) {
			header("location:../media.php?module=kelas&pesan=1&isi=Berhasil Menambahkan Kelas Baru Dengan nama $nama_kelas");
		}
	}
	else{
		echo "<script>window.alert('Data yang di inputkan tidak lengkap');</script>";
		echo "<meta http-equiv='refresh' content='0; url=../media.php?module=input_kelas&act=input'>";
	}
}
}

if($_GET['act']=="edit_kelas"){
mysql_query("update kelas set id='$_POST[id]',
nama='$_POST[nama]' where idk='$_POST[idk]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}
if($_GET['act']=="hapus_kelas"){
mysql_query("delete from kelas  where id_kelas='$_GET[id_kelas]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}



if($_GET['act']=="input_guru"){
$mrg=md5($_POST['k_password']);
mysql_query("INSERT INTO guru(nip,nama,jk,alamat,idk,pass) 
VALUES(
'$_POST[nip]',
'$_POST[nama]',
'$_POST[jk]',
'$_POST[alamat]',
'$_POST[kelas]',
'$mrg')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru&kls=semua')</script>";

}
if($_GET['act']=="edit_guru"){
$mrg=md5($_POST['k_password']);
mysql_query("update guru set nip='$_POST[nip]',
nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',
pass='$mrg',
idk='$_POST[kelas]' where idg='$_POST[idg]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru&kls=semua')</script>";

}
if($_GET['act']=="hapus_guru"){
mysql_query("delete from guru  where idg='$_GET[idg]'");
echo "<script>window.alert('Data Guru Sudah Terhapus');
		window.location=('../media.php?module=guru&kls=semua')</script>";

}
if($_GET['act']=="guru_det"){
if(!empty($_POST['pass'])){
$pw=md5($_POST['pass']);
mysql_query("update guru set nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',pass='$pw' where idg='$_POST[idg]'");
}else{
mysql_query("update guru set nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]' where idg='$_POST[idg]'");
	
}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru_det')</script>";

}

if ($_GET['act']=="input_jurusan") {
	mysql_query("INSERT INTO jurusan(nama_jurusan,id_tahun)
		VALUES(
			'$_POST[nama_jurusan]',
			'$_POST[tahun_pelajaran]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=jurusan')</script>";
}

if ($_GET['act']=="input_tahun") {
	mysql_query("INSERT INTO tahun_pelajaran(nama_tahun)
		VALUES(
			'$_POST[nama_tahun]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tahun')</script>";
}

if ($_GET['act']=="input_tingkat") {
	mysql_query("INSERT INTO tingkat(nama_tingkat)
		VALUES(
			'$_POST[nama_tingkat]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tingkat')</script>";
}

if ($_GET['act']=="input_gedung") {
	mysql_query("INSERT INTO gedung(nama_gedung,jumlah_lantai)
		VALUES(
			'$_POST[nama_gedung]',
			'$_POST[jumlah_lantai]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=gedung')</script>";
}

if ($_GET['act']=="input_ruangan") {
	mysql_query("INSERT INTO ruangan(nama_ruangan,id_gedung,kapasitas_belajar,kapasitas_ujian)
		VALUES(
			'$_POST[nama_ruangan]',
			'$_POST[gedung]',
			'$_POST[kapasitas_belajar]',
			'$_POST[kapasitas_ujian]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=ruangan')</script>";
}

if ($_GET['act']=="input_semester") {
	mysql_query("INSERT INTO semester(nama_semester)
		VALUES(
			'$_POST[nama_semester]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=ruangan')</script>";
}

if ($_GET['act']=="input_mapel") {
	mysql_query("INSERT INTO mapel(nama_mapel,idg,kurikulum,id_jurusan,id_tingkat,id_semester)
		VALUES(
			'$_POST[nama_mapel]',
			'$_POST[guru]',
			'$_POST[kurikulum]',
			'$_POST[jurusan]',
			'$_POST[tingkat]',
			'$_POST[semester]',
			)");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=mapel')</script>";
}
?>