            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Anggota kelas</strong></h3>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Anggota Kelas
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">JK</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Tingkat</th>
                                            <th class="text-center">Jurusan</th>
                                            <th class="text-center">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                        
<?php
$no=1;
$klas=$_GET['kls'];
if($klas=="")
{
	$sql=mysql_query("SELECT siswa.*, kelas.nama_kelas, tingkat.nama_tingkat, jurusan.nama_jurusan 
                        FROM siswa 
                        LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                        LEFT JOIN tingkat ON siswa.id_tingkat = tingkat.id_tingkat
                        LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan;");
}
else
{
	$sql=mysql_query("select * from siswa where id_kelas='$_GET[kls]'");	
}

	while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from kelas where id_kelas='$rs[id_kelas]'");
		$rsw=mysql_fetch_array($sqlw);
        $sqlb=mysql_query("select * from tingkat where id_tingkat='$rs[id_tingkat]'");
        $rsb=mysql_fetch_array($sqlb);
        $sqla=mysql_query("select * from jurusan where id_jurusan='$rs[id_jurusan]'");
        $rsa=mysql_fetch_array($sqla);

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
                                        <td class="text-center"><?php echo"$rs[alamat]";  ?></td>
                                        <td class="text-center"><?php echo "$rsw[nama_kelas]";?></td>
                                        <td class="text-center"><?php echo "$rsb[nama_tingkat]";?></td>
                                        <td class="text-center"><?php echo "$rsa[nama_jurusan]";?></td>
										<td class="text-center">
                                        <a href="./././media.php?module=detail_siswa&ids=<?php echo $rs['ids'] ?>">
                                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-list"></i>
                                        </button></a>
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
        
