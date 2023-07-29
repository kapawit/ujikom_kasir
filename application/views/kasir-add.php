<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Tambah Kasir</h4>
    </div>
    <?php if($this->session->flashdata('message')): ?>
		<div>
		<div class="alert alert-info alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('message') ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		</div>
    <?php endif ?>
<div class="card shadow">
  <div class="card-body">
	<form action="<?= base_url("kasir/add")?>" method="post">
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Username</label>
		<div class="col-8">
            <input type="text" name="Username" value="<?php echo set_value('Username'); ?>" class="form-control">
            <?php echo form_error('Username', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Password</label>
		<div class="col-8">
            <input type="password" name="Password" value="<?php echo set_value('Password'); ?>" class="form-control">
            <?php echo form_error('Password', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Nama Kasir</label>
			<div class="col-8">
							<input type="text" name="NamaKasir" value="<?php echo set_value('NamaKasir'); ?>" class="form-control">
							<?php echo form_error('NamaKasir', '<div class="error text-danger">', '</div>'); ?>
			</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Alamat</label>
			<div class="col-8">
							<input type="text" name="Alamat" value="<?php echo set_value('Alamat'); ?>" class="form-control">
							<?php echo form_error('Alamat', '<div class="error text-danger">', '</div>'); ?>
			</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Nomor HP</label>
			<div class="col-8">
							<input type="text" name="NomorHP" value="<?php echo set_value('NomorHP'); ?>" class="form-control">
							<?php echo form_error('NomorHP', '<div class="error text-danger">', '</div>'); ?>
			</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Nomor KTP</label>
			<div class="col-8">
							<input type="text" name="NomorKTP" value="<?php echo set_value('NomorKTP'); ?>" class="form-control">
							<?php echo form_error('NomorKTP', '<div class="error text-danger">', '</div>'); ?>
			</div>
		</div>
    <div class="row">
    <div class="col-4">
    </div>
    <div class="col-8">
        <div class="d-flex justify-content-between">
            <a class="btn btn-lg btn-secondary" href="<?=$_SERVER['HTTP_REFERER']?>">Batal</a>
            <button class="btn btn-lg btn-primary" type="submit">Simpan</button>
        </div>
        </div>
        </div>
	</form>
  </div>

</div>