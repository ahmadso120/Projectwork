<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
<?php
$aksi="modul/mod_hasil_tes/aksi_hasil_tes.php";
switch($_GET['act']){
  // Tampil Hasil Tes
  default:
    echo"
          <div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Hasil Tes PSB</strong></h3>
            </div>
        </div>
        <a href='?module=tambah_hasil_tes' class='btn btn-primary'>Tambah Hasil Tes PSB</a>
        <a href=../pengumuman.html class='btn btn-primary' target='_blank' class='btn btn-primary'>Cetak Laporan Hasil Tes PSB</a>
        <div class='row' style='margin-top:20px;'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Hasil Tes PSB
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
                <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>No Pendaftaran</th>
                        <th class='text-center'>Nama Siswa</th>
                        <th class='text-center'>Alamat</th>
                        <th class='text-center'>Nilai SKHUN</th>
                        <th class='text-center'>Nilai rata rata raport</th>
                        <th class='text-center'>Total Nilai</th>
                        <th class='text-center'>Keterangan</th>
                        <th class='text-center'>Diterima/Tidak Diterima</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";            

$tampil = mysql_query("SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran ORDER BY(hasil_tes.total+0) desc");  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
		$total = $r['rata_raport'] + $r['skhun'];
      echo "<tr class='odd gradeX'>
            <td class='text-center'>$r[id_pendaftaran]</td>
            <td class='text-center'>$r[nama]</td>
            <td class='text-center'>$r[alamat]</td>
            <td class='text-center'>$r[skhun]</td>
            <td class='text-center'>$r[rata_raport]</td>
            <td class='text-center'>$r[total]</td>";
$tampung = mysql_query("SELECT * FROM daya_tampung");
 while($t=mysql_fetch_array($tampung)){
 if ($total >=$t['nilai_minimal']){
	echo"<td class='text-center'><b>LULUS</b></td>";
	} 
  else
  		{
  echo"<td class='text-center'><b>TIDAK LULUS</b></td>";
		}
		
$kapasitas = mysql_query("SELECT * FROM daya_tampung");
 while($k=mysql_fetch_array($kapasitas)){		
if ($no <=$k['kapasitas'] AND $total >=$t['nilai_minimal']){
	echo"<td class='text-center'><b>DITERIMA</b></td>";
	} 
  else
  		{			
				
	echo"<td class='text-center'>TIDAK DITERIMA</td>";
					}
			}
				}
                echo "
                <td class='text-center'>
                <a href='?module=tambah_hasil_tes&act=edithasil_tes&id=$r[id_hasil]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
                <a href=javascript:confirmdelete('$aksi?module=hasil_tes&act=hapus&id=$r[id_hasil]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
                </td>
                </tr>";
      $no++;
    }
    echo "</tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>";
    break;
}
?>
