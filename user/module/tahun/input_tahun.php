<?php
if($_GET['act']=="input"){
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Tahun Pelajaran</strong></h3>
                </di>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Tahun Pelajaran
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_tahun">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama tahun Pelajaran</label>
                                            <input class="form-control" placeholder="Nama tahun" name="nama_tahun">
                                        </div>
                                        <p>Contoh : <b>2020/2021</b></p>
                                        
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
if ($_GET['act']=="edit_tahun") {  
?>

        <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Tahun Pelajaran</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Tahun Pelajaran
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $sqla = mysql_query("SELECT * FROM tahun_pelajaran WHERE id_tahun='$_GET[id_tahun]'");
                            $rsa = mysql_fetch_array($sqla);
                            ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_tahun">
                                    <input type="hidden" name="id_tahun" value="<?php echo $_GET['id_tahun'];?>">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Tahun Pelajaran</label>
                                            <input class="form-control" placeholder="Nama tahun" name="nama_tahun" value="<?php echo "$rsa[nama_tahun]";?>">
                                        </div>
                                        <p>Contoh : <b>2020/2021</b></p>
                                        
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