<?php
if ($_GET['module']=="dashboard_admin") {
	include "module/dashboard_admin.php";
}

if($_GET['module']=="input_profil"){
include "module/profil/input_profil.php";
}

if ($_GET['module']=="input_jurusan") {
	include "module/jurusan/input_jurusan.php";
}

if ($_GET['module']=="input_tahun") {
	include "module/tahun/input_tahun.php";
}

if ($_GET['module']=="input_tingkat") {
	include "module/tingkat/input_tingkat.php";
}

if ($_GET['module']=="input_ruangan") {
	include "module/ruangan/input_ruangan.php";
}
if ($_GET['module']=="ruangan") {
	include 'module/ruangan/ruangan.php';
}

if ($_GET['module']=="input_gedung") {
	include "module/gedung/input_gedung.php";
}

if ($_GET['module']=="input_semester") {
	include "module/semester/input_semester.php";
}

if ($_GET['module']=="input_mapel") {
	include "module/mapel/input_mapel.php";
}

if($_GET['module']=="siswa"){
include "module/siswa/siswa.php";
}
if($_GET['module']=="tampil"){
include "module/siswa/tampil.php";
}
if($_GET['module']=="input_siswa"){
include "module/siswa/input_siswa.php";
}
if($_GET['module']=="siswa_det"){
include "module/siswa/siswa_det.php";
}
if($_GET['module']=="detail_siswa"){
include "module/siswa/detail_siswa.php";
}


if($_GET['module']=="pilih_laporan"){
include "module/laporan/pilih_laporan.php";
}
if($_GET['module']=="laporan"){
include "module/laporan/laporan.php";
}
if($_GET['module']=="user"){
include "module/user/user.php";
}
if($_GET['module']=="input_user"){
include "module/user/input_user.php";
}

if($_GET['module']=="input_guru"){
include "module/guru/input_guru.php";
}
if($_GET['module']=="detail_guru"){
include "module/guru/detail_guru.php";
}
if($_GET['module']=="guru_det"){
include "module/guru/guru_det.php";
}

if($_GET['module']=="guru"){
include "module/guru/guru.php";
}
if($_GET['module']=="tampil_guru"){
include "module/guru/tampil_guru.php";
}
if($_GET['module']=="input_kelas"){
include "module/kelas/input_kelas.php";
}
if($_GET['module']=="kelas"){
include "module/kelas/kelas.php";
}
if($_GET['module']=="input_sekolah"){
include "module/sekolah/input_sekolah.php";
}
?>