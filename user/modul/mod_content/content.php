<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php


$aksi="modul/mod_content/aksi_content.php";
switch($_GET['act']){

  default:
  
  echo" <div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Content</strong></h3>
            </div>
        </div>
        <p><a href='?module=content&act=tambahcontent' class='btn btn-primary'>Tambah Content</a></p>
				<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Content
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
        <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama Content</th>
                        <th class='text-center'>Script</th>
                        <th class='text-center'>Posisi</th>
                        <th class='text-center'>Aktif</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
   
      $tampil=mysql_query("SELECT * FROM content ORDER BY id_content DESC");
    
    while ($r=mysql_fetch_array($tampil)){
    
   echo " <tr class='odd gradeX'>
            <td class='text-center'>$r[nama_content]</td>
            <td class='text-center'>$r[code]</td>
            <td class='text-center'>$r[posisi]</td>
            <td class='text-center'>$r[aktif]</td>
            <td class='text-center'>
            <a href='?module=content&act=editcontent&id=$r[id_content]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>
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

  
  case "tambahcontent":
  
   echo" <h3 class='page-header'><strong>Tambah Menu</strong></h3>
	
  <form method=POST action='$aksi?module=content&act=input'>
     
   <p> 
   <label>Nama Content</label>
   <input type=text name='nama_content'>
   </p> 
   <p> 
   <label>Code Script</label>
   <input type=text name='code'>
   </p> 
   <p> 
   <label>Posisi</label>
   <input type=text name='posisi'>
   </p> 

   
	 <p>
	 <label>aktif</label>
	 <select name='aktif'>
	 <option value='' /><b>- Aktifkan - </b>
	 <option value='Y' />Aktif
	 <option value='N' />Non Aktif
	 </select>
	 </p>		
	<p>
    <button class='btn btn-primary'>Simpan</button>
    <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>
   </form></div>";
   
    break;
  

  case "editcontent":
    $edit = mysql_query("SELECT * FROM content WHERE id_content='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

   echo"<div class='rightpanel'>
  	    <ul class='breadcrumbs'>
       <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
       <li>Layout Content</li>
       </ul>
       <div class='pageheader'>
        	<div class='pageicon'><span class='iconfa-columns'></span></div>
            <div class='pagetitle'>
                <h5>Atur Layout Content</h5>
                <h1>Edit Content</h1>
            </div>
        </div><!--pageheader-->
		<div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Content</h4>
                <div class='widgetcontent nopadding'>
	 
  <form class='stdform stdform2' method=POST action='$aksi?module=content&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_content]>
   
    <p> 
   <label>Nama Menu</label>
  	<span class='field'><input type=text name='nama_content' value='$r[nama_content]' class='input-xlarge'></span>
   </p> 
   
       <p> 
   <label>Code Script</label>
  	<span class='field'><input type=text name='code' value='$r[code]' class='input-xlarge'></span>
   </p> 
   
    <p> 
   <label>Posisi</label>
  	<span class='field'><input type=text name='posisi' value='$r[posisi]' class='input-xlarge'></span>
   </p> 
     	
		 <p>
 <label>Aktif</label>
 <span class='field'>
 <select name='aktif' class='uniformselect'>";
	if ($r['aktif']=='Y'){
	echo"<option value='Y' />Aktif";
	echo"<option value='N' />Non Aktif";
	}else{
 	echo"<option value='N' />Non Aktif";
	echo"<option value='Y' />Aktif";
	 }
 echo"</select>
 </span>
 </p>	  
 
   		  
   
    
									<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
   </form></div>";
   
   
   
    break;
	
   }
    
    ?>