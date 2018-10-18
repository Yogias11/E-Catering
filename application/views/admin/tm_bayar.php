<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/jquery/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap-min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap-dialog-min.css"/>
</head>
<div class="kotak2">
    <h2>Metode Pembayaran</h2>
    <div><?= validation_errors() ?></div>
    <?= form_open_multipart ('admin/Upload_transaksi/upload_image',['class'=>'form-horizontal']); ?>
  <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">ID:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="id" id="id" value="<?=$kode;?>" readonly>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">Nama Bank</label>
            <div class="col-xs-9">
                <select id="nm_bayar" name="nm_bayar" class="form-control">
                <?php foreach ($metode as $key) { ?>
                    <option value="<?php echo $key->id_bayar ?>"><?= $key->nm_bayar ?></option>
                <?php } ?>
                </select>        
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">Atas Nama</label>
            <div class="col-xs-9">
            <select id="an" name="an" class="form-control">
                <?php foreach ($metode as $key) { ?>
                    <option value="<?php echo $key->id_bayar ?>"><?= $key->an ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">Norek</label>
            <div class="col-xs-9">
            <select id="norek" name="norek" class="form-control">
                <?php foreach ($metode as $key) { ?>
                    <option value="<?php echo $key->id_bayar ?>"><?= $key->norek ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3">Nama:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama...">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" >Bukti:</label>
            <div class="col-xs-9">
                <input type="file" class="form-control" name="bukti">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Proses Order</button>
            </div>
        </div>
    </form>
  <?= form_close(); ?>
</div>
<div class="col-md-2"></div>
</div>
</body>

</html>
