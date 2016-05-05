<?php

include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus info
if ($module=='info' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM info WHERE id_info='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM info WHERE id_info='$_GET[id]'"); 
     unlink("../../../foto_statis/$_GET[namafile]");   
     unlink("../../../foto_statis/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM info WHERE id_info='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Input info
elseif ($module=='info' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadStatis($nama_file_unik);

   mysql_query("INSERT INTO info(judul,
	                                       judul_seo,
										   isi_info,
                       nama_tab,
										   tgl_posting,
										   gambar,
										   username,
										      jam) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_info]',
                       '$_POST[nama_tab]',
										   '$tgl_sekarang',
										   '$nama_file_unik',
										   '$_SESSION[nama]',
										     '$jam_sekarang')");
  header('location:../../media.php?module='.$module);
  }
  else{
   mysql_query("INSERT INTO info(judul,
	                                       judul_seo,
										   isi_info,
                       nama_tab,
										   tgl_posting,
										   username,
										      jam) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_info]',
                       '$_POST[nama_tab]',
										   '$tgl_sekarang',
										   '$_SESSION[nama]', 
										     '$jam_sekarang')");
  header('location:../../media.php?module='.$module);
  }
}
// Update info
elseif ($module=='info' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE info SET judul        = '$_POST[judul]',
                                        judul_seo    = '$judul_seo',
                                        isi_info  = '$_POST[isi_info]',
                                        nama_tab = '$_POST[nama_tab]'  
                                  WHERE id_info   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
   $data_gambar = mysql_query("SELECT gambar FROM info WHERE id_info='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_statis/'.$r['gambar']);
	@unlink('../../../foto_statis/'.'small_'.$r['gambar']);
    UploadStatis($nama_file_unik ,'../../../foto_statis/');
    mysql_query("UPDATE info SET judul        = '$_POST[judul]',
                                          judul_seo    = '$judul_seo',
                                          isi_info  = '$_POST[isi_info]',
                                          nama_tab = '$_POST[nama_tab]',
                                          gambar       = '$nama_file_unik'   
                                    WHERE id_info   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
?>
