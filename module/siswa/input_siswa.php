<?php
if($_GET['act']=="input"){
	?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_siswa">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" placeholder="Nis" name="nis">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
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

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas">
                                            <option>...</option>
  <?php 
	$sql=mysql_query("select * from kelas order by nama_kelas ASC");
	while($rs=mysql_fetch_array($sql)){

	echo "<option value='$rs[id_kelas]'>$rs[nama_kelas]</option>";	
}
?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp">
                                        </div>

                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempal_lahir" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" id="tgl">
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <option>...</option>
  <?php 
    $sqla=mysql_query("select * from tingkat");
    while($rsa=mysql_fetch_array($sqla)){

    echo "<option value='$rsa[id_tingkat]'>$rsa[nama_tingkat]</option>";    
}
?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option>...</option>
  <?php 
    $sqlb=mysql_query("select * from jurusan");
    while($rsb=mysql_fetch_array($sqlb)){

    echo "<option value='$rsb[id_jurusan]'>$rsb[nama_jurusan]</option>";    
}
?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="k_password" type="password">
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
           <?php } ?>
           
           
           
           <?php
if($_GET['act']=="edit"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Edit Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php                            
                            	$sql=mysql_query("select * from siswa where ids='$_GET[ids]'");
								$rs=mysql_fetch_array($sql);
                                ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_siswa">
                                <input type="hidden" name="id" value="<?php echo $_GET['ids'] ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" placeholder="Nis" name="nis" value="<?php echo "$rs[nis]"; ?>" >
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
                                            <select class="form-control" name="kelas" id="select">
 <?php 
    $sqla=mysql_query("select * from kelas");
    while($rsa=mysql_fetch_array($sqla)){

if($rs['id_kelas']==$rsa['id_kelas']){
    echo "<option value='$rsa[id_kelas]' selected>$rsa[nama_kelas]</option>";   
}
else{
    echo "<option value='$rsa[id_kelas]'>$rsa[nama_kelas]</option>";
}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp" value="<?php echo "$rs[no_telp]"; ?>">
                                        </div>
</div>

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempat_lahir" value="<?php echo "$rs[tempat_lahir]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>tanggal lahir</label>
                                            <input class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" value="<?php echo "$rs[tanggal_lahir]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <?php
                                            $sqlb = mysql_query("select * from tingkat");
                                            while ($rsb=mysql_fetch_array($sqlb)) {
                                                if ($rs['id_tingkat']==$rsb['id_tingkat']) {
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
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="k_password" value="" type="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit Button</button>
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
            <?php } ?>