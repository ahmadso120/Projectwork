            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Siswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-resvonsive table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">JK</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                        
<?php
$no=1;
$klas=$_GET['kls'];
if($klas=="semua")
{
	$sql=mysql_query("SELECT siswa.*, kelas.nama_kelas FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas;");
}
else
{
	$sql=mysql_query("select * from siswa where id_kelas='$_GET[kls]'");	
}

	while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from kelas where id_kelas='$rs[id_kelas]'");
		$rsw=mysql_fetch_array($sqlw);

?>	
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nis]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
<?php
if($rs['jk']=="L"){
?>
                                            <td class="text-center">Laki - Laki</td>
<?php
}else{
?>
                                            <td class="text-center">Perempuan</td>
<?php
}
?>
                                        <td class="text-center"><?php echo "$rs[nama_kelas]";?></td>
                                        <td class="text-center"><?php echo"$rs[alamat]";  ?></td>
                                       
										<td class="text-center">
										
										<a href="./././media.php?module=detail_siswa&ids=<?php echo $rs['ids'] ?>">
									    <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-list"></i>
                                        </button></a>
										
										<a href="./././media.php?module=input_siswa&act=edit&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-edit"></i>
                                        </button></a>
										
										
										<a href="././module/simpan.php?act=hapus&ids=<?php echo $rs['ids'] ?>">
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                        </button></a>
									
										</td>
                                        </tr>
<?php
}
?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
