
<?php

$aksi="modul/mod_hasil_tes/aksi_hasil_tes.php";
switch($_GET['act']){
  // Tampil Hasil Tes
  default:
    
    echo" <h3 class='page-header'><strong>Tambah Hasil Tes PSB</strong></h3>

          <form method=POST action='$aksi?module=hasil_tes&act=input'>
		  
          <p> 
   		  <label> No Pendaftaran</label>
		  <input type='text' name='id_pendaftaran'>
		  <p> 
   		  <label>Nilai SKHUN</label>
		  <input type=text name='skhun'></p>
		  <p> 
   		  <label>Nilai Rata Rata Raport</label>
		  <input type=text name='rata_raport'></p>
			<p>
           <button class='btn btn-primary'>Simpan</button>
			<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
           </p></form>";
     break;
    case "edithasil_tes":
    $edit = mysql_query("SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran AND hasil_tes.id_hasil='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo" <h3 class='page-header'><strong>Edit Hasil Tes PSB</strong></h3>
          <form method=POST action=$aksi?module=hasil_tes&act=update>
          <input type=hidden name=id value=$r[id_hasil]>
          <p> 
   		  <label> No Pendaftaran</label>
		  <input type=text name='id_pendaftaran' value='$r[id_pendaftaran]' disabled>
		  </p>
		  <p>
		  <label>Nama Siswa</label>
		  <input type=text name='nama' size=30 value='$r[nama]' disabled>
		  </p>
		  <p>
		  <label>Nilai SKHUN</label>
		  <input type=text name='skhun' value='$r[skhun]'>
		  </p>
		  <p>
		  <label>Nilai Rata Rata Raport</label>
		  <input type=text name='rata_raport' value='$r[rata_raport]'>
		  </p>
		  <p>
          <button class='btn btn-primary'>Update</button>
		  <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
          </p>
          </form>";
    break; 
 
}
?>