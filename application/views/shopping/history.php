<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="kotak2">
<body>
<h2><center>Hasil Transaksi</center></h2> 
      <br>
      <div class="table-responsive">

     <?php if($sejarah != false) : ?>
     <table class="table">
        <tr id= "main_heading">
            <th width="5%">NO</th>
            <th width="5%" align="center">Kode Bayar</th>
            <th width="25%" align="center">Tanggal Pemesanan</th>
            <th width="25%" align="center">Batas Pembayaran</th>
            <th width="15%" align="center">Total</th>
            <th width="25%" align="center">Status</th>
            <th width="25%" align="center">Aksi</th>
        </tr>
      <tbody>
        <?php
            $no = 1;
            foreach ($sejarah as $row) {
          ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $row->id; ?></td>
              <td><?php echo $row->date; ?></td>
              <td><?php echo $row->due_date; ?></td>
              <td><?php echo $row->total; ?></td>
              <td><?php echo $row->status; ?></td>
              <?php $action = $row->status;
              if($action == 'UNPAID'){ ?>
              <td>
              <?= anchor('admin/upload_transaksi/create',
              'Konfirmasi',
              ['class' => 'btn btn-primary btn-sm btn-xs'])?>
            <td>
              <?php } ?>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    <?php else : ?>
      <p align="center">Tidak ada history pemesanan, silahkan lakukan pesanan sekarang! Terimakasih :)</p>
    <?php endif; ?>
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
