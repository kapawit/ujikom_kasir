<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("assets/css/login.css")?>" >
    <title>Login Kasir</title>
  </head>
  <body class="d-flex justify-content-center align-items-middle">
  <div class="card">
  <div class="card-header text-left">
	<h3>Login</h3>
  </div>
  <div class="card-body">
	<form action="<?= base_url("auth")?>" method="post">
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Username</label>
		<div class="col-8">
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Password</label>
		<div class="col-8">
			<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required autofocus>
		</div>
		</div>
		<?php if($this->session->flashdata('message_login_error')): ?>
		<div>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('message_login_error') ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		</div>
	<?php endif ?>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	</form>
  </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>

