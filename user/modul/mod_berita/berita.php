<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
<?php

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET['act']){
  default:
  echo " 
        <h3 class='page-header'><strong>Berita</strong></h3>
                
				<p><a href='?module=berita&act=tambahberita' class='btn btn-primary'>Tambah Berita</a></p>
				
            	<table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Judul Berita</th>
                        <th class='text-center'>Kategori</th>
                        <th class='text-center'>Tanggal Posting</th>
                        <th class='text-center'>Dibaca</th>
                        <th class='text-center'>User</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
					
    $tampil = mysql_query("SELECT * FROM berita,kategori 
                           WHERE berita.id_kategori=kategori.id_kategori ORDER BY berita.id_berita DESC");
						   
   							 while($r=mysql_fetch_array($tampil)){
                               
	 					
                    echo"<tr class='odd gradeX'>
                                            <td class='text-center'>$r[judul]</td>
                                            <td class='text-center'>$r[nama_kategori]</td>
                                            <td class='text-center'>$r[tanggal]</td>
                                            <td class='text-center'>$r[klik]</td>
                                            <td class='text-center'>$r[username]</td>
							<td class='text-center'>
              <a href='?module=berita&act=editberita&id=$r[id_berita]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>  				  
							<a href=javascript:confirmdelete('$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
							</td>
              </tr>";
					}
                echo"</tbody></table>";					   
  
    break;  
	case "tambahberita":
	echo"
        
        <h3 class='page-header'><strong>Tambah Berita</strong></h3>
        
				<form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
                <p>
                <label>Judul Berita</label>
                <input type='text' name='judul'><br />
                </p>

                <p>
                <label>Kategori</label>
								<select name='kategori'>
   								</p>";

   								$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
   								while($r=mysql_fetch_array($tampil)){
		   						echo "<option value=$r[id_kategori]>$r[nama_kategori]</option></p>"; 
   								}
								echo "</select></p>";

																
   if ($r['headline']=='Y'){
   echo "
   <p> 
   <label>Headline</label>
   <input type=radio name='headline' value='Y' checked>Ya  
   <input type=radio name='headline' value='N'>Tidak
   </p>";}
   
   else{
   echo "
   <p> 
   <label>Headline</label>
   <input type=radio name='headline' value='Y'>Ya  
   <input type=radio name='headline' value='N' checked>Tidak
   </p>";}						  
										 
echo "        <p>
              <label>Isi Berita</label>
							<textarea name='isi_berita' id='summernote'></textarea>
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
    case "editberita":
 $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
   echo"
        
        <h3 class='page-header'><strong>Edit Berita</strong></h3>
        
                <form method=POST action='$aksi?module=berita&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id value=$r[id_berita]>
                <p>
                <label>Judul Berita</label>
                <span class='field'><input type='text' name='judul' value='$r[judul]'/></span>
                </p>
                
                            
                            <p>
                                <label>Kategori</label>
                                <select name='kategori'>";
   $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
   if ($r[id_kategori]==0){
   echo "<option value=0 selected>- Pilih Kategori -</option>"; }   

   while($w=mysql_fetch_array($tampil)){
   if ($r[id_kategori]==$w[id_kategori]){
   echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";}
   else{
   echo "<option value=$w[id_kategori]>$w[nama_kategori]</option> </p> ";}}

   echo "</select>";
   echo"</p>";
   if ($r['headline']=='Y'){
   echo "
   <p> 
   <label>Headline</label>
   <input type=radio name='headline' value='Y' checked>Ya  
   <input type=radio name='headline' value='N'>Tidak
   </p>";}
   
   else{
   echo "
   <p> 
   <label>Headline</label>
   <input type=radio name='headline' value='Y'>Ya  
   <input type=radio name='headline' value='N' checked>Tidak
   </p>";}
                                                          
   echo "
                                                       
                            <p>
                                <label>Isi Berita</label>
                                 <textarea  name='isi_berita' id='summernote'>$r[isi_berita]</textarea>
                            </p>
                            
                            <p>
                                <label>Gambar</label>";
                             if ($r['gambar']!=''){
                             echo "<img src='../foto_berita/small_$r[gambar]'>";}     
                                echo"
                            </p>
                            <p>
                                <label>Ganti Gambar</label>
                                <input type=file name='fupload' size=40>
                            </p>
                            
                            <p>
                                <button class='btn btn-primary'>Update</button>
                                <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                            </p>
                    </form>";                    
    break;
}
?>