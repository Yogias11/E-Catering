<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="kotak2">
<body>
<h2><center>Daftar Pesanan Anda</center></h2>
      <br>
      <div class="table-responsive">

     <?php if($sejarah != false) : ?>
     <table class="table">
        <tr id= "main_heading">
            <th width="5%">No</th>
            <th>Kode Bayar</th>
            <th width="25%" align="center">Tanggal Pemesanan</th>
            <th width="10%" align="center">Jumlah</th>
            <th width="25%" align="center">Harga</th>
            <th width="25%" align="center">Gambar</th>
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
              <td><?php echo $row->qty; ?></td>
              <td><?php echo $row->harga; ?></td>
              <td><img src="<?=base_url()?>assets/images/<?=$row->gambar;?>" width="120px" height="100px"></td>
              <td>
            <td>
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
