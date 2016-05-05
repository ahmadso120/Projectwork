<?php

$aksi="modul/mod_daya_tampung/aksi_daya_tampung.php";
switch($_GET['act']){
  // Tampil Daya Tampung Penerimaan Siswa Baru
  default:
echo " <h3 class='page-header'><strong>Daya Tampung</strong></h3> ";
    $edit = mysql_query("SELECT * FROM daya_tampung");
    $r    = mysql_fetch_array($edit);

    echo "<form method=POST action=$aksi?module=daya_tampung&act=update>
          <input type=hidden name=id value=$r[id_daya_tampung]>
         <p>
          <label>Daya Tampung</label> 
		  <input type=text name='kapasitas' value='$r[kapasitas]'>
      </p>
      <p>
		  <label>Nilai Kelululusan Minimal</label> 
		  <input type=text name='nilai_minimal' value='$r[nilai_minimal]'>
		  </p>
	
		 <p>
         <button class='btn btn-primary'>Simpan</button>
		</p></form";
    break;  
}

?>
