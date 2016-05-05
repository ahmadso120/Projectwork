<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_sekolah/aksi_sekolah.php";
switch($_GET['act']){
  default:
    echo"<h3 class='page-header'><strong>Sekolah asal</strong></h3>
				 <p><a href='?module=sekolah&act=tambahsekolah' class='btn btn-primary'>Tambah Sekolah</a></p>  
					<table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama Sekolah</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>"; 

    $tampil=mysql_query("SELECT * FROM sekolah ORDER BY id_sekolah DESC");
    while ($r=mysql_fetch_array($tampil)){
       echo"<tr class='odd gradeX'>
            <td class='text-center'>$r[nama_sekolah]</td>
            <td class='text-center'>$r[aktif]</td>
   <td class='text-center'>
              <a href='?module=sekolah&act=editsekolah&id=$r[id_sekolah]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
              <a href=javascript:confirmdelete('$aksi?module=sekolah&act=hapus&id=$r[id_sekolah]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
              </td>
              </tr>";		
    }
    echo "</tbody></table>";
    break;
  
  // Form Tambah Sekolah
  case "tambahsekolah":
   echo"<h3 class='page-header'><strong>Sekolah asal</strong></h3>
	 
  <form method=POST action='$aksi?module=sekolah&act=input' enctype='multipart/form-data'>
  <p> 
  <label>Nama Sekolah</label>
  <input type=text name='nama_sekolah' size=40>
   </p> 
			<p>
      <button class='btn btn-primary'>Simpan</button>
			<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
      </p>
   </form></div>";
     break;
  
  // Form Edit Sekolah  
  case "editsekolah":
    $edit=mysql_query("SELECT * FROM sekolah WHERE id_sekolah='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo" <h3 class='page-header'><strong>Edit Sekolah</strong></h3>

  <form method=POST action='$aksi?module=sekolah&act=update' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_sekolah]'>
    
   <p>
   <label>Nama Sekolah</label>
   <input type=text name='nama_sekolah' size=60 value='$r[nama_sekolah]'>
   </p> 	";
    if ($r['aktif']=='Y'){
      echo "            
   <p>
   <label>Aktif</label>  
   <input type=radio name='aktif' value='Y' checked>Y  
   <input type=radio name='aktif' value='N'> N</p>";
    }
    else{
      echo " 
   <p>
   <label>Aktif</label>
   <input type=radio name='aktif' value='Y'>Y  
   <input type=radio name='aktif' value='N' checked>N</p>";
    }

    echo "
								<p>
                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                </p>
   </form>";
    break;  
}
?>
