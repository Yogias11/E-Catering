<h2>Proses Order sukses</h2>
<div class="kotak2">
<p align="center">Terima kasih telah melakukan pembayaran :)<br>
Jangan segan mengontak kami jika ada permasalahan!</p>
  <?=form_open('Customer/payment_confirmation', ['class'=>'form-horizontal'])?>
      <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">KODE BAYAR:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="id_ivc">
            </div>
        </div>
      <center>
      	<div>
        <button class="btn btn-primary" name="login">Proses Order</button>
      </div>
      </div>
    </center>