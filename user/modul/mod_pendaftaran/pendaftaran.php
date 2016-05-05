<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
<?php

$aksi="modul/mod_pendaftaran/aksi_pendaftaran.php";
switch($_GET['act']){
  // Tampil Pendaftaran
  default:
   echo"  <h3 class='page-header'><strong>Data Pendaftaran</strong></h3>
          <p><a href='../laporan-pendaftaran.html' class='btn btn-primary' target='_blank'>Cetak laporan pendaftaran</a></p>
              <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>No Pendaftaran</th>
                        <th class='text-center'>Nama</th>
                        <th class='text-center'>TTL</th>
                        <th class='text-center'>No Telp</th>
                        <th class='text-center'>Tanggal daftar</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";



    $tampil=mysql_query("SELECT * FROM pendaftaran ORDER BY id_pendaftaran");

    while ($r=mysql_fetch_array($tampil)){
	  
    echo"<tr class='odd gradeX'>
                                            <td class='text-center'>$r[id_pendaftaran]</td>
                                            <td class='text-center'>$r[nama]</td>
                                            <td class='text-center'>$r[tempat],$r[tgl_lahir]</td>
                                            <td class='text-center'>$r[telp]</td>
                                            <td class='text-center'>$r[tgl_pendaftaran]</td>
              <td class='text-center'>
              <a href='?module=pendaftaran&act=editpendaftaran&id=$r[id_pendaftaran]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>     
              <a href='../bukti-pendaftaran-$r[id_pendaftaran].html' target='_blank' title='cetak'> <button type='button' class='btn btn-warning btn-circle'><i class='glyphicon glyphicon-print'></i></button></a>      
              <a href=javascript:confirmdelete('$aksi?module=pendaftaran&act=hapus&id=$r[id_pendaftaran]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
              </td>
              </tr>";

      
    }

    echo "</tbody></table>";
    break;

 

  case "editpendaftaran":
   $edit = mysql_query("SELECT *  FROM pendaftaran WHERE id_pendaftaran='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

  echo" <h3 class='page-header'><strong>Edit Pendaftaran</strong></h3>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=pendaftaran&act=update>
          <input type=hidden name=id value=$r[id_pendaftaran]>
 		  <p> 
   		<label>Nama Calon Siswa</label>
		  <input type=text name='nama' size=40 value='$r[nama]'>
		  </p>
		  <p> 
   		<label>Tempat Lahir</label>
		  <input type=text name='tempat' size=30 value='$r[tempat]'>
		  </p>
      <p>
      <label>Tanggal Lahir</label>
      <input type='date' name='tanggal_lahir' value='$r[tgl_lahir]'>
      </p>
		  
		  <p>
      <label>Jenis kelamin</label>
		  <select name='jenis_kelamin'>";
          if ($r['jenis_kelamin']=='P'){
		   echo "<option value='L'>Laki-laki</option>";
           echo "<option value='P' selected>Perempuan</option>";}
           else{
 		  echo "<option value='L' selected>Laki-laki</option>";
  		  echo "<option value='P' >Perempuan</option>";
          }
    	  echo "</select></p>

		  <p>
      <label>Agama</label>
		  <select name='agama' id='select'>
			<option value='Islam'>Islam</option>
			<option value='Kristen'>Kristen</option>
			<option value='Katolik'>Katolik</option>
			<option value='Hindhu'>Hindhu</option>
			<option value='Budha'>Budha</option>
			</select>
      </p>

			<p>
		  <label>Asal Sekolah</label>
		  <select name='asal_sekolah'>";
		  $tampil=mysql_query("SELECT * FROM sekolah WHERE aktif='Y' ORDER BY nama_sekolah DESC");
		   if ($r['asal_sekolah']=='0'){
		   echo "<option value=0 selected>- Pilih Sekolah -</option>"; }   
		  while($w=mysql_fetch_array($tampil)){
		   if ($r['asal_sekolah']==$w['id_sekolah']){
		   echo "<option value=$w[id_sekolah] selected>$w[nama_sekolah]</option>";}
		   else{
		   echo "<option value=$w[id_sekolah]>$w[nama_sekolah]</option> </p> ";}}
		 echo"</select>

		  </p>
		  <p><label>Alamat</label>
		  <textarea name='alamat'>$r[alamat]</textarea>
		  </p>

		  <p>
      <label>Nama ayah/Wali</label>
		  <input type=text name='wali' size=40 value='$r[wali]'>
		  </p>

	    <p><label>No Telp</label>
		  <input type=text name='telp' size=20 value='$r[telp]'>
		  </p>

		  <p>
      <label>Email</label>
		  <input type=text name='email' size=40 value='$r[email]'>
		  </p>
";	  
		      echo  "<p'>
                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                                
                            </p></form>";
    break;  
}
?>
