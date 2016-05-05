<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="jscript/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="jscript/js/jquery.cookie.js"></script>
<script type="text/javascript" src="jscript/js/responsive-tables.js"></script>
<script type="text/javascript" src="jscript/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="mainwrapper">


        <div class="maincontent">
            <div class="maincontentinner">
            
               
                <table id="dyntable" class="table table-bordered">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort">No</th>
                            <th class="head0">No Pendaftaran</th>
                            <th class="head1">Nama Siswa</th>
                            <th class="head0">Alamat</th>
                            <th class="head1">Total Nilai</th>
                            <th class="head0">Keterangan</th>
                            <th class="head0">Diterima/Tidak Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					$tampil = mysql_query("SELECT * FROM hasil_tes,pendaftaran WHERE hasil_tes.id_pendaftaran=pendaftaran.id_pendaftaran ORDER BY(hasil_tes.total+0) desc");
  				    $no = 1;   
					while($r=mysql_fetch_array($tampil)){
					$total = $r['rata_raport'] + $r['skhun'];
					echo"<tr class='gradeA'>
                          <td class='aligncenter'>$no</td>
                            <td>PSB/$r[id_pendaftaran]/2015</td>
                            <td>$r[nama]</td>
                            <td>$r[alamat]</td>
                            <td class='center'>$r[total]</td>";
							$tampung = mysql_query("SELECT * FROM daya_tampung");
							while($t=mysql_fetch_array($tampung)){
							if ($total >= $t['nilai_minimal']){ 
							echo"<td style='background:#CCCCCC;color:#333333;'><b>LULUS</b></td>";
							}else{
							echo"<td style='background:#FF0000;color:#FFFF00;'><b>TIDAK LULUS</b></td>";
							}
							$kapasitas = mysql_query("SELECT * FROM daya_tampung");
							 while($k=mysql_fetch_array($kapasitas)){		
							if ($no <=$k['kapasitas'] AND $total >=$t['nilai_minimal']){
							echo"<td  style='background:#0033CC;color:#FFFF00;'><b>DITERIMA</b></td>";
							} 
	  						else{						
							echo"<td  style='background:#0066FF;color:#FFCC00;'>TIDAK DITERIMA</td>";
							}
							
                        	echo"</tr>";
					}
			}
				
				
      $no++;
    }
		  

?>
                    
                        
                    </tbody>
                </table>
                
              
              
               
            </div><!--maincontentinner-->
        </div><!--maincontent-->
</div><!--mainwrapper-->
</body>
</html>