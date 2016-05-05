<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Guru</strong></h3>
                </div>
            </div>
            <?php
                if (isset($_GET['pesandata'])) {
                    $pesandata = $_GET['pesandata'];
                    $isidata = $_GET['isidata'];
                    if ($pesandata == 1) {
                        echo "<div class='alert alert-danger'>
                        <a class='close' data-dismiss='alert'>×</a>
                        $isidata
                        </div>";
                    }
                }
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Guru
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" enctype="multipart/form-data" role="form" action="././module/simpan.php?act=input_guru">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" placeholder="Nip" name="nip">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L" 
                                                    checked>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempat_lahir">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" placeholder="Tanggal pendirian" name="tanggal_lahir" type="date">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telp">
                                        </div>
                                    </div>

                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control" name="agama">
                                            <option value="">...</option>
                                        <?php
                                            $pilihan = array("Islam", "Kristen", "Katolik", "Hindu", "Budha");
                                            foreach ($pilihan as $agama) {
                                                echo "<option value='$agama'>$agama</option>";
                                            }
                                        ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gelar</label>
                                            <input class="form-control" placeholder="Gelar" name="gelar">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="nama_file">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="k_password" type="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php } ?>
           
           
           
           <?php
if($_GET['act']=="edit_guru"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Edit Data Guru</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Guru
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php                            
                            	$sql=mysql_query("select * from guru where idg='$_GET[idg]'");
								$rs=mysql_fetch_array($sql);
?>
                                    <form method="post" role="form" enctype="multipart/form-data" action="././module/simpan.php?act=edit_guru">
<input type="hidden" name="idg" value="<?php echo $_GET['idg'] ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" placeholder="Nip" name="nip" value="<?php echo "$rs[nip]"; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama" value="<?php echo "$rs[nama]"; ?>">
                                        </div>
                                        <div class="form-group">
         
                                           <label>Jenis Kelamin</label>
        <?php if($rs['jk']=="L"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L" 
                                                    checked>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
<?php } ?>
        <?php if($rs['jk']=="P"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L" 
                                                    >Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P" checked>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
<?php } ?>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempat_lahir" value="<?php echo "$rs[tempat_lahir]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" placeholder="Tanggal pendirian" name="tanggal_lahir" type="date" value="<?php echo "$rs[tanggal_lahir]"; ?>">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telp" value="<?php echo "$rs[no_telp]"; ?>">
                                        </div>
                                    </div>

                                <div class="col-lg-6">
                                
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control" name="agama">
                                            <?php
                                            $dataagama = isset($_POST['agama']) ? $_POST['agama'] : $rs['agama'];
                                            $pilihan = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha');
                                            foreach ($pilihan as $agama) {
                                                if ($dataagama==$agama) {
                                                    $cek="selected";
                                                }else{
                                                    $cek="";
                                                }
                                                echo "<option value='$agama' $cek>$agama</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo "$rs[alamat]"; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Gelar</label>
                                            <input class="form-control" placeholder="Gelar" name="gelar" value="<?php echo "$rs[gelar]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Ganti foto</label>
                                            <input type="file" name="nama_file">
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <?php } ?>
             