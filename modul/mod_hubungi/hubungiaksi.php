<div class="main-content-left">
 
  <?php
    
  
  $nama=trim($_POST['nama']);
  $email=trim($_POST['email']);
  $subjek=trim($_POST['subjek']);
  $pesan=trim($_POST['pesan']);
  

if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		if(empty($subjek)) {
			echo 'Anda belum mengisikan SUBJEK<br/>';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}
		
  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
  echo "<p><img src='images/terimakasih.jpg'   border=0></p>";
  $kepada = "$iden[email]"; 
   $judul = "Ada Pesan di $iden[nama_website]";
   $pesan = "Baru saja ada yang kirim pesan di $iden[nama_website]\n"; 
   $pesan .= "kunjungi $iden[url]"; 
   mail($kepada,$judul,$pesan,"From: $iden[email]\n Content-type:text/html\r\n");
      
   echo "</div>";            
  ?>

  