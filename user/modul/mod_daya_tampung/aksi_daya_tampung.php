<?php

include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];



if ($module=='daya_tampung' AND $act=='update'){

    mysql_query("UPDATE daya_tampung SET kapasitas       = '$_POST[kapasitas]',
                                          nilai_minimal = '$_POST[nilai_minimal]'
                                    WHERE id_daya_tampung  = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  

}
?>
