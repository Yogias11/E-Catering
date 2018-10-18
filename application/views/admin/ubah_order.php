<?php
    $id    = $produk->id;
if($this->input->post('is_submitted')){
  $id_plg  = set_value('id_plg');
  $qty  = set_value('qty');
  $harga      = set_value('harga');
} else {
    $id_plg    = $produk->id_plg;
    $qty    = $produk->qty;
    $harga        = $produk->harga;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h2>Tambah Produk</h2>
    <div><?= validation_errors() ?></div>
  <?= form_open('admin/Order/update/'.$id,['class'=>'form-horizontal']) ?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id" placeholder="" value="<?= $id ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ID Order</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_plg" placeholder="" value="<?= $id_plg ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="qty" placeholder="" value="<?= $qty ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga" placeholder="" value="<?= $harga ?>">
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
<div class="col-md-2"></div>
</div>

</body>
</html>
