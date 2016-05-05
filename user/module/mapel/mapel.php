<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Mapel</strong></h3>
               </div>
            </div>
            <a href="media.php?module=input_mapel&act=input">
            <button type="button" class="btn btn-primary" style="margin-bottom : 15px;">Data Baru</button></a>
            
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Mapel
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Mapel</th>
                                            <th class="text-center">Guru</th>
                                            <th class="text-center">Tingkat</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql=mysql_query("SELECT mata_pelajaran.*, guru.nama, tingkat.nama_tingkat, jurusan.nama_jurusan
                        FROM mata_pelajaran 
                        LEFT JOIN guru ON mata_pelajaran.idg = guru.idg 
                        LEFT JOIN tingkat ON mata_pelajaran.id_tingkat = tingkat.id_tingkat
                        LEFT JOIN jurusan ON mata_pelajaran.id_jurusan = jurusan.id_jurusan;");
	while($rs=mysql_fetch_array($sql)){
        
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_mapel]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tingkat]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_jurusan]";  ?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_mapel&act=edit_mapel&id_mapel=<?php echo $rs['id_mapel'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a> 
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_mapel&id_mapel=<?php echo $rs['id_mapel'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
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
            
