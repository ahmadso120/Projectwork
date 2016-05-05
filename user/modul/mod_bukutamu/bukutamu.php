<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php
$aksi="modul/mod_bukutamu/aksi_bukutamu.php";
switch($_GET['act']){

  // Tampil Hubungi Kami
  default:
echo"<div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Buku Tamu</strong></h3>
            </div>
        </div>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Buku Tamu
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
        <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama</th>
                        <th class='text-center'>Email</th>
                        <th class='text-center'>Pesan</th>
                        <th class='text-center'>Tanggal</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";

    $tampil=mysql_query("SELECT * FROM bukutamu ORDER BY id_bukutamu DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr class='odd gradeX'>
            <td class='text-center'>$r[nama]</td>
            <td class='text-center'><a href=?module=bukutamu&act=balasemail&id=$r[id_bukutamu]>$r[email]</a></td>
            <td class='text-center'>$r[pesan]</td>
            <td class='text-center'>$r[tanggal]</td>
            <td class='text-center'>
            <a href=javascript:confirmdelete('$aksi?module=bukutamu&act=hapus&id=$r[id_bukutamu]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
            </td>
            </tr>";  
				}
    echo "</table>
    </div>
    </div>
    </div>
    </div>
    </div>";
    break;

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM bukutamu WHERE id_bukutamu='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);
echo"<h3 class='page-header'><strong>Balas Email</strong></h3>
	           <form method=POST action='?module=bukutamu&act=kirimemail'>
        
          <p>
		  <label>Kepada</label>
		  <input type=text name='email'  value='$r[email]'>
		  </p>
           <p>
		  <label>Pesan</label>
		  <textarea name='pesan' id='summernote'>
  $r[pesan]</textarea>
  </p>
        <p>
                <button class='btn btn-primary'>Kirim</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                                
                            </p></form>";
     break;
    
  case "kirimemail":
    mail($_POST['email'],$_POST['pesan'],"From: sopianahmad120@outlook.com");
    echo"
		      <h3 class='page-header'><strong>Balas Email</strong></h3>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
?>
