<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
<?php

$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET['act']){
  // Tampil Halaman Statis
  default:
     echo" <div class='row'>
              <div class='col-lg-12'>
                <h3 class='page-header'><strong>Data Halaman</strong></h3>
              </div>
            </div>
			     <p><a href='?module=halamanstatis&act=tambahhalamanstatis' class='btn btn-primary'>Tambah Halaman</a></p>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Halaman
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
        <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Judul Halaman</th>
                        <th class='text-center'>Link</th>
                        <th class='text-center'>Tanggal Posting</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";

    $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    while($r=mysql_fetch_array($tampil)){

      // membuat info link statis untuk halaman statis
      $huruf_kecil  = strtolower($r['judul']);
      $pisah_huruf  = explode(" ",$huruf_kecil);
      $gabung_huruf = implode("",$pisah_huruf);

      echo "<tr class='odd gradeX'>
            <td class='text-center'>$r[judul]</td>
            <td class='text-center'>hal-$r[judul_seo].html</td>
            <td class='text-center'>$r[tgl_posting]</td>
		        
            <td class='text-center'>
            <a href='?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
            <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
            </td>
            </tr>";
    }
    echo "</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>";
    break;

  case "tambahhalamanstatis":
    echo" <h3 class='page-header'><strong>Tambah Halaman</strong></h3>
          <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
         <p> 
   		<label>Nama Halaman</label>
   		<input type=text name='judul'>
		  </p> 
		  <p> 
         <label>Isi Halaman</label>
		 <textarea name='isi_halaman' id='summernote'></textarea>
		 </p>
      <p>
		 <label>Isi Halaman</label>
		  <input type=file name='fupload' size=40> 
		</P>								  
          <p>
         <button class='btn btn-primary'>Simpan</button>
		 <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                                
        </p></form>";
     break;
    
  case "edithalamanstatis":
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo" <h3 class='page-header'><strong>Tambah Halaman</strong></h3>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
         
		  <p> 
   		<label>Nama Halaman</label>
   		<input type=text name='judul' value='$r[judul]'>
		</p>
		<p> 
         <label>Isi Halaman</label>
		 <textarea name='isi_halaman' id='summernote'>$r[isi_halaman]</textarea>
		 </p>";
          if ($r['gambar']!=''){
              echo "<p>
		 <label>Gambar</label>
		  <img src='../foto_statis/$r[gambar]'>
          </p>";  
          }
    echo "<p>
		 <label> Ganti Gambar</label>
		 <input type=file name='fupload'>
		 </p>";

    echo"</p>	  
 		<p>
        <button class='btn btn-primary'>Update</button>
		<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
        </p></form>";
    break;  
}
?>
