<!DOCTYPE html>
<html lang="en">
<head>
  <title>Samudra Panel - Produk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css"/>
  <script src="<?php echo base_url()?>assets/bootstrap/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/dataTables.bootstrap.min.css"/>
  <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>Samudra Catering</h4>
      <ul class="nav nav-pills nav-stacked">
      <li><a href="<?php echo base_url('index.php/admin/Admin')?>">Dashboard</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Pelanggan')?>">Data Pelanggan</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Kategori')?>">Data Kategori</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Produk')?>">Data Makanan</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Metode_bayar')?>">Metode Pembayaran</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Order')?>">Data Pesanan</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Pembayaran')?>">Data Pembayaran</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Pendapatan')?>">Data Pendapatan</a></li>
      <li><?php echo anchor('logout', 'Logout'); ?></li>
      </ul><br>
    </div>

    <div class="col-sm-10">
     <h2 align="center">Tambah Produk</h2>
    <div><?= validation_errors() ?></div>
  <?= form_open_multipart ('admin/Upload/upload_image/',['class'=>'form-horizontal']); ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="id_produk" placeholder="" value="<?=$kode;?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Nama Produk</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nama_produk" placeholder="" value="<?= set_value('nama_produk')?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
    <div class="col-sm-6">
      <textarea class="form-control" name="deskripsi"><?= set_value('deskripsi')?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="harga" placeholder="" value="<?= set_value('harga')?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Gambar</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" name="gambar">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
    <div class="col-sm-6">
      <select name="kategori" class="form-control">
        <?php foreach($kategori as $a) { ?>
          <option value="<?php echo $a->id ?>"><?= $a->nama_kategori ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-default" name="btnSubmit" value="Simpan">Submit</button>
    </div>
  </div>
  <?= form_close(); ?>
    </div>
  </div>
</div>

</body>
</html>