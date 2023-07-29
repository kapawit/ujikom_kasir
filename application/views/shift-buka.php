<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Buka Shift</h4>
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

<?php if ($this->session->userdata("shift_status") == "BUKA") {
	echo "<h1>ANDA TELAH MEMBUKA SHIFT</h1>";
} else { ?>
<div class="card shadow">
  <div class="card-body">
	<form action="<?= base_url("shift/buka")?>" method="post">
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">ID Kasir</label>
		<div class="col-8">
            <input type="text" name="ID_Kasir" value="<?php echo $kasir->ID_Kasir ?>" disabled class="form-control">
            <?php echo form_error('Nama_Barang', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Nama Kasir</label>
		<div class="col-8">
            <input type="text" name="Nama_Kasir" disabled value="<?php echo $kasir->NamaKasir ?>" class="form-control">
            <?php echo form_error('Nama_Kasir', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Saldo Awal</label>
		<div class="col-8">
            <input type="text" name="SaldoAwal" <?= $status?> value="<?= !empty($SaldoAwal) ?><?php echo set_value('SaldoAwal'); ?>" class="form-control">
            <?php echo form_error('SaldoAwal', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
    <div class="row">
    <div class="col-4">
    </div>
    <div class="col-8">
        <div class="d-flex justify-content-between">
            <button class="btn btn-lg btn-primary" <?= $status?> type="submit">SImpan</button>
        </div>
        </div>
        </div>
	</form>
  </div>

</div>
<?php } ?>