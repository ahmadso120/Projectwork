<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php


$aksi="modul/mod_galerifoto/aksi_galerifoto.php";
switch($_GET['act']){

   default:
  
  echo"<h3 class='page-header'><strong>Galeri foto</strong></h3>
        <p><a href='?module=galerifoto&act=tambahgalerifoto' class='btn btn-primary'>Tambah Gelleri foto</a></p>
				
					
          <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Foto</th>
                        <th class='text-center'>Judul foto</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
          <tbody>";
	
    
  $tampil = mysql_query("SELECT * FROM gallery ORDER BY id_gallery DESC");
   
  while($r=mysql_fetch_array($tampil)){
 
   echo "
   <tr class='odd gradeX'>
      <td class='text-center'>
      <img style='width:150px;' src='../img_galeri/kecil_$r[gbr_gallery]'>
      </td> 
      <td class='text-center'>$r[jdl_gallery]</td>                               
   <td class='text-center'>
   <a href='?module=galerifoto&act=editgalerifoto&id=$r[id_gallery]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
   <a href=javascript:confirmdelete('$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]&namafile=$r[gbr_gallery]') class='btn btn-danger btn-circle'><span class='fa fa-times'></a>
   </td>
	 </tr>";
   }
   
   echo "</tbody></table> ";
 
  break;    

   case "tambahgalerifoto":
 
  echo"
        <h3 class='page-header'><strong>Tambah Galleri foto</strong></h3>
	 
	
   <form method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data'>

   <p> 
   <label>Judul Foto</label>
   <input type=text name='jdl_gallery'>
   </p> 	

   <p> 
   <label>Gambar</label>
   <input type=file name='fupload' size=40> 
   </p> 	
		  
  <p>
  <button class='btn btn-primary'>Simpan</button>
  <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
  </p>
  
  </form>";
   
   break;

    case "editgalerifoto":
	
    $edit = mysql_query("SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
    $r    = mysql_fetch_array($edit);


    echo" <h3 class='page-header'><strong>Edit Galleri foto</strong></h3>
	
    <form method=POST enctype='multipart/form-data' action=$aksi?module=galerifoto&act=update>
    <input type=hidden name=id value=$r[id_gallery]>
	
   <p> 
   <label>Judul Foto</label>
   <input type=text name='jdl_gallery' size=60 value='$r[jdl_gallery]'>
   </p> 
	   
   <p> 
   <label>Foto</label> ";
    if ($r['gbr_gallery']!=''){
    echo "<img src='../img_galeri/kecil_$r[gbr_gallery]'></p>";  }
		  
   echo "
   <p> 
   <label>Ganti Foto</label>
   <input type=file name='fupload'>  
   </p>		  
   <p>
   <button class='btn btn-primary'>Update</button>
	 <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>   
   </p>

	  </form>";
	  
    break;  
   }
   ?>