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
                                    <form method="post" role="form" action="././module/simpan.php?act=input_jurusan">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama jurusan</label>
                                            <input class="form-control" placeholder="Nama jurusan" name="nama_jurusan">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pelajaran</label>
                                            <select class="form-control" name="tahun_pelajaran">
  <?php 
	$sql=mysql_query("select * from tahun_pelajaran");
	while($rs=mysql_fetch_array($sql)){

	echo "<option value='$rs[id_tahun]'>$rs[nama_tahun]</option>";	
}
?>
                                            </select>
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