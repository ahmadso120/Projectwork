<script>
function konfirmasi(hapus) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = hapus;
   }
}
</script>
            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Guru</strong></h3>
                </div>
            </div>
            <a href="media.php?module=input_guru&act=input">
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
                            Data Guru
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">JK</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                        
<?php
	$sql=mysql_query("SELECT * FROM guru;");
	while($rs=mysql_fetch_array($sql)){
        if($rs['foto'] =="") {
            $namafoto   = "images.jpg";
        }
        else {
            $namafoto   = $rs['foto'];
        }
?>                                      
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nip]";  ?></td>
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
                                        <td class="text-center">
                                        <a href="module/foto/<?php echo "$namafoto"; ?>">
                                        <img style="width:150px; " src="module/foto/<?php echo "$namafoto";?>">
                                        </td>

                                        <td class="text-center">
										<a href="./././media.php?module=detail_guru&idg=<?php echo $rs['idg'] ?>">
										 <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-list"></i></button></a>

										<a href="./././media.php?module=input_guru&act=edit_guru&idg=<?php echo $rs['idg'] ?>">
										<button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button></a>
                                        
										<a href=javascript:konfirmasi('././module/simpan.php?act=hapus_guru&idg=<?php echo $rs['idg'] ?>')>
										<button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a></td>

                                        </tr>
<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>
           
