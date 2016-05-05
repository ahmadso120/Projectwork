<?php

if ($_GET['module']=="home") {
	include "module/home.php";
}

elseif($_GET['module']=="input_profil"){
	include "module/profil/input_profil.php";
}

elseif ($_GET['module']=="input_jurusan") {
	include "module/jurusan/input_jurusan.php";
}
elseif ($_GET['module']=="jurusan") {
	include "module/jurusan/jurusan.php";
}

elseif ($_GET['module']=="input_tahun") {
	include "module/tahun/input_tahun.php";
}
elseif ($_GET['module']=="tahun") {
	include "module/tahun/tahun.php";
}

elseif ($_GET['module']=="input_tingkat") {
	include "module/tingkat/input_tingkat.php";
}
elseif ($_GET['module']=="tingkat") {
	include "module/tingkat/tingkat.php";
}

elseif ($_GET['module']=="input_ruangan") {
	include "module/ruangan/input_ruangan.php";
}
elseif ($_GET['module']=="ruangan") {
	include "module/ruangan/ruangan.php";
}

elseif ($_GET['module']=="input_gedung") {
	include "module/gedung/input_gedung.php";
}

elseif ($_GET['module']=="mapel") {
	include 'module/mapel/mapel.php';
}
elseif ($_GET['module']=="input_mapel") {
	include "module/mapel/input_mapel.php";
}

elseif ($_GET['module']=="jenis_nilai") {
	include "module/jenis_nilai/jenis_nilai.php";
}
elseif ($_GET['module']=="input_jenis") {
	include "module/jenis_nilai/input_jenis.php";
}

elseif ($_GET['module']=="nilai") {
	include "module/nilai/nilai.php";
}
elseif ($_GET['module']=="input_nilai") {
	include "module/nilai/input_nilai.php";
}

elseif($_GET['module']=="siswa"){
include "module/siswa/siswa.php";
}
elseif($_GET['module']=="tampil"){
include "module/siswa/tampil.php";
}
elseif($_GET['module']=="input_siswa"){
include "module/siswa/input_siswa.php";
}
elseif($_GET['module']=="siswa_det"){
include "module/siswa/siswa_det.php";
}
elseif($_GET['module']=="detail_siswa"){
include "module/siswa/detail_siswa.php";
}
elseif($_GET['module']=="siswa_cetak"){
include "module/siswa/siswa_cetak.php";
}

elseif ($_GET['module']=="laporan") {
include 'module/laporan/laporan.php';
}

elseif($_GET['module']=="tampil_anggota"){
include "module/anggota_kelas/tampil_anggota.php";
}
elseif($_GET['module']=="anggota_kelas"){
include "module/anggota_kelas/anggota_kelas.php";
}

elseif($_GET['module']=="user"){
include "module/user/user.php";
}
elseif($_GET['module']=="input_user"){
include "module/user/input_user.php";
}

elseif($_GET['module']=="input_guru"){
include "module/guru/input_guru.php";
}
elseif($_GET['module']=="detail_guru"){
include "module/guru/detail_guru.php";
}
elseif($_GET['module']=="guru_det"){
include "module/guru/guru_det.php";
}

elseif($_GET['module']=="guru"){
include "module/guru/guru.php";
}
elseif($_GET['module']=="tampil_guru"){
include "module/guru/tampil_guru.php";
}
elseif($_GET['module']=="input_kelas"){
include "module/kelas/input_kelas.php";
}
elseif($_GET['module']=="kelas"){
include "module/kelas/kelas.php";
}
elseif($_GET['module']=="ubahpassadmin"){
include "module/ubahpass/ubahpassadmin.php";
}
elseif($_GET['module']=="ubahpassguru"){
include "module/ubahpass/ubahpassguru.php";
}
elseif($_GET['module']=="ubahpasssiswa"){
include "module/ubahpass/ubahpasssiswa.php";
}
elseif($_GET['module']=="input_sekolah"){
include "module/sekolah/input_sekolah.php";
}
elseif ($_GET['module']=='home'){
include "modul/mod_content/isi.php";
}
elseif ($_GET['module']=='identitas'){
include "modul/mod_identitas/identitas.php";
}
elseif ($_GET['module']=='menu'){
include "modul/mod_menu/menu.php";
}
elseif ($_GET['module']=='submenu'){
include "modul/mod_submenu/submenu.php";
}
elseif ($_GET['module']=='content'){
include "modul/mod_content/content.php";
}
elseif ($_GET['module']=='halamanstatis'){
include "modul/mod_halamanstatis/halamanstatis.php";
}
elseif ($_GET['module']=='berita'){
include "modul/mod_berita/berita.php";
}
elseif ($_GET['module']=='kategori') {
include 'modul/mod_kategori/kategori.php';
}
elseif ($_GET['module']=='pengumuman'){
include "modul/mod_pengumuman/pengumuman.php";
}
elseif ($_GET['module']=='galerifoto'){
include "modul/mod_galerifoto/galerifoto.php";
}
elseif ($_GET['module']=='hubungi'){
include "modul/mod_hubungi/hubungi.php";
}
elseif ($_GET['module']=='bukutamu'){
include "modul/mod_bukutamu/bukutamu.php";
}
elseif ($_GET['module']=='info'){
   include "modul/mod_info/info.php";
}
elseif ($_GET['module']=='daya_tampung'){
   include "modul/mod_daya_tampung/daya_tampung.php";
}
elseif ($_GET['module']=='pendaftaran'){
   include "modul/mod_pendaftaran/pendaftaran.php";
}
elseif ($_GET['module']=='hasil_tes'){
   include "modul/mod_hasil_tes/hasil_tes.php";
}
elseif ($_GET['module']=='sekolah'){
   include "modul/mod_sekolah/sekolah.php";
}
elseif ($_GET['module']=='tambah_hasil_tes'){
   include "modul/mod_hasil_tes/tambah_hasil_tes.php";
}
elseif ($_GET['module']=='users'){
include "modul/mod_users/users.php";
}

else{
  echo "<p><b>Modul belum lengkap</b></p>";
} 
?>