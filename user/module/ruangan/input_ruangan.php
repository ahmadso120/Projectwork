<?php
if($_GET['act']=="input"){
	?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Ruangan</strong></h3>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Ruangan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_ruangan">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Ruangan</label>
                                            <input class="form-control" placeholder="Nama ruangan" name="nama_ruangan"></input>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Belajar</label>
                                            <input class="form-control" placeholder="Kapasitas Belajar" name="kapasitas_belajar">
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Ujian</label>
                                            <input class="form-control" placeholder="Kapasitas Ujian" name="kapasitas_ujian">
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

<?php
if ($_GET['act']=="edit_ruangan") {
?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Ruangan</strong></h3>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Ruangan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php 
                            $sql = mysql_query("SELECT * FROM ruangan WHERE id_ruangan = '$_GET[id_ruangan]'");
                            $rs = mysql_fetch_array($sql);
                            ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_ruangan">
                                    <input type="hidden" name="id_ruangan" value="<?php echo $_GET['id_ruangan'];?>">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Ruangan</label>
                                            <input class="form-control" placeholder="Nama ruangan" name="nama_ruangan" value="<?php echo "$rs[nama_ruangan]";?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Belajar</label>
                                            <input class="form-control" placeholder="Kapasitas Belajar" name="kapasitas_belajar" value="<?php echo "$rs[kapasitas_belajar]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Ujian</label>
                                            <input class="form-control" placeholder="Kapasitas Ujian" name="kapasitas_ujian" value="<?php echo "$rs[kapasitas_ujian]";?>">
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
<?Php } ?>