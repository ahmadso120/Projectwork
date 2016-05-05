<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

</head>

<body style="background:#eee">

	<div class="container">
	<p><br /></p>	
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header text-center">
						<h2>Login</h2>
					</div>

					<form method="post" action="login_validasi.php">
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" name="username" class="form-control" placeholder="Username" autofocus required>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-key"></span></span>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
                            <label>Hak Akses</label>
                            <select name="hakakses" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                            <option value="guru">Guru</option>
                            </select>
                        </div>
                        <?php
                            if (isset($_GET['pesan'])) {
                                $pesan = $_GET['pesan'];
                                $isi = $_GET['isi'];
                                if ($pesan == 1) {
                                    echo "<div class='alert alert-danger'>
                                    <a class='close' data-dismiss='alert'>×</a>
                                    $isi
                                    </div>";
                                }
                            }?>
							<button name="login" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Login</button>
							<p><br /></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html