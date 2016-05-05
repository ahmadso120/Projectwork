<?php
include "../config/conn.php";

// siswa
if ($_GET['act']=="input_siswa") {
	$mr=md5($_POST["k_password"]);
	if (isset($_POST['submit'])) {
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$agama = $_POST['agama'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$kelas = $_POST['kelas'];
		$tlp = $_POST['tlp'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$tingkat = $_POST['tingkat'];
		$jurusan = $_POST['jurusan'];
	}

	$cekData1="SELECT * from siswa WHERE nis='$nis'";
	$cekData2=mysql_query($cekData1);
	$jumlah1 = mysql_num_rows($cekData2);
	if($jumlah1 > 0){
		header("location:../media.php?module=input_siswa&act=input&pesandata=1&isidata=Maaf data sudah ada di database");
	}
	else{

		if (! empty($_FILES['nama_file']['tmp_name'])) {
			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);
		}
		else {
			// Jika tidak ada foto/gambar
			$file_foto = "";
		}

	$sql1 = "INSERT INTO siswa(nis,nama,jk,agama,email,foto,alamat,id_kelas,no_telp,tempat_lahir,tanggal_lahir,id_tingkat,id_jurusan,pass)
	VALUES('$nis','$nama','$jk','$agama','$email','$file_foto','$alamat','$kelas', '$tlp', '$tempat_lahir', '$tanggal_lahir', '$tingkat', '$jurusan', '$mr')";
	$hasil1 = mysql_query($sql1);
	if ($hasil1) {
		header("location:../media.php?module=siswa&pesan=1&isi=Berhasil Menambahkan Siswa Baru Dengan Nama <b>$nama</b>");
	}
}
}
if($_GET['act']=="edit_siswa"){
if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$agama = $_POST['agama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kelas = $_POST['kelas'];
	$tlp = $_POST['tlp'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$tingkat = $_POST['tingkat'];
	$jurusan = $_POST['jurusan'];
}
	
	// Membaca Kode dari form hidden
		$Kode	= $_POST['ids'];
		
		# SKRIP UNTUK MENYIMPAN FOTO/GAMBAR
		if (empty($_FILES['nama_file']['tmp_name'])) {
			// Jika file baru tidak ada, mama file gambar lama yang dibaca
			$file_foto = $_POST['namafile'];
		}
		else  {
			// Jika file gambar lama ada, akan dihapus
			if(! $_POST['namafile']=="") {
			if(file_exists("foto/".$_POST['namafile'])) {
				unlink("foto/".$_POST['namafile']);	
			}
			}

			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $kode."".$file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);					
		}

	$sql2 = "UPDATE siswa SET nis='$nis', nama='$nama', jk='$jk', agama='$agama', email='$email', foto='$file_foto',alamat='$alamat', id_kelas='$kelas', no_telp='$tlp', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', id_tingkat='$tingkat', id_jurusan='$jurusan' where ids='$_POST[ids]'";
	$hasil2 = mysql_query($sql2);
	if ($hasil2) {
		header("location:../media.php?module=siswa&pesan=1&isi=Berhasil Mengedit Siswa Dengan Nama <b>$nama</b>");
	}
}
if($_GET['act']=="siswa_det"){
	if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$agama = $_POST['agama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kelas = $_POST['kelas'];
	$tlp = $_POST['tlp'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$tingkat = $_POST['tingkat'];
	$jurusan = $_POST['jurusan'];
}
	
	// Membaca Kode dari form hidden
		$Kode	= $_POST['ids'];
		
		# SKRIP UNTUK MENYIMPAN FOTO/GAMBAR
		if (empty($_FILES['nama_file']['tmp_name'])) {
			// Jika file baru tidak ada, mama file gambar lama yang dibaca
			$file_foto = $_POST['namafile'];
		}
		else  {
			// Jika file gambar lama ada, akan dihapus
			if(! $_POST['namafile']=="") {
			if(file_exists("foto/".$_POST['namafile'])) {
				unlink("foto/".$_POST['namafile']);	
			}
			}

			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $kode."".$file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);					
		}

	$sql9 = "UPDATE siswa SET nis='$nis', nama='$nama', jk='$jk', agama='$agama', email='$email', foto='$file_foto',alamat='$alamat', id_kelas='$kelas', no_telp='$tlp', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', id_tingkat='$tingkat', id_jurusan='$jurusan' where ids='$_POST[ids]'";
	$hasil6 = mysql_query($sql9);
	if ($hasil6) {
		header("location:../media.php?module=home");
	}
}
if($_GET['act']=="hapus"){
	$sql4 = "SELECT * FROM siswa WHERE ids='$_GET[ids]'";
	$hasil4 = mysql_query($sql4);
	$rs = mysql_fetch_array($hasil4);
	if(! $rs['foto']=="") {
		if(file_exists("foto/".$rs['foto'])) {
			// Jika file gambarnya ada, akan dihapus
			unlink("foto/".$rs['foto']); 
		}
	}
$sql3 = "DELETE FROM siswa WHERE ids='$_GET[ids]'";
$hasil3 = mysql_query($sql3);
header("location:../media.php?module=siswa");
}

// user
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
pass='$pw' where idu='$_POST[idu]'");
}else{
mysql_query("update user set nama='$_POST[nama]' where idu='$_POST[idu]'");	
	}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=user')</script>";

}
if($_GET['act']=="hapus_user"){
mysql_query("delete from user where idu='$_GET[idu]'");
header("location:../media.php?module=user");
}

//jenis nilai
if ($_GET['act']=="input_jenis") {
	mysql_query("INSERT INTO jenis_nilai(jenis_nilai)
		VALUES('$_POST[jenis]')");
	echo "<script>window.alert('Data Tersimpan');
	window.location=('../media.php?module=jenis_nilai')</script>";
}
if ($_GET['act']=="edit_jenis") {
	mysql_query("UPDATE jenis_nilai SET jenis_nilai='$_POST[jenis]' WHERE id_jenis='$_POST[id_jenis]'");
	echo "<script>window.alert('Data Tersimpan');
	window.location=('../media.php?module=jenis_nilai')</script>";
}
if ($_GET['act']=="hapus_jenis") {
	mysql_query("DELETE FROM jenis_nilai WHERE id_jenis='$_GET[id_jenis]'");
	header("location:../media.php?module=jenis_nilai");
}

//nilai
if ($_GET['act']=="input_nilai") {
	mysql_query("INSERT INTO nilai(id_mapel,idg,id_kelas,ids,id_jenis,id_tahun,nilai)
		VALUES('$_POST[mapel]','$_POST[guru]','$_POST[kelas]','$_POST[siswa]','$_POST[jenis]','$_POST[tahun]','$_POST[nilai]')");
	echo "<script>window.alert('Data Tersimpan');
	window.location=('../media.php?module=nilai')</script>";
}
if ($_GET['act']=="edit_nilai") {
	mysql_query("UPDATE nilai SET id_mapel='$_POST[mapel]',
	id_kelas='$_POST[kelas]', ids='$_POST[siswa]', id_jenis='$_POST[jenis]', id_tahun='$_POST[tahun]', nilai='$_POST[nilai]' WHERE id_nilai='$_POST[id_nilai]'");
	echo "<script>window.alert('Data Tersimpan');
	window.location=('../media.php?module=nilai')</script>";
}
if ($_GET['act']=="hapus_nilai") {
	mysql_query("DELETE FROM nilai WHERE id_nilai='$_GET[id_nilai]'");
	header("location:../media.php?module=nilai");
}
// kelas
if ($_GET['act']=="input_kelas") {
	if (isset($_POST['submit'])) {
		$nama_kelas = $_POST['nama_kelas'];
		$wali_kelas = $_POST['wali_kelas'];
		$jurusan = $_POST['jurusan'];
		$tahun = $_POST['tahun'];
		$ruangan = $_POST['ruangan'];
		$tingkat = $_POST['tingkat'];
	}
	$cekData="SELECT * from kelas WHERE nama_kelas='$nama_kelas' AND id_tahun='$tahun'";
	$cekData=mysql_query($cekData);
	$jumlah = mysql_num_rows($cekData);
	if($jumlah > 0){
		header("location:../media.php?module=input_kelas&act=input&pesandata=1&isidata=Maaf data sudah ada di database");
	}else {
		$sql = "INSERT INTO kelas(nama_kelas,idg,id_jurusan,id_tahun,id_ruangan,id_tingkat)
		VALUES('$nama_kelas','$wali_kelas','$jurusan','$tahun','$ruangan','$tingkat')";
		$hasil = mysql_query($sql);
		if ($hasil) {
			header("location:../media.php?module=kelas&pesan=1&isi=Berhasil Menambahkan Kelas Baru Dengan nama $nama_kelas");
		}
}
}

if($_GET['act']=="edit_kelas"){
mysql_query("UPDATE kelas SET nama_kelas='$_POST[nama]',
idg='$_POST[wali_kelas]',id_jurusan='$_POST[jurusan]', 
id_tahun='$_POST[tahun]',id_ruangan='$_POST[ruangan]', 
id_tingkat='$_POST[tingkat]' where id_kelas='$_POST[id_kelas]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}
if($_GET['act']=="hapus_kelas"){
mysql_query("delete from kelas  where id_kelas='$_GET[id_kelas]'");
header("location:../media.php?module=kelas");
}

// guru
if($_GET['act']=="input_guru"){
$cekData3 = mysql_query("SELECT * FROM guru WHERE nip='$_POST[nip]'");
$jumlah2 = mysql_num_rows($cekData3);
if ($jumlah2 > 0) {
	header("location:../media.php?module=input_guru&act=input&pesandata=1&isidata=Maaf data sudah ada di database");
}else{
	if (! empty($_FILES['nama_file']['tmp_name'])) {
			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);
		}
		else {
			// Jika tidak ada foto/gambar
			$file_foto = "";
		}
	$mrg=md5($_POST['k_password']);
	$sql5 = mysql_query("INSERT INTO guru(nip,nama,jk,agama,tempat_lahir,tanggal_lahir,no_telp,gelar,pass,alamat,foto) 
	VALUES(
	'$_POST[nip]',
	'$_POST[nama]',
	'$_POST[jk]',
	'$_POST[agama]',
	'$_POST[tempat_lahir]',
	'$_POST[tanggal_lahir]',
	'$_POST[no_telp]',
	'$_POST[gelar]',
	'$mrg',
	'$_POST[alamat]',
	'$file_foto')");
	if ($sql5) {
		header("location:../media.php?module=guru&pesan=1&isi=Berhasil Menambahkan Guru Dengan Nama <b>$_POST[nama]</b>");
	}
}
}
if($_GET['act']=="edit_guru"){
	$Kode	= $_POST['idg'];
		
		# SKRIP UNTUK MENYIMPAN FOTO/GAMBAR
		if (empty($_FILES['nama_file']['tmp_name'])) {
			// Jika file baru tidak ada, mama file gambar lama yang dibaca
			$file_foto = $_POST['namafile'];
		}
		else  {
			// Jika file gambar lama ada, akan dihapus
			if(! $_POST['namafile']=="") {
			if(file_exists("foto/".$_POST['namafile'])) {
				unlink("foto/".$_POST['namafile']);	
			}
			}

			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $kode."".$file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);					
		}
$sql6 = mysql_query("UPDATE guru SET nip='$_POST[nip]',
nama='$_POST[nama]',
jk='$_POST[jk]',
agama='$_POST[agama]',
tempat_lahir='$_POST[tempat_lahir]',
tanggal_lahir='$_POST[tanggal_lahir]',
no_telp='$_POST[no_telp]',
gelar='$_POST[gelar]',
alamat='$_POST[alamat]',
foto='$file_foto' WHERE idg='$_POST[idg]'");
if ($sql6) {
	header("location:../media.php?module=guru&pesan=1&isi=Berhasil Mengedit Guru Dengan Nama <b>$_POST[nama]</b>");
}
}
if($_GET['act']=="guru_det"){
	$Kode	= $_POST['idg'];
		
		# SKRIP UNTUK MENYIMPAN FOTO/GAMBAR
		if (empty($_FILES['nama_file']['tmp_name'])) {
			// Jika file baru tidak ada, mama file gambar lama yang dibaca
			$file_foto = $_POST['namafile'];
		}
		else  {
			// Jika file gambar lama ada, akan dihapus
			if(! $_POST['namafile']=="") {
			if(file_exists("foto/".$_POST['namafile'])) {
				unlink("foto/".$_POST['namafile']);	
			}
			}

			// Membaca nama file foto/gambar
			$file_foto = $_FILES['nama_file']['name'];
			$file_foto = stripslashes($file_foto);
			$file_foto = str_replace("'","",$file_foto);
			
			// Simpan gambar
			$file_foto = $kode."".$file_foto;
			copy($_FILES['nama_file']['tmp_name'],"foto/".$file_foto);					
		}
$sql6 = mysql_query("UPDATE guru SET nip='$_POST[nip]',
nama='$_POST[nama]',
jk='$_POST[jk]',
agama='$_POST[agama]',
tempat_lahir='$_POST[tempat_lahir]',
tanggal_lahir='$_POST[tanggal_lahir]',
no_telp='$_POST[no_telp]',
gelar='$_POST[gelar]',
alamat='$_POST[alamat]',
foto='$file_foto' WHERE idg='$_POST[idg]'");
if ($sql6) {
	header("location:../media.php?module=home");
}
}
if($_GET['act']=="hapus_guru"){
	$sql8 = "SELECT * FROM guru WHERE idg='$_GET[idg]'";
	$hasil5 = mysql_query($sql8);
	$rs = mysql_fetch_array($hasil5);
	if(! $rs['foto']=="") {
		if(file_exists("foto/".$rs['foto'])) {
			// Jika file gambarnya ada, akan dihapus
			unlink("foto/".$rs['foto']); 
		}
	}


// jurusan
if ($_GET['act']=="input_jurusan") {
	mysql_query("INSERT INTO jurusan(nama_jurusan,id_tahun)
		VALUES(
			'$_POST[nama_jurusan]',
			'$_POST[tahun_pelajaran]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=jurusan')</script>";
}
if($_GET['act']=="edit_jurusan"){
mysql_query("UPDATE jurusan SET nama_jurusan='$_POST[nama_jurusan]',
id_tahun = '$_POST[tahun_pelajaran]'
WHERE id_jurusan = '$_POST[id_jurusan]'");
echo "<script>window.alert('Edit berhasil');
        window.location=('../media.php?module=jurusan')</script>";
}
if ($_GET['act']=="hapus_jurusan") {
	mysql_query("DELETE FROM jurusan WHERE id_jurusan='$_GET[id_jurusan]'");
	header("location:../media.php?module=jurusan");
}

// tahun_pelajaran
if ($_GET['act']=="input_tahun") {
	mysql_query("INSERT INTO tahun_pelajaran(nama_tahun)
		VALUES(
			'$_POST[nama_tahun]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tahun')</script>";
}
if ($_GET['act']=="edit_tahun") {
	mysql_query("UPDATE tahun_pelajaran SET nama_tahun='$_POST[nama_tahun]' where id_tahun='$_POST[id_tahun]'");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tahun')</script>";
}
if ($_GET['act']=="hapus_tahun") {
	mysql_query("DELETE FROM tahun_pelajaran WHERE id_tahun = $_GET[id_tahun]");
	header("location:../media.php?module=tahun");
}

// tingkat
if ($_GET['act']=="input_tingkat") {
	mysql_query("INSERT INTO tingkat(nama_tingkat)
		VALUES(
			'$_POST[nama_tingkat]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tingkat')</script>";
}
if ($_GET['act']=="edit_tingkat") {
	mysql_query("UPDATE tingkat SET nama_tingkat = [nama_tingkat] WHERE id_tingkat = '$_POST[id_tingkat]'");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=tingkat')</script>";
}
if ($_GET['act']=="hapus_tingkat") {
	mysql_query("DELETE FROM tingkat WHERE id_tingkat = '$_GET[id_tingkat]'");
	header("location:../media.php?module=tingkat");
}

// ruangan
if ($_GET['act']=="input_ruangan") {
	mysql_query("INSERT INTO ruangan(nama_ruangan,kapasitas_belajar,kapasitas_ujian)
		VALUES(
			'$_POST[nama_ruangan]',
			'$_POST[kapasitas_belajar]',
			'$_POST[kapasitas_ujian]')");
	echo "<script>window.alert('Data Tersimpan');
			window.location=('../media.php?module=ruangan')</script>";
}
if($_GET['act']=="edit_ruangan"){
mysql_query("UPDATE ruangan SET nama_ruangan='$_POST[nama_ruangan]',
kapasitas_belajar = '$_POST[kapasitas_belajar]',
kapasitas_ujian = '$_POST[kapasitas_ujian]'
WHERE id_ruangan = '$_POST[id_ruangan]'");
echo "<script>window.alert('Edit berhasil');
        window.location=('../media.php?module=ruangan')</script>";
}
if ($_GET['act']=="hapus_ruangan") {
	mysql_query("DELETE FROM ruangan WHERE id_ruangan='$_GET[id_ruangan]'");
	header("location:../media.php?module=ruangan");
}

//mapel
if ($_GET['act']=="input_mapel") {
	$cekData4 = mysql_query("SELECT * FROM mata_pelajaran WHERE nama_mapel='$_POST[nama_mapel]' AND idg='$_POST[guru]'");
	$jumlah3 = mysql_num_rows($cekData4);
	if ($jumlah3 > 0) {
		header("location:../media.php?module=input_mapel&act=input&pesandata=1&isidata=Maaf data sudah ada di database");
	}else{
	$sql7 = mysql_query("INSERT INTO mata_pelajaran (nama_mapel,idg,id_jurusan,id_tingkat)
		VALUES(
			'$_POST[nama_mapel]',
			'$_POST[guru]',
			'$_POST[jurusan]',
			'$_POST[tingkat]'
			)");
}
	if ($sql7) {
		header("location:../media.php?module=mapel&act=input&pesan=1&isi=Berhasil Menambahkan Mapel Baru dengan Nama <b>$_POST[nama_mapel]</b>");		
	}
}
if($_GET['act']=="edit_mapel"){
mysql_query("UPDATE mata_pelajaran SET nama_mapel='$_POST[nama_mapel]',
idg = '$_POST[guru]',
id_jurusan = '$_POST[jurusan]',
id_tingkat = '$_POST[tingkat]'
WHERE id_mapel = '$_POST[id_mapel]'");
echo "<script>window.alert('Edit berhasil');
        window.location=('../media.php?module=mapel')</script>";
}
if ($_GET['act']=="hapus_mapel") {
	mysql_query("DELETE FROM mata_pelajaran WHERE id_mapel='$_GET[id_mapel]'");
	header("location:../media.php?module=mapel");
}

//ubah password
if ($_GET['act']=="ubahpasssiswa") {
	$siswa=md5($_POST['s_password']);
	mysql_query("UPDATE siswa SET pass='$siswa' WHERE ids = '$_POST[ids]'");
	echo "<script>window.alert('Ubah Password berhasil');
        window.location=('../media.php?module=home')</script>";
}
if ($_GET['act']=="ubahpassadmin") {
	$aa=md5($_POST['a_password']);
	mysql_query("UPDATE user SET pass='$aa' WHERE idu = '$_POST[idu]'");
	echo "<script>window.alert('Ubah Password berhasil');
        window.location=('../media.php?module=home')</script>";
}
if ($_GET['act']=="ubahpassguru") {
	$gg=md5($_POST['g_password']);
	mysql_query("UPDATE guru SET pass='$gg' WHERE idg = '$_POST[idg]'");
	echo "<script>window.alert('Ubah Password berhasil');
        window.location=('../media.php?module=home')</script>";
}
}
?>