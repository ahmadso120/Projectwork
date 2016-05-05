            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Kelas</strong></h3>
                </div>
            
            </div>
          
                <?php
                if (isset($_GET['pesan'])) {
                    $pesan = $_GET['pesan'];
                    $isi = $_GET['isi'];
                    if ($pesan == 1) {
                        echo "<div class='alert alert-success'>
                        <a class='close' data-dismiss='alert'>×</a>
                        <b>Sukses!</b> $isi
                        </div>";
                    }
                }
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Kelas
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Kelas</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Ruangan</th>
                                            <th class="text-center">Tingkat</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql=mysql_query("SELECT kelas.*, jurusan.nama_jurusan, ruangan.nama_ruangan, tingkat.nama_tingkat 
                        FROM kelas 
                        LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
                        LEFT JOIN ruangan ON kelas.id_ruangan = ruangan.id_ruangan
                        LEFT JOIN tingkat ON kelas.id_tingkat = tingkat.id_tingkat;");
	while($rs=mysql_fetch_array($sql)){
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_kelas]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_jurusan]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_ruangan]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tingkat]";  ?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_kelas&act=edit_kelas&id_kelas=<?php echo $rs['id_kelas'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button> 
                                        <a href="././module/simpan.php?act=hapus_kelas&id_kelas=<?php echo $rs['id_kelas'] ?>"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                        </td>

                                        </tr>

<?php
}
?>
                                    </tbody>
                                </table>
                            </div>
                      
                        </div>
               
                    </div>
   
                </div>

            </div>
           
