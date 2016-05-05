 <div class="main-content-left">
 
  <?php
    
  
  $nama=trim($_POST['nama']);
  $email=trim($_POST['email']);

  $pesan=trim($_POST['pesan']);
  
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}

  mysql_query("INSERT INTO bukutamu(nama,
                                   email,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
header('location:bukutamu.html');
      
   echo "</div>";            
  ?>

  