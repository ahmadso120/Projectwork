<?php
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='pendaftaran' AND $act=='hapus') {
	mysql_query("DELETE FROM pendaftaran WHERE id_pendaftaran = $_GET[id]");
	header('location:../../media.php?module='.$module);
}
elseif ($module=='pendaftaran' AND $act=='update'){

  mysql_query("UPDATE pendaftaran SET nama = '$_POST[nama]',
                               		tempat  = '$_POST[tempat]',
							   		tgl_lahir  = '$_POST[tanggal_lahir]',
							   		jenis_kelamin = '$_POST[jenis_kelamin]',
							   		agama = '$_POST[agama]',
							   		asal_sekolah  = '$_POST[asal_sekolah]',	
									alamat = '$_POST[alamat]',
							   		wali = '$_POST[wali]',
							   		email = '$_POST[email]',
							   		telp = '$_POST[telp]'
                          WHERE id_pendaftaran   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
