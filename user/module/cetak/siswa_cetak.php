<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik_sekolah";
$koneksi = mysql_connect($host, $user, $pass);
  if (!$koneksi){
  echo "Tidak bisa konek ke host $host karena <b> ".mysql_error()."</b>";
  }else{
  $select_db = mysql_select_db($db);
    if (!$select_db){
      echo "Tidak bisa memilih database $db karena <b>".mysql_error()."</b>";
    }
  }
if($ids=$_GET['ids']){
  $sql=mysql_query("SELECT siswa.*, kelas.nama_kelas, tingkat.nama_tingkat, jurusan.nama_jurusan 
                        FROM siswa 
                        LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                        LEFT JOIN tingkat ON siswa.id_tingkat = tingkat.id_tingkat
                        LEFT JOIN jurusan ON siswa.id_jurusan = jurusan.id_jurusan
                        WHERE ids='$ids';");

  while ($rs=mysql_fetch_array($sql)) {

      if ($rs['foto'] == "") {
        $namafoto = "images.jpg";
      }else{
        $namafoto = $rs['foto'];
      }

?>
<html>
<head>
<title>:: Cetak Data Siswa</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/styles_cetak.css">
</head>
<body onLoad="window.print()">
<h1>DATA SISWA </h1>
  <table width="800" border="0" cellpadding="3" cellspacing="1">
    
    <tr>
      <td><b>NIS </b></td>
      <td><b>:</b></td>
      <td> <?php echo $rs['nis']; ?>  </td>
    </tr>
    <tr>
      <td><b>Nama Siswa </b></td>
      <td><b>:</b></td>
      <td> <?php echo $rs['nama']; ?> </td>
    </tr>
    <tr>
      <td><b>Jenis Kelamin </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['jk']; ?></td>
    </tr>
    <tr>
      <td><b>Alamat </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['alamat']; ?></td>
    </tr>
    <tr>
      <td><b>Tempat lahir </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['tempat_lahir']; ?></td>
    </tr>
    <tr>
      <td><b>Tanggal lahir </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['tanggal_lahir']; ?></td>
    </tr>
    <tr>
      <td><b>Telepon </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['no_telp']; ?></td>
    </tr>
    <tr>
      <td><b>Kelas </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['nama_kelas']; ?></td>
    </tr>
    <tr>
      <td><b>Tingkat </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['nama_tingkat']; ?></td>
    </tr>
    <tr>
      <td><b>jurusan </b></td>
      <td><b>:</b></td>
      <td><?php echo $rs['nama_jurusan']; ?></td>
    </tr>
</table>
  <img src="../foto/<?php echo $namafoto; ?>" width="180">
</body>
</html>
<?php 
}
}
?>