<?php

$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET['act']){
  // Tampil Kategori
  default:
    echo "<div class='row'>
            <div class='col-lg-12'>
            <h3 class='page-header'><strong>Kategori</strong></h3>
            </div>
        </div>
        <p><a href='?module=kategori&act=tambahkategori' class='btn btn-primary'>Tambah Kategori</a></p>
        <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Data Kategori
                        </div>
                        <div class='panel-body'>
                            <div class='table-responsive'>
        
        <table id='dataTables-example' class='table table-striped table-condensed table-hover'>
                <thead>
                    <tr>
                        <th class='text-center'>Nama Kategori</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Aksi</th>
                    </tr>
                </thead>
                <tbody>";
    $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class='odd gradeX'>
            <td class='text-center'>$r[nama_kategori]</td>
            <td class='text-center'>$r[aktif]</td>
            <td class='text-center'>
            <a href='?module=kategori&act=editkategori&id=$r[id_kategori]' class='btn btn-info btn-circle'><i class='glyphicon glyphicon-edit'></i></a>           
            </td>
            </tr>";
    }
    echo "<tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<h2>Tambah Kategori</h2>
          <form method=POST action='$aksi?module=kategori&act=input'>
          <p> 
          <label>Nama Kategori</label>
        <input type=text name='nama_kategori'>
        </p> 
          <p>
    <button class='btn btn-primary'>Simpan</button>
    <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </p>
    </form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[id_kategori]'>
          <p> 
          <label>Nama Kategori</label>
        <input type=text name='nama_kategori' value='$r[nama_kategori]'>
        </p> ";
          if ($r['aktif']=='Y'){
      echo "<p>
            <label>Aktif</label>
            <input type=radio name='aktif' value='Y' checked>Y  
            <input type=radio name='aktif' value='N'> N
            </p>";
    }
    else{
      echo "<p>
            <label>Aktif</label>
            <input type=radio name='aktif' value='Y'>Y  
            <input type=radio name='aktif' value='N' checked>N
            </p>";
    }

    echo "<p>
            <button class='btn btn-primary'>Update</button>
            <input type=button class='btn btn-warning' value=Batal onclick=self.history.back()>
            </p>
          </form>";
    break;  
}
?>
