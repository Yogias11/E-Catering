<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/css/css.css" rel="stylesheet">
</head>
<body>

<div class="container>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h2 align="center">Silahkan Register</h2>
    <div><?= validation_errors() ?></div>
  <?= form_open_multipart ('login/Register/insert',['class'=>'form-horizontal']); ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_user" placeholder="" value="<?=$kode;?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="" value="<?= set_value('username')?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="" value="<?= set_value('email')?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat" placeholder="" value="<?= set_value('alamat')?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Ponsel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ponsel" placeholder="" value="<?= set_value('ponsel')?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="" value="<?= set_value('password')?>" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="btnSubmit" value="Simpan">Submit</button>
    </div>
  </div>
  <?= form_close(); ?>
</div>
<div class="col-md-2"></div>
</div>

</body>
</html>
