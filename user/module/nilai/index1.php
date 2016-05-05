<?php
#koneksi
$conn = mysqli_connect("localhost", "root", "", "akademik_sekolah");
#akhir-koneksi

#ambil data propinsi
$query = "SELECT id_kelas, nama_kelas FROM kelas ORDER BY nama_kelas";
$sql = mysqli_query($conn, $query);
$arrkelas = array();
while ($row = mysqli_fetch_assoc($sql)) {
	$arrkelas [ $row['id_kelas'] ] = $row['nama_kelas'];
}

#action get Kabupaten
if(isset($_GET['action']) && $_GET['action'] == "getSis") {
	$id_kelas = $_GET['id_kelas'];
	
	//ambil data kabupaten
	$query = "SELECT ids, nama FROM siswa WHERE id_kelas='$id_kelas' ORDER BY nama";
	$sql = mysqli_query($conn, $query);
	$arrsis = array();
	while ($row = mysqli_fetch_assoc($sql)) {
		array_push($arrsis, $row);
	}
	echo json_encode($arrsis);
	exit;
}
?>
<html>
	<head>
		
		<script type="text/javascript" src="libs/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#kelas').change(function(){
					$.getJSON('index1.php',{action:'getSis', id_kelas:$(this).val()}, function(json){
						$('#siswa').html('');
						$.each(json, function(index1, row) {
							$('#siswa').append('<option value='+row.ids+'>'+row.nama+'</option>');
						});
					});
				});
			});
		</script>
	</head>
	<body>
		<span class="inputan">
		<label for="kelas">Kelas</label>
		: <select id="kelas" name="kelas">
			<option value="">-Pilih-</option>
			<?php
			foreach ($arrkelas as $id_kelas=>$nama_kelas) {
				echo "<option value='$id_kelas'>$nama_kelas</option>";
			}
			?>
		</select>
		</span>
		<span class="inputan">
		<label for="siswa">Siswa</label>
		: <select id="siswa" name="siswa">
		</select>
		</span>
		</form>
	</body>
</html>
