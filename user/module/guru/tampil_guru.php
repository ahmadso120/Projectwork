          <div class="row">
                <div class="col-lg-12">
                     <h3 class="page-header"><strong>Data Guru Per-Kelas</strong></h3>
                </div>
            </div>
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Pilih Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="get" role="form" action="././media.php?module=guru">
                                <div class="col-lg-6">
<input type="hidden" name="module" value="guru">

                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kls">

  <?php 
	$sql=mysql_query("select * from kelas");	
?>
                                                <option>semua</option>

<?php
    while($rs=mysql_fetch_array($sql)){
	echo "<option value='$rs[id_kelas]'>$rs[nama_kelas]</option>";	
}
?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>

                                </div>
                               
                                    </form>

                            </div>
                           
                        </div>
                   
                    </div>
                 
                </div>
                
            </div>
            