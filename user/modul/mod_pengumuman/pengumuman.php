<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_pengumuman/aksi_pengumuman.php";
switch($_GET['act']){
  // Tampil Pengumuman
  default:
  
  echo"
			<h3 class='page-header'><strong>Pengumuman</strong></h3>
      <p><a href='?module=pengumuman&act=tambahpengumuman' class='btn btn-primary'>Tambah Pengumuman</a></p>

					<table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Tema</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
    $tampil = mysql_query("SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
    while ($r=mysql_fetch_array($tampil)){
    
        echo"<tr class='odd gradeX'>
              <td class='text-center'>$r[tema]</td>

              <td class='text-center'>
              <a href='?module=pengumuman&act=editpengumuman&id=$r[id_pengumuman]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
              <a href=javascript:confirmdelete('$aksi?module=pengumuman&act=hapus&id=$r[id_pengumuman]&namafile=$r[gambar]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
              </td>
              </tr>";
    }
    echo"</tbody></table>";



    break;

  
  case "tambahpengumuman":
  
   echo"
	
  <h3 class='page-header'><strong>Tambah Pengumuman</strong></h3>
        
  <form method=POST action='$aksi?module=pengumuman&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Tema Pengumuman</label>
   <input type=text name='tema' size=60>
   </p> 		 
   
   <p> 
   <label>Isi Pengumuman</label>
   <textarea name='isi_pengumuman' id='summernote'></textarea>
   </p> 		 
   
   <p> 
   <label>Gambar</label>
   <input type=file name='fupload'></span>
   </p> 		 
   		  	
   
    
								<p>
                <button class='btn btn-primary'>Simpan</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>                
                </p>
   </form>";
   
    break;
  case "editpengumuman":
    $edit = mysql_query("SELECT * FROM pengumuman WHERE id_pengumuman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo"
   <h3 class='page-header'><strong>Edit Pengumuman</strong></h3>
   <form method=POST action='$aksi?module=pengumuman&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_pengumuman]>
		  
   <p>
   <label>Tema Pengumuman</label>
   <input type=text name='tema' size=60 value='$r[tema]'>
   </p> 	
   
   		  
   <p> 
   <label>Isi Pengumuman</label>
   <textarea name='isi_pengumuman' id='summernote'>$r[isi_pengumuman]</textarea>
   </p> 	
   
   <p> 
   <label>Gambar</label>
   <img src='../foto_agenda/$r[gambar]'><br/>
   </p> 	
   
   <p> 
   <label>Ganti Gambar</label>
   <input type=file name='fupload' size=30>
   </p> 
		
    <p>
    <button class='btn btn-primary'>Update</button>
		<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>
   </form>";
   break;
   }
  ?>