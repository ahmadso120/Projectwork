<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Ruangan</strong></h3>
                </div>
            </div>
            <a href="media.php?module=input_ruangan&act=input">
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
                            Data Ruangan
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Ruangan</th>
                                            <th class="text-center">Kapasitas Belajar</th>
                                            <th class="text-center">Kapasitas Ujian</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql = mysql_query("SELECT * FROM ruangan;");
    while ($rs=mysql_fetch_array($sql)){                  
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo "$rs[nama_ruangan]";?></td>
                                            <td class="text-center"><?php echo "$rs[kapasitas_belajar]";?></td>
                                            <td class="text-center"><?php echo "$rs[kapasitas_ujian]";?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_ruangan&act=edit_ruangan&id_ruangan=<?php echo $rs['id_ruangan'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_ruangan&id_ruangan=<?php echo $rs['id_ruangan'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
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
           
