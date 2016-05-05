          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php                            
                            	$sql=mysql_query("select * from siswa where nis='$_SESSION[idu]'");
								$rs=mysql_fetch_array($sql);
                                ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=siswa_det">
<input type="hidden" name="id" value="<?php echo $rs['ids'] ?>" />

                                <div class="col-lg-6">
                                        <fieldset disabled>

                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control"  placeholder="Nis" name="nis" value="<?php echo "$rs[nis]"; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama" value="<?php echo "$rs[nama]"; ?>">
                                        </div>
                                        <div class="form-group">
         
                                           <label>Jenis Kelamin</label>
                                    <?php if($rs['jk']=="L"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L" 
                                                    checked>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if($rs['jk']=="P"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L" 
                                                    >Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P" checked>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                <?php } ?>


                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo "$rs[alamat]"; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas">
  <?php 
 	$sqla=mysql_query("select * from kelas");
	while($rsa=mysql_fetch_array($sqla)){

if($rs['id_kelas']==$rsa['id_kelas']){
	echo "<option value='$rsa[id_kelas]' selected>$rsa[nama_kelas]</option>";	
}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp" value="<?php echo "$rs[no_telp]"; ?>">
                                        </div>
</fieldset>
</div>

                                <div class="col-lg-6">
                              <fieldset disabled>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempal_lahir" type="text" value="<?php echo "$rs[tempat_lahir]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" placeholder="Tanggal pendirian" name="tanggal_lahir" value="<?php echo "$rs[tanggal_lahir]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <option>...</option>
<?php 
    $sqlb=mysql_query("select * from tingkat");
    while($rsb=mysql_fetch_array($sqlb)){

if($rs['id_tingkat']==$rsb['id_tingkat']){
    echo "<option value='$rsb[id_tingkat]' selected>$rsb[nama_tingkat]</option>";   
}
}
?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>...</option>
  <?php 
    $sqlc=mysql_query("select * from jurusan");
    while($rsc=mysql_fetch_array($sqlc)){

if($rs['id_jurusan']==$rsc['id_jurusan']){
    echo "<option value='$rsc[id_jurusan]' selected>$rsc[nama_jurusan]</option>";   
}
}
?>
                                            </select>
                                        </div>
</fieldset>                                        
                                        <div class="form-group">
                                            <label>Ganti Password</label>
                                            <input class="form-control" type="password" placeholder="Password baru" name="pass">
                                        </div>


                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                    </form>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
