<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-6">
					<h3 class="page-header"><strong>Input Data Kelas</strong></h3>
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
                                    <form method="post" role="form" action="././module/simpan.php?act=input_kelas">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input class="form-control" placeholder="Kelas" name="nama_kelas" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Wali Kelas</label>
                                            <select class="form-control" name="wali_kelas">
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
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("select * from jurusan");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                echo "<option value='$rs[id_jurusan]'>$rs[nama_jurusan]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM tahun_pelajaran");
                                            while ($rsa=mysql_fetch_array($sql)) {
                                                echo "<option value='$rsa[id_tahun]'>$rsa[nama_tahun]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select class="form-control" name="ruangan">
                                            <option>....</option>
                                            <?php
                                            $sqlb = mysql_query("select * from ruangan order by nama_ruangan ASC");
                                            while ($rsb=mysql_fetch_array($sqlb)) {
                                                echo "<option value='$rsb[id_ruangan]'>$rsb[nama_ruangan]</option>";
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
if($_GET['act']=="edit_kelas"){
	?>
          <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Edit Data Kelas</h1>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php                            
                            	$sqld=mysql_query("select * from kelas where id_kelas='$_GET[id_kelas]'");
								$rsd=mysql_fetch_array($sqld);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_kelas">
<input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas'] ?>" />

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input class="form-control" placeholder="Kelas" name="nama" value="<?php echo $rsd['nama_kelas'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Wali Kelas</label>
                                            <select class="form-control" name="wali_kelas">
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
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("select * from jurusan");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                if ($rsd['id_jurusan']==$rs['id_jurusan']) {
                                                    echo "<option value='$rs[id_jurusan]'selected>$rs[nama_jurusan]</option>";
                                                }else{
                                                    echo "<option value='$rs[id_jurusan]'>$rs[nama_jurusan]</option>";
                                                }   
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun">
                                            <option>....</option>
                                            <?php
                                            $sql = mysql_query("select * from tahun_pelajaran");
                                            while ($rsa=mysql_fetch_array($sql)) {
                                                if ($rsd['id_tahun']==$rsa['id_tahun']) {
                                                    echo "<option value='$rsa[id_tahun]'selected>$rsa[nama_tahun]</option>";
                                                }else{
                                                    echo "<option value='$rsa[id_tahun]'>$rsa[nama_tahun]</option>";
                                                }   
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select class="form-control" name="ruangan">
                                            <option>....</option>
                                            <?php
                                            $sqlb = mysql_query("select * from ruangan order by nama_ruangan ASC");
                                            while ($rsb=mysql_fetch_array($sqlb)) {
                                                if ($rsd['id_ruangan']==$rsb['id_ruangan']) {
                                                    echo "<option value='$rsb[id_ruangan]'selected>$rsb[nama_ruangan]</option>";
                                                }else{
                                                    echo "<option value='$rsb[id_ruangan]'>$rsb[nama_ruangan]</option>";
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
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                             
                                    </form>

                            </div>
                            
                        </div>
                     
                    </div>
             
                </div>
         
            </div>
          
            <?php } ?>
             