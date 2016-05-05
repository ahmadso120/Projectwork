<?php
if($_GET['act']=="input"){
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Nilai</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Nilai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_nilai">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Guru</label>
                                            <select name="guru" class="form-control">
                                            <option value="">--pilih guru--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM guru");
                                            while ($rs = mysql_fetch_array($sql)) {
                                                if ($rs['idg']==$_SESSION['idg']) {
                                                    echo "<option value='$rs[idg]'>$rs[nama]</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pelajaran</label>
                                            <select name="mapel" class="form-control">
                                            <option value="">--pilih mapel--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM mata_pelajaran");
                                            while ($rs=mysql_fetch_array($sql)) {

                                                $sqlb = mysql_query("SELECT * FROM guru WHERE idg='$rs[idg]'");
                                                $rsb = mysql_fetch_array($sqlb);

                                                $sqlc = mysql_query("SELECT * FROM tingkat WHERE id_tingkat='$rs[id_tingkat]'");
                                                $rsc = mysql_fetch_array($sqlc);

                                                if ($rs['idg']==$_SESSION['idg']) {
                                                echo "<option value='$rs[id_mapel]' >$rs[nama_mapel] | $rsb[nama] | $rsc[nama_tingkat]</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <option value="">--pilih kelas--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM kelas");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                $sqle = mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$rs[id_jurusan]'");
                                                $rse = mysql_fetch_array($sqle);
                                                    echo "<option value='$rs[id_kelas]'>$rs[nama_kelas] | $rse[nama_jurusan]</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Siswa</label>
                                        <select name="siswa" class="form-control">
                                            <option value="">--pilih siswa--</option>
                                            <?php
                                            $sqlf = mysql_query("SELECT * FROM siswa");
                                            while ($rsf=mysql_fetch_array($sqlf)) {
                                                $sql = mysql_query("SELECT * FROM kelas WHERE id_kelas='$rsf[id_kelas]'");
                                                $rs = mysql_fetch_array($sql);
                                                echo "<option value='$rsf[ids]'>$rsf[nama] | $rsf[nis] | $rs[nama_kelas]</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Jenis Nilai</label>
                                        <select name="jenis" class="form-control">
                                            <option value="">--pilih jenis nilai--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM jenis_nilai");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                    echo "<option value='$rs[id_jenis]'>$rs[jenis_nilai]</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Tahun Pelajaran</label>
                                        <select name="tahun" class="form-control">
                                            <option value="">--pilih Tahun Pelajaran--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM tahun_pelajaran");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                    echo "<option value='$rs[id_tahun]'>$rs[nama_tahun]</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="text" name="nilai" class="form-control">
                                        </div>
                                </div>
                                
                                <div class="col-lg-4">
                                        <button name="simpan" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                              
                                    </form>
                                
                            </div>
                          
                        </div>
                      
                    </div>
                  
                </div>
             
            </div>
<?php }?>

<?php
if ($_GET['act']=="edit_nilai") {  
?>

        <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Nilai</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Nilai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $sqla = mysql_query("SELECT * FROM nilai WHERE id_nilai='$_GET[id_nilai]'");
                            $rsa = mysql_fetch_array($sqla);
                            ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_nilai">
                                    <input type="hidden" name="id_nilai" value="<?php echo $_GET['id_nilai'];?>">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Pelajaran</label>
                                            <select name="mapel" class="form-control">
                                            <option value="">--pilih mapel--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM mata_pelajaran");
                                            while ($rs=mysql_fetch_array($sql)) {

                                                $sqlb = mysql_query("SELECT * FROM guru WHERE idg='$rs[idg]'");
                                                $rsb = mysql_fetch_array($sqlb);

                                                $sqlc = mysql_query("SELECT * FROM tingkat WHERE id_tingkat='$rs[id_tingkat]'");
                                                $rsc = mysql_fetch_array($sqlc);

                                                if ($rsa['id_mapel']==$rs['id_mapel']) {
                                                    echo "<option value='$rs[id_mapel]' selected>$rs[nama_mapel] | $rsb[nama] | $rsc[nama_tingkat]</option>";
                                                }else{
                                                    echo "<option value='$rs[id_mapel]'>$rs[nama_mapel] | $rsb[nama] | $rsc[nama_tingkat]</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <option value="">--pilih kelas--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM kelas");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                $sqle = mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$rs[id_jurusan]'");
                                                $rse = mysql_fetch_array($sqle);

                                                if ($rsa['id_kelas']==$rs['id_kelas']) {
                                                    echo "<option value='$rs[id_kelas]' selected>$rs[nama_kelas] | $rse[nama_jurusan]</option>";
                                                }else{
                                                    echo "<option value='$rs[id_kelas]'>$rs[nama_kelas] | $rse[nama_jurusan]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Siswa</label>
                                        <select name="siswa" class="form-control">
                                            <option value="">--pilih siswa--</option>
                                            <?php
                                            $sqlf = mysql_query("SELECT * FROM siswa");
                                            while ($rsf=mysql_fetch_array($sqlf)) {
                                                $sql = mysql_query("SELECT * FROM kelas WHERE id_kelas='$rsf[id_kelas]'");
                                                $rs = mysql_fetch_array($sql);
                                                if ($rsa['ids']==$rsf['ids']) {
                                                    echo "<option value='$rsf[ids]' selected>$rsf[nama] | $rsf[nis] | $rs[nama_kelas]</option>";
                                                }else{
                                                    echo "<option value='$rsf[ids]'>$rsf[nama] | $rsf[nis] | $rs[nama_kelas]</option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Jenis Nilai</label>
                                        <select name="jenis" class="form-control">
                                            <option value="">--pilih jenis nilai--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM jenis_nilai");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                if ($rsa['id_jenis']==$rs['id_jenis']) {
                                                    echo "<option value='$rs[id_jenis]' selected>$rs[jenis_nilai]</option>";   
                                                }else{
                                                    echo "<option value='$rs[id_jenis]'>$rs[jenis_nilai]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Tahun Pelajaran</label>
                                        <select name="tahun" class="form-control">
                                            <option value="">--pilih tahun pelajaran--</option>
                                            <?php
                                            $sql = mysql_query("SELECT * FROM tahun_pelajaran");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                if ($rsa['id_tahun']==$rs['id_tahun']) {
                                                    echo "<option value='$rs[id_tahun]' selected>$rs[nama_tahun]</option>";   
                                                }else{
                                                    echo "<option value='$rs[id_tahun]'>$rs[nama_tahun]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="text" name="nilai" class="form-control" value="<?php echo "$rsa[nilai]";?>">
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