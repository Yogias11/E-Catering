<h2>Konfirmasi Check Out</h2>
<div class="kotak2">
<?php
$grand_total = 0;
if ($cart = $this->cart->contents())
	{
		foreach ($cart as $item)
			{
				$grand_total = $grand_total + $item['subtotal'];
			}
		echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";	
?>
<div><?= validation_errors() ?></div>
  <?= form_open_multipart ('Shopping/proses_order',['class'=>'form-horizontal']); ?>  
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="lastName">Alamat:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat...">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" >No HP:</label>
            <div class="col-xs-9">
                <input type="int" class="form-control" name="telp" id="telp" placeholder="No HP......">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Proses Order</button>
            </div>
        </div>
    </form>
    <?php
	}
	else
		{
			echo "<h5>Shopping Cart masih kosong</h5>";	
		}
	?>
</div>