<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-6">
					<h3 class="page-header"><strong>Input Data Mata Pelajaran</strong></h3>
                </div>
               
            </div>
    
                <?php
                if (isset($_GET['pesandata'])) {
                    $pesandata = $_GET['pesandata'];
                    $isidata = $_GET['isidata'];
                    if ($pesandata == 1) {
                        echo "<div class='alert alert-danger'>
                        <a class='close' data-dismiss='alert'>×</a>
                        $isidata
                        </div>";
                    }
                }
                ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_mapel">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama mapel</label>
                                            <input class="form-control" placeholder="mapel" name="nama_mapel" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Guru</label>
                                            <select class="form-control" name="guru">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("select * from guru");
                                            while ($rsd=mysql_fetch_array($sql)) {
                                                echo "<option value='$rsd[idg]'>$rsd[nama]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <option>....</option>
                                            <?php
                                            $sqlc = mysql_query("select * from tingkat");
                                            while ($rsc=mysql_fetch_array($sqlc)) {
                                                echo "<option value='$rsc[id_tingkat]'>$rsc[nama_tingkat]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>....</option>
                                            <?php
                                            $sqlb = mysql_query("select * from jurusan");
                                            while ($rsb=mysql_fetch_array($sqlb)) {
                                                echo "<option value='$rsb[id_jurusan]'>$rsb[nama_jurusan]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                       
                                    </form>

                            </div>
                      
                        </div>
                   
                    </div>
                   
                </div>
               
            </div>
           
           <?php } ?>
           
           
           
           <?php
if($_GET['act']=="edit_mapel"){
	?>
          <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Edit Data mapel</h1>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data mapel
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php                            
                            	$sqld=mysql_query("select * from mata_pelajaran where id_mapel='$_GET[id_mapel]'");
								$rsd=mysql_fetch_array($sqld);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_mapel">
<input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel'] ?>" />

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama mapel</label>
                                            <input class="form-control" placeholder="mapel" name="nama_mapel" value="<?php echo $rsd['nama_mapel'] ?>" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Guru</label>
                                            <select class="form-control" name="guru">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("select * from guru");
                                            while ($rsa=mysql_fetch_array($sql)) {
                                                if ($rsd['idg']==$rsa['idg']) {
                                                    echo "<option value='$rsa[idg]'selected>$rsa[nama]</option>";
                                                }else{
                                                    echo "<option value='$rsa[idg]'>$rsa[nama]</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <option>....</option>
                                            <?php
                                            $sqlc = mysql_query("select * from tingkat");
                                            while ($rsc=mysql_fetch_array($sqlc)) {
                                                if ($rsd['id_tingkat']==$rsc['id_tingkat']) {
                                                    echo "<option value='$rsc[id_tingkat]'selected>$rsc[nama_tingkat]</option>";
                                                }else{
                                                    echo "<option value='$rsc[id_tingkat]'>$rsc[nama_tingkat]</option>";
                                                }   
                                             }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>....</option>
                                            <?php
                                            $sqle = mysql_query("select * from jurusan");
                                            while ($rse=mysql_fetch_array($sqle)) {
                                                if ($rsd['id_jurusan']==$rse['id_jurusan']) {
                                                    echo "<option value='$rse[id_jurusan]'selected>$rse[nama_jurusan]</option>";
                                                }else{
                                                    echo "<option value='$rse[id_jurusan]'>$rse[nama_jurusan]</option>";
                                                }   
                                             }
                                            ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                             
                                    </form>

                            </div>
                            
                        </div>
                     
                    </div>
             
                </div>
         
            </div>
          
            <?php } ?>
             