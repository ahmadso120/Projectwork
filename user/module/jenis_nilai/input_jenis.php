<?php
if($_GET['act']=="input"){
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Jenis Nilai</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Jenis Nilai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_jenis">

                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jenis Nilai</label>
                                            <input class="form-control" name="jenis">
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
if ($_GET['act']=="edit_jenis") {  
?>

        <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Jenis Nilai</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Jenis Nilai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $sqla = mysql_query("SELECT * FROM jenis_nilai WHERE id_jenis='$_GET[id_jenis]'");
                            $rsa = mysql_fetch_array($sqla);
                            ?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_jenis">
                                    <input type="hidden" name="id_jenis" value="<?php echo $_GET['id_jenis'];?>">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Jenis Nilai</label>
                                            <input class="form-control" name="jenis" value="<?php echo "$rsa[jenis_nilai]";?>">
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