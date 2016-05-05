<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET['act']){
  default:
  
  echo" <div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Sub Menu</strong></h3>
            </div>
        </div>
        <p><a href='?module=submenu&act=tambahsubmenu' class='btn btn-primary'>Tambah Sub Menu</a></p>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Sub Menu
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
        <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama Sub Menu</th>
                        <th class='text-center'>Link</th>
                        <th class='text-center'>Menu Utama</th>
                        <th class='text-center'>Aktif</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
   

    
      $tampil=mysql_query("SELECT * FROM submenu ORDER BY id_sub DESC");

    while ($r=mysql_fetch_array($tampil)){
  echo"<tr class='odd gradeX'>
            <td class='text-center'>$r[nama_sub]</td>
            <td class='text-center'>$r[link_sub]</td>";
            $menu=mysql_query("SELECT * FROM menu WHERE id_menu=$r[id_menu]");
            while ($m=mysql_fetch_array($menu)){ 
              echo "<td class='text-center'>$m[nama_menu]</td>";
            }
            echo "<td class='text-center'>$r[aktif]</td>

            <td class='text-center'>
            <a href='?module=submenu&act=editsubmenu&id=$r[id_sub]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
            <a href=javascript:confirmdelete('$aksi?module=submenu&act=hapus&id=$r[nama_sub]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
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

  
  case "tambahsubmenu":
  
   echo" <h3 class='page-header'><strong>Tambah Menu</strong></h3>
	
  <form method=POST action='$aksi?module=submenu&act=input' enctype='multipart/form-data'>
     
   <p> 
   <label>Nama Sub Menu</label>
   <input type=text name='nama_sub'>
   </p> 
 <p>
 <label>Menu Utama</label>
 <select name='id_menu'>
 <option value='' /><b>- Pilih Menu Utama- </b>";
  $menu=mysql_query("SELECT * FROM menu ORDER BY nama_menu");
   while ($m=mysql_fetch_array($menu)){
 echo"<option value='$m[id_menu]'/>$m[nama_menu]";
}
 echo"</select>
 </p>	
   
   <p> 
   <label>Link Submenu</label>
   <input type=text name='link'>
   </p> 	
   
	<p>
    <button class='btn btn-primary'>Simpan</button>
	<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>
   </form></div>";
   
    break;
  

  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo"<h3 class='page-header'><strong>Tambah Menu</strong></h3>
	 
  <form method=POST action='$aksi?module=submenu&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_sub]>
   
    <p> 
   <label>Nama Submenu</label>
  	<input type=text name='nama_sub' value='$r[nama_sub]'>
   </p> 
   
    
       <p> 
   <label>Link Submenu</label>
   <input type=text name='link_sub' value='$r[link_sub]'>
   </p> 
		
		 <p>
 <label>Menu Utama</label>
 <select name='id_menu'>";
  $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu");
   if ($r['id_menu']==0){
   echo "<option value=0 selected>- Pilih Menu Utama -</option>"; }   
	 while($w=mysql_fetch_array($tampil)){
   if ($r['id_menu']==$w['id_menu']){
   echo "<option value=$w[id_menu] selected>$w[nama_menu]</option>";}
   else{
   echo "<option value=$w[id_menu]>$w[nama_menu]</option> </p> ";}}


	
 echo"</select>
 </p>";
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