<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Nilai Siswa</strong></h3>
               </div>
            </div>
            <a href="media.php?module=input_nilai&act=input">
            <button type="button" class="btn btn-primary" style="margin-bottom : 15px;">Data Baru</button></a>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Nilai Siswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mapel</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Siswa</th>
                                            <th class="text-center">Jenis Nilai</th>
                                            <th class="text-center">Tahun Pelajaran</th>
                                            <th class="text-center">Nilai</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql=mysql_query("SELECT * FROM nilai, siswa, mata_pelajaran, kelas, jenis_nilai, tahun_pelajaran WHERE nilai.ids=siswa.ids and nilai.id_kelas = kelas.id_kelas and nilai.id_mapel = mata_pelajaran.id_mapel and nilai.id_jenis = jenis_nilai.id_jenis and nilai.id_tahun = tahun_pelajaran.id_tahun and nilai.idg = '$guru' ORDER BY siswa.ids ASC");
	while($rs=mysql_fetch_array($sql)){
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_mapel]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_kelas]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[jenis_nilai]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tahun]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nilai]";  ?></td>

                                        <td class="text-center">
                                        <?php
                                        if($_SESSION['username']){
                                        ?>
                                        <a href="./././media.php?module=input_nilai&act=edit_nilai&id_nilai=<?php echo $rs['id_nilai'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        <?Php}else{ echo "date"}?>
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_nilai&id_nilai=<?php echo $rs['id_nilai'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
                                        
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