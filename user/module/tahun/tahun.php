<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Tahun Pelajaran</strong></h3>
               </div>
            </div>
            <a href="media.php?module=input_tahun&act=input">
            <button type="button" class="btn btn-primary" style="margin-bottom : 15px;">Data Baru</button></a>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Tahun Pelajaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Tahun Pelajaran</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql = mysql_query("SELECT * FROM tahun_pelajaran");
while ($rs = mysql_fetch_array($sql)) {
?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_tahun]";  ?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_tahun&act=edit_tahun&id_tahun=<?php echo $rs['id_tahun'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a> 
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_tahun&id_tahun=<?php echo $rs['id_tahun'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
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
            
