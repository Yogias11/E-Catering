<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
</head>
<body>
  <div id="formWrapper">
	<div id="form">
  <div class="logo">
	<h1><span>Samudra</span> CATERING</h1>
	<link href="<?php echo base_url(); ?>assets/css/css.css" rel="stylesheet">
	<?php echo form_open('login/login/index') ?>
      <div class="form-item">
        <label for="username" >Username:</label>
        <input class="form-control" name="username" id="username" type="text" required="">
      </div>
     
      <div class="form-group">
        <label for="password" >Password:</label>
        <input class="form-control" name="password" id="password" type="password">
      </div>
      <center>
      	<div>
        <button class="btn btn-primary" name="login">Login</button>
      </div>
      <div>
      <a href="<?php echo base_url('login/login/create2')?>"><h6>Register</h6> </a>
      </div>
      </center>
      
    </div>
	<?php echo form_close() ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>