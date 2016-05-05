<?php

include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus halaman statis
if ($module=='hasil_tes' AND $act=='hapus'){
 
     mysql_query("DELETE FROM hasil_tes WHERE id_hasil='$_GET[id]'");

  header('location:../../media.php?module='.$module);
}

// Input halaman statis
elseif ($module=='hasil_tes' AND $act=='input'){
$total = $_POST['rata_raport'] + $_POST['skhun'];
    mysql_query("INSERT INTO hasil_tes(id_pendaftaran,
                                    rata_raport,
                                    skhun,
									total) 
                            VALUES('$_POST[id_pendaftaran]',
                                    '$_POST[rata_raport]',
                                   '$_POST[skhun]',
								   '$total')");
mysql_query("UPDATE pendaftaran SET status       = 'S' 
                                    WHERE id_pendaftaran  = '$_POST[id_pendaftaran]'");
  header('location:../../media.php?module='.$module);
  
}

// Update halaman statis
elseif ($module=='hasil_tes' AND $act=='update'){
$total = $_POST['rata_raport'] + $_POST['skhun'];
    mysql_query("UPDATE hasil_tes SET rata_raport = '$_POST[rata_raport]',
                                        skhun = '$_POST[skhun]',
										  total = '$total'
                                    WHERE id_hasil  = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
?>
