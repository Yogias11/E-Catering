<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page - Data Menu</title>
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
      <h4><a href="<?php echo base_url('Shopping')?>">Samudra Catering</a></h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="<?php echo base_url('admin/Admin')?>">Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/Pelanggan')?>">Data Pelanggan</a></li>
        <li><a href="<?php echo base_url('admin/Kategori')?>">Data Kategori</a></li>
        <li><a href="<?php echo base_url('admin/Produk')?>">Data Makanan</a></li>
        <li><a href="<?php echo base_url('admin/Metode_bayar')?>">Metode Pembayaran</a></li>
        <li><a href="<?php echo base_url('admin/Order')?>">Data Pesanan</a></li>
        <li><a href="<?php echo base_url('admin/Pembayaran')?>">Data Pembayaran</a></li>
        <li><a href="<?php echo base_url('admin/Pendapatan')?>">Data Pendapatan</a></li>
      <li><?php echo anchor('logout', 'Logout'); ?></li>
      </ul><br>
    </div>
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <h2><center>Data Pesanan Pelanggan</center></h2>
      <br>
      <div class="table-responsive">
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pemesanan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Gambar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($produk as $product) {
          ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $product->id; ?></td>
              <td><?php echo $product->username; ?></td>
              <td><?php echo $product->tanggal; ?></td>
              <td><?php echo $product->qty; ?></td>
              <td><?php echo $product->harga; ?></td>
              <td><?php echo $product->total; ?></td>
              <td><img src="<?=base_url()?>assets/images/<?=$product->gambar;?>" width="120px" height="100px"></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
    </script>
    </div>
    <div class="col-md-1"></div>
</body>
</html>
