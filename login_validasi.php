<?php 
include 'config/conn.php';
if(isset($_POST['login'])){
	# Baca variabel form
	$user 	= $_POST['username'];
	$user 	= str_replace("'","&acute;",$user);
	
	$pass = $_POST['password'];
	$pass = str_replace("'","&acute;",$pass);
	
	# Validasi form 
	$pesanError = array();
	if ( trim($user)=="") {
		$pesanError[] = "Data <b> Username </b>  tidak boleh kosong !";		
	}
	if (trim($pass)=="") {
		$pesanError[] = "Data <b> Password </b> tidak boleh kosong !";		
	}
	
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='alert alert-warning alert-dismissable' style='text-align:center'>";
		echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "<strong>&nbsp;&nbsp; $noPesan. $pesan_tampil</strong><br>";	
			} 
		echo "</div>"; 
		
		// Tampilkan lagi form login
		include "login.php";
	}
	else {
		# LOGIN CEK KE TABEL USER LOGIN
$pass=md5($_POST['password']);
$passw=$_POST['password'];

$user=$_POST['username'];

	$sql=mysql_query("select * from user where nama='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
		if($count>0){
			session_start();
				$_SESSION['idu']=$rs['idu'];

				$_SESSION['nama']=$rs['nama'];
				$_SESSION['level']=$rs['level'];
				$_SESSION['id_kelas']="";
				$_SESSION['ortu']="";
				
			
			echo "<meta http-equiv='refresh' content='0; url=media.php?module=dashboard_admin'>";
		}else{
$mr=md5($_POST['password']);
	$sqla=mysql_query("select * from siswa where nis='$user' and pass='$mr'");
	$counta=mysql_num_rows($sqla);
	$rsa=mysql_fetch_array($sqla);
if($counta>0){
			session_start();
				$_SESSION['idu']=$rsa['nis'];
				$_SESSION['nama']=$rsa['nama'];
				$_SESSION['level']="user";
				$_SESSION['ortu']=$passw;
				$_SESSION['id_kelas']=$rsa['id_kelas'];

			header('location:media.php?module=home');
				
}else{
$gr=md5($_POST['password']);
	$sqlz=mysql_query("select * from guru where nip='$user' and pass='$gr'");
	$countz=mysql_num_rows($sqlz);
	$rsz=mysql_fetch_array($sqlz);
if($countz>0){
			session_start();
				$_SESSION['idu']=$rsz['nip'];
				$_SESSION['nama']=$rsz['nama'];
				$_SESSION['id_kelas']=$rsz['id_kelas'];
				$_SESSION['level']="guru";
				$_SESSION['ortu']="";

			header('location:media.php?module=home');
	
	
}else{
		echo "<div class='alert alert-danger alert-dismissable' style='text-align:center;'>";
		echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
		echo "<strong>username atau password salah</strong><br>";
		echo "<a href='login.php' class=\"alert-link\" style='text-decoration:none;'>Silahkan coba lagi</a>";
		echo "</div> <br>";
		include "login.php"; 
}
}
}
	}
} // End POST
?>