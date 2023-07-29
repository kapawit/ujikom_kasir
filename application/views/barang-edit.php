<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Edit barang</h4>
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
	<form action="<?= base_url("barang/add")?>" method="post">
		<div class="form-group row">
		<input type="hidden" name="ID_barang" value="<?php echo $barang->ID_barang?>">
		<label class="form-label col-4" for="inputEmail">Nama Barang</label>
		<div class="col-8">
            <input type="text" name="Nama_Barang" value="<?php echo set_value('Nama_Barang'); ?><?php echo $barang->Nama_Barang?>" class="form-control">
            <?php echo form_error('Nama_Barang', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Satuan</label>
		<div class="col-8">
            <input type="text" name="Satuan"  value="<?php echo set_value('Satuan'); ?><?php echo $barang->Satuan?>" class="form-control">
            <?php echo form_error('Satuan', '<div class="error text-danger">', '</div>'); ?>
		</div>
		</div>
		<div class="form-group row">
		<label class="form-label col-4" for="inputEmail">Harga Satuan</label>
		<div class="col-8">
            <input type="text" name="HargaSatuan" value="<?php echo set_value('HargaSatuan'); ?><?php echo $barang->HargaSatuan?>" class="form-control">
            <?php echo form_error('HargaSatuan', '<div class="error text-danger">', '</div>'); ?>
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