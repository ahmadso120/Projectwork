<?php
session_start();
function watermark_image($oldimage_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
     $pos_x = $width - $w_width -5; 
    $pos_y = $height - $w_height - 5;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $oldimage_name, 100);
    imagedestroy($im);
	return true;
}

include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='berita' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM berita WHERE id_berita='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
     unlink("../../../foto_berita/$_GET[namafile]");   
     unlink("../../../foto_berita/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Input berita
elseif ($module=='berita' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);
	 watermark_image('../../../foto_berita/'.$nama_file_unik);

   mysql_query("INSERT INTO berita( judul,
                                    judul_seo,
                                    id_kategori,
                                    headline,
									aktif,
									utama,
								    klik,
                                    username,
                                    isi_berita,
                                    jam,
                                    tanggal,
                                    hari,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[kategori]',
                                   '$_POST[headline]', 
								   '$_POST[aktif]',
								   '$_POST[utama]', 
								   '$_POST[klik]', 
                                   '$_SESSION[nama]',
                                   '$_POST[isi_berita]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  else{
   mysql_query("INSERT INTO berita( judul,
                                    judul_seo,
                                    id_kategori,
                                    headline,
									aktif,
									utama,
									klik,
                                    username,
                                    isi_berita,
                                    jam,
                                    tanggal,
                                    hari) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[kategori]',
                                   '$_POST[headline]', 
								   '$_POST[aktif]', 
								   '$_POST[utama]', 
								   '$_POST[klik]', 
                                   '$_SESSION[nama]',
                                   '$_POST[isi_berita]',
                                   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini')");
  header('location:../../media.php?module='.$module);
 }
  
}
// Update berita
elseif ($module=='berita' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[judul]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                 id_kategori   = '$_POST[kategori]',
                                   headline    = '$_POST[headline]',
								     aktif     = '$_POST[aktif]',
								     utama     = '$_POST[utama]',
                                   isi_berita  = '$_POST[isi_berita]'
                             WHERE id_berita   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    $data_gambar = mysql_query("SELECT gambar FROM berita WHERE id_berita='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_berita/'.$r['gambar']);
	@unlink('../../../foto_berita/'.'small_'.$r['gambar']);
	 UploadImage($nama_file_unik);
	 watermark_image('../../../foto_berita/'.$nama_file_unik);
  
     mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   judul_seo   = '$judul_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   headline    = '$_POST[headline]',
							 	                   aktif       = '$_POST[aktif]',
								                    utama      = '$_POST[utama]',
                                   isi_berita  = '$_POST[isi_berita]', 
                                   gambar      = '$nama_file_unik'     
                             WHERE id_berita   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}

?>
