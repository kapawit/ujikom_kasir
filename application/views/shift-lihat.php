<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>lihat Shift</h4>
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

<?php if ($this->session->userdata("status_shift") == "BUKA" || $this->session->userdata("status_shift") == "TUTUP") { ?>
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
            <input type="text" name="Nama_Kasir" disabled vaAlue="<?php echo $kasir->NamaKasir ?>" class="form-control">
            <?php echo form_error('Nama_Kasir', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Waktu Buka</label>
		<div class="col-8">
            <input type="text" name="WaktuBuka" disabled value="<?php echo $shift->WaktuBuka ?>" class="form-control">
            <?php echo form_error('WaktuBuka', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Saldo Awal</label>
		<div class="col-8">
            <input type="text" name="SaldoAwal" disabled value="<?php echo $shift->SaldoAwal ?>" class="form-control">
            <?php echo form_error('SaldoAwal', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Jumlah Penjualan</label>
		<div class="col-8">
			
            <input type="text" name="JumlahPenjualan" disabled value="<?php echo $penjualan->Total ?>" class="form-control">
            <?php echo form_error('JumlahPenjualan', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Saldo Akhir</label>
		<div class="col-8">
            <input type="text" name="SaldoAkhir" disabled value="<?php echo $penjualan->Total + $shift->SaldoAwal ?>" class="form-control">
            <?php echo form_error('SaldoAkhir', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Waktu Tutup</label>
		<div class="col-8">
            <input type="text" name="WaktuTutup" disabled value="<?php echo $shift->WaktuTutup ?>" class="form-control">
            <?php echo form_error('WaktuTutup', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
	</form>
  </div>

</div>
	<?php } else { ?>
		<div class="card">
		<div class="card-body">
			<h1>ANDA BELUM MEMBUKA SHIFT</h1>
		</div>
	</div>
<?php }?>