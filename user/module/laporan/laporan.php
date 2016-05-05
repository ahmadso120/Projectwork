            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Laporan Nilai</strong></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Laporan Nilai
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mata Pelajaran</th>
                                            <th class="text-center">Guru</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Jenis Nilai</th>
                                            <th class="text-center">Tahun Pelajaran</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                        
<?php

	$sql=mysql_query("SELECT * FROM nilai, guru, mata_pelajaran, kelas, jenis_nilai, tahun_pelajaran WHERE nilai.idg=guru.idg and nilai.id_kelas = kelas.id_kelas and nilai.id_mapel = mata_pelajaran.id_mapel and nilai.id_jenis = jenis_nilai.id_jenis and nilai.id_tahun = tahun_pelajaran.id_tahun and nilai.ids = '$siswa'");

	while($rs=mysql_fetch_array($sql))
	{
?>	

                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo"$rs[nama_mapel]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>
                                            <td class="text-center"><?php echo "$rs[nama_kelas]";?></td>
                                            <td class="text-center"><?php echo"$rs[jenis_nilai]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama_tahun]";  ?></td>
                                            <td class="text-center"><?php echo "$rs[nilai]"; ?>
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
      
