<?php
if($_GET['act']=="input"){
	?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Ruangan</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Ruangan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_ruangan">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Ruangan</label>
                                            <input class="form-control" placeholder="Nama ruangan" name="nama_ruangan">
                                        </div>
                                        <div class="form-group">
                                            <label>Gedung</label>
                                            <select class="form-control" name="gedung">
                                            <?php 
                                                $sql=mysql_query("select * from gedung");
                                            	while($rs=mysql_fetch_array($sql)){

                                            	echo "<option value='$rs[id_gedung]'>$rs[nama_gedung]</option>";	
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Belajar</label>
                                            <input class="form-control" placeholder="Kapasitas Belajar" name="kapasitas_belajar">
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Ujian</label>
                                            <input class="form-control" placeholder="Kapasitas Ujian" name="kapasitas_ujian">
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