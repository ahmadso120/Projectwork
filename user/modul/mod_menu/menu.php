<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_menu/aksi_menu.php";
switch($_GET['act']){
  default:
  
  echo" 
        <div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Menu</strong></h3>
            </div>
        </div>
        <p><a href='?module=menu&act=tambahmenu' class='btn btn-primary'>Tambah Menu</a></p>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Menu
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
				<table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama Menu</th>
                        <th class='text-center'>Link</th>
                        <th class='text-center'>Jenis Menu</th>
                        <th class='text-center'>Aktif</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";

    $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu DESC");
    while ($r=mysql_fetch_array($tampil)){
    echo"<tr class='odd gradeX'>
            <td class='text-center'>$r[nama_menu]</td>
            <td class='text-center'>$r[link]</td>";
            if ($r['jenis_menu']=="Y") {
              echo "<td class='text-center'>Dropdown Menu</td>";
            }else{
              echo "<td class='text-center'>1 Menu</td>";
            }
            echo "<td class='text-center'>$r[aktif]</td>

            <td class='text-center'>
            <a href='?module=menu&act=editmenu&id=$r[id_menu]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
            <a href=javascript:confirmdelete('$aksi?module=menu&act=hapus&id=$r[id_menu]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
            </td>
            </tr>";
    }
    echo "</table>
    </div>
    </div>
    </div>
    </div>
    </div>";

    
    break;

  
  case "tambahmenu":
  
   echo"<h3 class='page-header'><strong>Tambah Menu</strong></h3>
	 
	
    <form method=POST action='$aksi?module=menu&act=input'>

   <p> 
   <label>Nama Menu</label>
   <input type=text name='nama_menu'>
   </p> 
   
    <p> 
   <label>Atribut</label>
   <input type=text name='atribut'>
   </p> 
   
   <p> 
   <label>Link Menu</label>
   <input type=text name='link'>
   </p> 	
   
    <p>
    <label>Jenis Menu</label>
    <select name='jenis'>
    <option value='' /><b>- Pilih Jenis Menu- </b>
    <option value='Y' />Dropdown Menu
    <option value='N' />1 Menu
    </select>
    </p>		 
   
    <p>
    <button class='btn btn-primary'>Simpan</button>
    <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>

   </form></div>";
   
    break;
  

  case "editmenu":
    $edit = mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo" <h3 class='page-header'><strong>Tambah Menu</strong></h3>
	 
   <form method=POST action='$aksi?module=menu&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_menu]>
   
   <p> 
   <label>Nama Menu</label>
   <input type=text name='nama_menu' value='$r[nama_menu]'>
   </p> 
   
    <p> 
   <label>Atribut</label>
   <input type=text name='atribut' value='$r[atribut]'>
   </p> 

    <p> 
   <label>Link Menu</label>
  	<input type=text name='link' value='$r[link]'>
   </p> 
		
	<p>
 	<label>Jenis Menu</label>
 	<select name='jenis'>";
	if ($r['jenis_menu']=='Y'){
	echo"<option value='Y' />Dropdown Menu";
	echo"<option value='N' />1 Menu";
	}else{
 	echo"<option value='Y' />Dropdown Menu";
	echo"<option value='N' />1 Menu";
	 }
 	echo"</select>";
	if ($r['aktif']=='Y'){
   echo "
   <p> 
   <label>Aktif</label>
   <input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak
   </p>";}
									  
   else{
   echo "
   <p> 
   <label>Aktif</label>
   <input type=radio name='aktif' value='Y'>Ya 
   <input type=radio name='aktif' value='N' checked>Tidak
   </p>";}
	echo"<p>
        <button class='btn btn-primary'>Update</button>
		<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
        </p>
   </form></div>";
   
    break;
	
   }
?>
