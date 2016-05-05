<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET['act']){

  // Tampil Hubungi Kami
  default:
echo"<div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Hubungi</strong></h3>
            </div>
        </div>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Hubungi
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

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr class='odd gradeX'>
            <td class='text-center'>$r[nama]</td>
            <td class='text-center'><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
            <td class='text-center'>$r[pesan]</td>
            <td class='text-center'>$r[tanggal]</td>
            <td class='text-center'>
            <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]') class='btn btn-danger btn-circle'><span class='fa fa-times'></span></a>
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
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);
echo"<h3 class='page-header'><strong>Balas Email</strong></h3>
	           <form method=POST action='?module=hubungi&act=kirimemail'>
        
          <p>
		  <label>Kepada</label>
		  <input type=text name='email'  value='$r[email]'>
		  </p>
		  
          <p>
		  <label>Subjek</label>
		  <input type=text name='subjek' value='Re: $r[subjek]'>
		  </p>
           <p>
		  <label>Pesan</label>
		  <textarea name='pesan' id='summernote'  style='width: 750px; height: 200px''>$r[pesan]</textarea>
  </p>
        <p>
                                <button class='btn btn-primary'>Kirim</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
                                
                            </p></form>";
     break;
    
  case "kirimemail":
    mail($_POST['email'],$_POST['subjek'],$_POST['pesan'],"From: sopianahmad120@outlook.com");
    echo"<h3 class='page-header'><strong>Balas Email</strong></h3>
		
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
?>
