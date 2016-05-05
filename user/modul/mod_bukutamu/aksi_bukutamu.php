<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus bukutamu
if ($module=='bukutamu' AND $act=='hapus'){
  mysql_query("DELETE FROM bukutamu WHERE id_bukutamu='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
?>
