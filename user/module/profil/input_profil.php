<?php
if($_GET['act']=="input"){
    ?>

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input profil sekolah</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input profil sekolah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_profil">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama sekolah</label>
                                            <input class="form-control" placeholder="Nama sekolah" name="nama_sekolah">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal pendirian</label>
                                            <input class="form-control" placeholder="Tanggal pendirian" name="tanggal_pendirian" id="tgl">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" placeholder="Alamat website" name="website">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="5"></textarea>
                                        </div>

                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="telepon">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode pos</label>
                                            <input class="form-control" placeholder="Kode pos" name="kode_pos">
                                        </div>
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input class="form-control" placeholder="Provinsi" name="provinsi">
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input class="form-control" placeholder="Kota" name="kota">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama kepala sekolah</label>
                                            <input class="form-control" placeholder="Nama kepala sekolah" name="nama_kepsek">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama wakil kepala sekolah</label>
                                            <input class="form-control" placeholder="Nama wakil kepala sekolah" name="nama_wakkepsek">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-block">Submit Button</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                    </form>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <?php } ?>
           
           
           
           