<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_info/aksi_info.php";
switch($_GET['act']){
  // Tampil Informasi PPDB Statis
  default:
     echo"<h3 class='page-header'><strong>Info PSB</strong></h3>
                
          <p><a href='?module=info&act=tambahinfo' class='btn btn-primary'>Tambah PSB</a></p>
			
          <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Judul Informasi</th>
                        <th class='text-center'>Tanggal Posting</th>
                        <th class='text-center'>Link</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
					

    $tampil = mysql_query("SELECT * FROM info ORDER BY id_info DESC");
  
    while($r=mysql_fetch_array($tampil)){

      // membuat info link statis untuk info statis
      $huruf_kecil  = strtolower($r['judul']);
      $pisah_huruf  = explode(" ",$huruf_kecil);
      $gabung_huruf = implode("",$pisah_huruf);

      echo "<tr class='odd gradeX'>
                <td class='text-center'>$r[judul]</td>
                <td class='text-center'>$r[tgl_posting]</td>
                <td class='text-center'>hal-$r[judul_seo].html</td>
                

            <td class='text-center'>
              <a href='?module=info&act=editinfo&id=$r[id_info]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
              <a href=javascript:confirmdelete('$aksi?module=info&act=hapus&id=$r[id_info]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
              </td>
              </tr>"; 
   
    }
    echo "</tbody></table>";
    break;

  case "tambahinfo":
    echo"<h3 class='page-header'><strong>Tambah Info</strong></h3>

          <form method=POST action='$aksi?module=info&act=input' enctype='multipart/form-data'>

      <p> 
   		<label>Nama Informasi PSB</label>
   		<input type=text name='judul'>
		  </p>

      <p> 
      <label>Nama Tab</label>
      <input type=text name='nama_tab'>
      </p>  

		  <p> 
      <label>Isi Informasi PPDB</label>
		  <textarea name='isi_info' id='summernote'></textarea>
		  </p>

      <p>
		  <label>Gambar</label>
		  <input type=file name='fupload' size=40> 
		  </P>	

      <p>
      <button class='btn btn-primary'>Simpan</button>
			<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
      </p>
      </form>";
     break;
    
  case "editinfo":
    $edit = mysql_query("SELECT * FROM info WHERE id_info='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo"  <h3 class='page-header'><strong>Edit Info</strong></h3>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=info&act=update>
          <input type=hidden name=id value=$r[id_info]>
         
		  <p> 
   		<label>Nama Informasi PPDB</label>
   		<input type=text name='judul' value='$r[judul]'>
		  </p> 
		  <p> 
      <label>Isi Informasi PPDB</label>
		  <textarea name='isi_info' id='summernote'>$r[isi_info]</textarea>
		  </p>
      <p> 
      <label>Nama Tab</label>
      <input type=text name='nama_tab' value='$r[nama_tab]'>
      </p> ";
          if ($r['gambar']!=''){
              echo "<p>
		  <label>Gambar</label>
		  <img src='../foto_statis/$r[gambar]'></p>";  
          }
    echo "<p>
		 <label> Ganti Gambar</label>
		 <input type=file name='fupload'>
		 </p>";

    echo"
 		<p>
    <button class='btn btn-primary'>Update</button>
		<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>
    </form>";
    break;  
}

?>
