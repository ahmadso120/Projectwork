<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sub menu
if ($module=='menu' AND $act=='hapus'){
  mysql_query("DELETE FROM menu WHERE id_menu='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub menu
elseif ($module=='menu' AND $act=='input'){
    mysql_query("INSERT INTO menu(nama_menu,
								  atribut,
                                  link, 
								  jenis_menu)
                            VALUES('$_POST[nama_menu]',
                                   '$_POST[atribut]',
                                   '$_POST[link]',
								   '$_POST[jenis]')");
  header('location:../../media.php?module='.$module);
}

// Update sub menu
elseif ($module=='menu' AND $act=='update'){
    mysql_query("UPDATE menu SET   nama_menu = '$_POST[nama_menu]',
									atribut = '$_POST[atribut]',
                                   link  = '$_POST[link]',
								  jenis_menu = '$_POST[jenis]',
								  aktif = '$_POST[aktif]'
                             WHERE id_menu   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
