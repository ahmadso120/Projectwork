<?php
if($_GET['act']=="input"){
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Jurusan</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Jurusan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_jurusan">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama jurusan</label>
                                            <input class="form-control" placeholder="Nama jurusan" name="nama_jurusan">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun_pelajaran">
                                            <option>...</option>
  <?php 
	$sql=mysql_query("select * from tahun_pelajaran");
	while($rs=mysql_fetch_array($sql)){

	echo "<option value='$rs[id_tahun]'>$rs[nama_tahun]</option>";	
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
if ($_GET['act']=="edit_jurusan") {  
?>

        <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Jurusan</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Jurusan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $sqla = mysql_query("SELECT * FROM jurusan WHERE id_jurusan='$_GET[id_jurusan]'");
                            $rsa = mysql_fetch_array($sqla);
                            ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_jurusan">
                                    <input type="hidden" name="id_jurusan" value="<?php echo $_GET['id_jurusan'];?>">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama jurusan</label>
                                            <input class="form-control" placeholder="Nama jurusan" name="nama_jurusan" value="<?php echo "$rsa[nama_jurusan]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun_pelajaran">
  <?php 
    $sqlb=mysql_query("SELECT * FROM tahun_pelajaran");
    while($rsb=mysql_fetch_array($sqlb)){

if($rsa['id_tahun']==$rsb['id_tahun']){
    echo "<option value='$rsb[id_tahun]' selected>$rsb[nama_tahun]</option>";   
}
else {
    echo "<option value='$rsb[id_tahun]'>$rsb[nama_tahun]</option>";
}
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