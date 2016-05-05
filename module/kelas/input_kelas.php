<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Kelas</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <?php
                if (isset($_GET['pesandata'])) {
                    $pesandata = $_GET['pesandata'];
                    $isidata = $_GET['isidata'];
                    if ($pesandata == 1) {
                        echo "<div class='alert alert-warning'>
                        <a class='close' data-dismiss='alert'>×</a>
                        $isidata
                        </div>";
                    }
                }
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_kelas">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input class="form-control" placeholder="Kelas" name="nama_kelas">
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                            <option value="KOSONG">....</option>
                                            <?php
                                            $sql = mysql_query("select * from jurusan");
                                            while ($rs=mysql_fetch_array($sql)) {
                                                echo "<option value='$rs[id_jurusan]'>$rs[nama_jurusan]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ruangan</label>
                                            <select class="form-control" name="ruangan">
                                            <option value="KOSONG">....</option>
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
                                            <option value="KOSONG">....</option>
                                            <?php
                                            $sqlc = mysql_query("select * from tingkat");
                                            while ($rsc=mysql_fetch_array($sqlc)) {
                                                echo "<option value='$rsc[id_tingkat]'>$rsc[nama_tingkat]</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit Button</button>
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
if($_GET['act']=="edit_kelas"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Kelas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php                            
                            	$sqld=mysql_query("select * from kelas where idk='$_GET[idk]'");
								$rsd=mysql_fetch_array($sqld);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_kelas">
<input type="hidden" name="idk" value="<?php echo $_GET['idk'] ?>" />

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="id">
  <?php 
	$sqle=mysql_query("select * from sekolah");
	while($rse=mysql_fetch_array($sqle)){
if($_SESSION['level']=="admin_guru"){
if($rse['id']==$_SESSION['id']){

if($rsd['id']==$rse['id']){

	echo "<option value='$rse[id]' selected='selected'>$rse[nama]</option>";	
}else{
	echo "<option value='$rse[id]'>$rse[nama]</option>";		
}

}
}else{
if($rsd['id']==$rse['id']){

	echo "<option value='$rse[id]' selected='selected'>$rse[nama]</option>";	
}else{
	echo "<option value='$rse[id]'>$rse[nama]</option>";		
}

}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input class="form-control" placeholder="Kelas" name="nama" value="<?php echo $rs['nama'] ?>">
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
             