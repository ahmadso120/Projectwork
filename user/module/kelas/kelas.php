<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Kelas</strong></h3>
               </div>
            </div>
            <a href="media.php?module=input_kelas&act=input">
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
                            Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Kelas</th>
                                            <th class="text-center">Wali Kelas</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Tahun Pelajaran</th>
                                            <th class="text-center">Ruangan</th>
                                            <th class="text-center">Tingkat</th>
                                            <th class="text-center">Anggota Kelas</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql=mysql_query("SELECT kelas.*, jurusan.nama_jurusan, ruangan.nama_ruangan, tingkat.nama_tingkat, guru.nama, tahun_pelajaran.nama_tahun
                        FROM kelas 
                        LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
                        LEFT JOIN ruangan ON kelas.id_ruangan = ruangan.id_ruangan
                        LEFT JOIN tingkat ON kelas.id_tingkat = tingkat.id_tingkat
                        LEFT JOIN guru ON kelas.idg = guru.idg
                        LEFT JOIN tahun_pelajaran ON kelas.id_tahun = tahun_pelajaran.id_tahun;");
	while($rs=mysql_fetch_array($sql)){
        
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_kelas]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_jurusan]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tahun]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_ruangan]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tingkat]";  ?></td>
                                            <td class="text-center"><?php echo"<a href=\"media.php?module=anggota_kelas&kls=$rs[id_kelas]\">Siswa</a>"?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_kelas&act=edit_kelas&id_kelas=<?php echo $rs['id_kelas'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a> 
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_kelas&id_kelas=<?php echo $rs['id_kelas'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
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
            
