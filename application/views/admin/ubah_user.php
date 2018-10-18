<?php
    $id_user      = $user->id_user;
if($this->input->post('is_submitted')){
  $username       = set_value('username');
  $email          = set_value('email');
  $alamat         = set_value('alamat');
  $ponsel         = set_value('ponsel');
  $password       = set_value('password');
  $level          = set_value('level');
} else {
    $username     = $user->username;
    $email        = $user->email;
    $alamat       = $user->alamat;
    $ponsel       = $user->ponsel; 
    $password     = $user->password;
    $level        = $user->level;
}
 ?>

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
     <h2>Tambah Produk</h2>
    <div><?= validation_errors() ?></div>
  <?= form_open('admin/Pelanggan/update_user/'.$id_user,['class'=>'form-horizontal']) ?>
  <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Kode Pelanggan</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="id_user" placeholder="" value="<?= $id_user?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="username" placeholder="" value="<?= $username ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" name="email" placeholder="" value="<?= $email ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="alamat" placeholder="" value="<?= $alamat ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Ponsel</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="ponsel" placeholder="" value="<?= $ponsel ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="password" placeholder="" value="<?= $password ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
          <div class="col-sm-6">
            <select class="form-control" name="level">
              <option>--Select Level--</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="is_submitted" value="1" />
            <button type="submit" class="btn btn-default" name="btnSubmit">Save</button>
          </div>
        </div>
  <?= form_close() ?>

    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
    </script>
</body>
</html>