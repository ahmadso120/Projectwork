<?php
if($_GET['act']=="input"){
	?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Jurusan</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Jurusan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_gedung">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Gedung</label>
                                            <input class="form-control" placeholder="Nama Gedung" name="nama_gedung">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Lantai</label>
                                            <input class="form-control" placeholder="Jumlah Lantai" name="jumlah_lantai">
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