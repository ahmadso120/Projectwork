<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Input sekolah
if ($module=='sekolah' AND $act=='input'){
  $sekolah_seo = seo_title($_POST['nama_sekolah']);
  mysql_query("INSERT INTO sekolah(nama_sekolah,sekolah_seo) VALUES('$_POST[nama_sekolah]','$sekolah_seo')");
  header('location:../../media.php?module='.$module);
}

// Update sekolah
elseif ($module=='sekolah' AND $act=='update'){
  $sekolah_seo = seo_title($_POST['nama_sekolah']);
  mysql_query("UPDATE sekolah SET nama_sekolah='$_POST[nama_sekolah]', sekolah_seo='$sekolah_seo', aktif='$_POST[aktif]' 
               WHERE id_sekolah = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
