            <?php 
            $sql = mysql_query("SELECT * FROM user WHERE idu = '$_GET[idu]'");
            $rs = mysql_fetch_array($sql);
            ?>
            
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Password</strong></h3>
                </div>
              
            </div>
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=ubahpassadmin">
                                <input type="hidden" name="idu" value="<?php echo $_GET['idu'];?>">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ganti Password</label>
                                            <input type="password" class="form-control" name="a_password">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            

                                    </form>
                                
                            </div>
                        

                        </div>
                    

                    </div>

                </div>
               
            </div>
          