<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Edit Data Siswa</strong></h3>
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
                            Edit Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php              
                                $sqld=mysql_query("select * from siswa where ids='$_SESSION[ids]'");
                                $rsd=mysql_fetch_array($sqld);    
                                ?>
                                    <form method="post" role="form" enctype="multipart/form-data" action="././module/simpan.php?act=siswa_det">
                                <input type="hidden" name="ids" value="<?php echo $rsd['ids'] ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" placeholder="Nis" name="nis" value="<?php echo "$rsd[nis]"; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama" value="<?php echo "$rsd[nama]"; ?>">
                                        </div>
                                        <div class="form-group">
         
                                           <label>Jenis Kelamin</label>
        <?php if($rsd['jk']=="L"){ ?>
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
        <?php if($rsd['jk']=="P"){ ?>
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
                                            <label>Agama</label>
                                            <select class="form-control" name="agama">
                                            <?php
                                            $dataagama = isset($_POST['agama']) ? $_POST['agama'] : $rsd['agama'];
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
                                            <label>Email</label>
                                            <input class="form-control" placeholder="email" name="email" type="email" value="<?php echo "$rsd[email]";?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo "$rsd[alamat]"; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas">
 <?php 
    $sqla=mysql_query("select * from kelas");
    while($rsa=mysql_fetch_array($sqla)){

if($rsd['id_kelas']==$rsa['id_kelas']){
    echo "<option value='$rsa[id_kelas]' selected>$rsa[nama_kelas]</option>";   
}
else{
    echo "<option value='$rsa[id_kelas]'>$rsa[nama_kelas]</option>";
}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp" value="<?php echo "$rsd[no_telp]"; ?>">
                                        </div>
</div>

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="nama_file">
                                            <input type="hidden" name="namafile" value="<?php echo "$rsd[foto]";?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat lahir</label>
                                            <input class="form-control" placeholder="Tempat lahir" name="tempat_lahir" value="<?php echo "$rsd[tempat_lahir]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal lahir</label>
                                            <input type="date" class="form-control" placeholder="Tanggal lahir" name="tanggal_lahir" value="<?php echo "$rsd[tanggal_lahir]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat</label>
                                            <select class="form-control" name="tingkat">
                                            <?php
                                            $sqlb = mysql_query("select * from tingkat");
                                            while ($rsb=mysql_fetch_array($sqlb)) {
                                                if ($rsd['id_tingkat']==$rsb['id_tingkat']) {
                                                    echo "<option value='$rsb[id_tingkat]' selected>$rsb[nama_tingkat]</option>";
                                                }
                                                else{
                                                    echo "<option value='$rsb[id_tingkat]'>$rsb[nama_tingkat]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                           
  <?php 
    $sqlc=mysql_query("select * from jurusan");
    while($rsc=mysql_fetch_array($sqlc)){

if($rsd['id_jurusan']==$rsc['id_jurusan']){
    echo "<option value='$rsc[id_jurusan]' selected>$rsc[nama_jurusan]</option>";   
}
else {
    echo "<option value='$rsc[id_jurusan]'>$rsc[nama_jurusan]</option>";
}
}
?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        <input type="button" value="Batal" onclick="self.history.back()" class="btn btn-warning">
                                </div>
                            
                                    </form>

                            </div>
                        
                        </div>
                    
                    </div>
                
                </div>
            
            </div>