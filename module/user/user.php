            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=1;
	if($_SESSION['level']=="admin_guru"){
	$sql=mysql_query("select * from user where idu='$_SESSION[idu]'");
	}else{
	$sql=mysql_query("select * from user where idu<>'1'");
	
	}
	while($rs=mysql_fetch_array($sql)){
	

?>                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[level]";  ?></td>

                                        <td class="text-center"><a href="./././media.php?module=input_user&act=edit_user&idu=<?php echo $rs['idu'] ?>"><button type="button" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-edit"></i></button>
 <a href="././module/simpan.php?act=hapus_user&idu=<?php echo $rs['idu'] ?>"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></a></td>


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
