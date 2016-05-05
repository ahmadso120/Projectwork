<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>            
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Jenis Nilai</strong></h3>
               </div>
            </div>
            <a href="media.php?module=input_jenis&act=input">
            <button type="button" class="btn btn-primary" style="margin-bottom : 15px;">Data Baru</button></a>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Jenis Nilai
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Jenis Nilai</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$sql=mysql_query("SELECT * FROM jenis_nilai");
	while($rs=mysql_fetch_array($sql)){
        
?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[jenis_nilai]";  ?></td>

                                        <td class="text-center">
                                        <a href="./././media.php?module=input_jenis&act=edit_jenis&id_jenis=<?php echo $rs['id_jenis'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a> 
                                        <a href=javascript:konfirmasi('././module/simpan.php?act=hapus_jenis&id_jenis=<?php echo $rs['id_jenis'] ?>')><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a>
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
            
