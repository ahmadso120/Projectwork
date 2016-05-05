  <?php
   $aksi="modul/mod_identitas/aksi_identitas.php";
  switch($_GET['act']){
  default:
    $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
    $r    = mysql_fetch_array($sql);

  
   echo " <h3 class='page-header'><strong>Setting Identitas</strong></h3>
				
        <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
					 <input type=hidden name=id value=$r[id_identitas]>
                                    <p>
                                    <label>Nama Website</label>
									<input type=text name='nama_website' value='$r[nama_website]'>
									</p>
							         <p>     
                                    <label>Pembuka</label>
									<input type=text name='pembuka' value='$r[pembuka]'>
									</p>
                                    ";
									if ($r['gambar']!=''){
    				echo "          <p>
                                    <label>Logo</label>
                               		<img src=../images/$r[gambar] width=270>
                                    </p>"; 
						}
						echo"        <p>
                                    <label>Ganti Logo</label>
									<input type='file' name='fupload'>
                                    </p>
                                                    
                            <p>
                                    <button class='btn btn-primary'>Update</button>
                            </p>
                    </form>";

  }
    ?>
