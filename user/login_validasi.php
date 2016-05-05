<?php 
include 'config/conn.php';
if(isset($_POST['login'])){
	
$pass=md5($_POST['password']);
$user=$_POST['username'];
$akses=$_POST['hakakses'];

	if ($akses=="admin") {
	$sql=mysql_query("select * from user where nama='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
		if($count>0){
			session_start();
				$_SESSION['idu']=$rs['idu'];
				$_SESSION['nama']=$rs['nama'];
				$_SESSION['level']=$rs['level'];
				
			header('location:media.php?module=home');
		}else {
			header('location:login1.php?&pesan=1&isi=gagal login');
		}
	}elseif ($akses=="siswa"){
$mr=md5($_POST['password']);
	$sqla=mysql_query("select * from siswa where nis='$user' and pass='$mr'");
	$counta=mysql_num_rows($sqla);
	$rsa=mysql_fetch_array($sqla);
if($counta>0){
			session_start();
				$_SESSION['ids']=$rsa['ids'];
				$_SESSION['idu']=$rsa['nis'];
				$_SESSION['nama']=$rsa['nama'];
				$_SESSION['level']="siswa";

			header('location:media.php?module=home');
				
}else {
			header('location:login1.php?&pesan=1&isi=gagal login');
		}
}elseif ($akses=="guru"){
$gr=md5($_POST['password']);
	$sqlz=mysql_query("select * from guru where nip='$user' and pass='$gr'");
	$countz=mysql_num_rows($sqlz);
	$rsz=mysql_fetch_array($sqlz);
if($countz>0){
			session_start();
				$_SESSION['idg']=$rsz['idg'];
				$_SESSION['idu']=$rsz['nip'];
				$_SESSION['nama']=$rsz['nama'];
				$_SESSION['level']="guru";

			header('location:media.php?module=home');
}else {
			header('location:login1.php?&pesan=1&isi=gagal login');
		}
}
}	
	
?>