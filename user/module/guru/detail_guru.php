<?php                            
 	$sql=mysql_query("select * from guru where idg='$_GET[idg]'");
	$rs=mysql_fetch_array($sql);
?>

          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Guru : <?php echo "$rs[nama]"; ?></strong></h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Guru
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-6">
								<fieldset disabled>
                                        <div class="form-group">
                                            <label>NIP</label><br>
                                            <input class="form-control" value="<?php echo "$rs[nip]"; ?>">

                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" value="<?php echo "$rs[nama]"; ?>">
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
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" value="<?php echo "$rs[tempat_lahir]"; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" value="<?php echo "$rs[tanggal_lahir]";?>">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" value="<?php echo "$rs[no_telp]"; ?>">
                                        </div>
</div>
</fieldset>
                                <div class="col-lg-6">

                                        <fieldset disabled>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <input class="form-control" value="<?php echo "$rs[agama]";?>">
                                        </div>
										<div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3"><?php echo "$rs[alamat]"; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gelar</label>
                                            <input class="form-control" value="<?php echo "$rs[gelar]";?>">
                                        </div>
                                        </fieldset>
                                </div>

                            </div>
                        
                        </div>
                      
                    </div>
              
                </div>
       
            </div>
           
