
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page | Data Metode Pembayaran</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<h2>Silahkan Konfirmasi</h2>
<div class="kotak2">
<body>
  <div><?=validation_errors()?></div>
  <div><?=$this->session->set_flashdata('error')?></div>
  <?=form_open('Customer/payment_confirmation', ['class'=>'form-horizontal'])?>
      <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">ID IVC:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="id_ivc" value="<?=$id_ivc != 0?$id_ivc:''?>" required>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="firstName">Nominal transfer:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="total" required="">
            </div>
        </div>
      <center>
      	<div>
        <button class="btn btn-primary" name="login">Login</button>
      </div>
    </center>
  </body>
  </html>

  