<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Siswa</strong></h3>
                </div>
            </div>
            <a href="media.php?module=input_siswa&act=input">
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
                            Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">JK</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                        
<?php

	$sql=mysql_query("SELECT siswa.*, kelas.nama_kelas 
                        FROM siswa 
                        LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas;");

	while($rs=mysql_fetch_array($sql))
	{
        if($rs['foto'] =="") {
            $namafoto   = "images.jpg";
        }
        else {
            $namafoto   = $rs['foto'];
        }

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
                                        <a href="module/foto/<?php echo "$namafoto"; ?>">
                                        <img style="width:150px; " src="module/foto/<?php echo "$namafoto";?>">
                                        </td>

										<td class="text-center">
										<a href="././module/cetak/siswa_cetak.php?ids=<?php echo $rs['ids'] ?>" target="_blank">
                                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-print"></i>
                                        </button></a>

										<a href="./././media.php?module=detail_siswa&ids=<?php echo $rs['ids'] ?>">
									    <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-list"></i>
                                        </button></a>
										
										<a href="./././media.php?module=input_siswa&act=edit&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-edit"></i>
                                        </button></a>
										
										<a href=javascript:konfirmasi('././module/simpan.php?act=hapus&ids=<?php echo $rs['ids'] ?>')>
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
                            
                        </div>
                        
                    </div>
                   
                </div>
                
            </div>
      
