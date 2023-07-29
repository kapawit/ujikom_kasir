<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Tambah Transaksi</h4>
		<h5>Login Sebagai : <?=$this->session->userdata('Nama_Kasir')?></h5>
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
	<div class="row">
	<div class="col-6">
		<div class="card h-100">
			<div class="card-body">
			<form action="<?= base_url("penjualan/add_cart")?>" method="post">
			<input type="hidden" name="Nama_Barang" id="Nama_Barang">
			<div class="form-group row">
			<label class="form-label col-4" for="inputEmail">Nama Barang</label>
				<div class="col-8">
				<select name="ID_Barang" class="form-control" style="width:100%" id="nama-barang">
					<option value="#">---Pilih Barang---</option>
					<?php foreach ($barang as $key => $bar) { ?>
						<option value="<?php echo $bar->ID_barang; ?>"><?php echo $bar->Nama_Barang; ?></option>
					<?php }?>
				</select>
				<?php echo form_error('ID_Barang', '<div class="error text-danger">', '</div>'); ?>
			</div>
			</div>
			<div class="form-group row">
			<label class="form-label col-4" for="inputEmail">Harga Satuan</label>
			<div class="col-8">
				<input type="text" name="HargaSatuan" readonly id="HargaSatuan" class="form-control">
				<?php echo form_error('HargaSatuan', '<div class="error text-danger">', '</div>'); ?>
			</div>
			</div>
			<div class="form-group row">
			<label class="form-label col-4" for="inputEmail">Kuantitas</label>
			<div class="col-4">
				<input type="text" name="Kuantitas" value="<?php echo set_value('Kuantitas'); ?>" class="form-control">
				<?php echo form_error('Kuantitas', '<div class="error text-danger">', '</div>'); ?>
			</div>
			<div class="col-4">
				<input type="text" name="satuan" disabled value="-" id="satuan" class="form-control">
			</div>
			</div>
		<div class="row">
		<div class="col-4">
		</div>
		<div class="col-8">
			<div class="d-flex justify-content-between">
				<a class="btn btn-secondary" href="<?= base_url("penjualan/clear_cart")?>">Reset</a>
				<button class="btn btn-primary" type="submit">Tambahkan</button>
			</div>
			</div>
		</div>
		</form>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url("penjualan/save_penjualan")?>" method="post">
				<table class="table table-stripped">
					<tr class="bg-warning">
						<td><h5>Total Harga </h5></td>
						<td class="text-right">
							<input type="text" readonly id="total" class="form-control" name="Total" value="<?php echo $this->cart->total(); ?>">
						</td>
					</tr>
					<tr>
						<td><h5>Bayar </h5></td>
						<td class="text-right">
							<input type="text" name="bayar" id="bayar" class="form-control">
						</td>
					</tr>
					<tr class="bg-secondary text-white">
						<td><h5>Kembali </h5></td>
						<td class="text-right">
							<input type="text" readonly id="result" class="form-control">
						</td>
					</tr>
				</table>
				<div class="d-flex justify-content-end">
					<button class="btn btn-lg btn-success" type="submit">BAYAR</button>
				</div>
				</form>
			</div>
	</div>
	</div>
	<div class="container mt-4">
	<table class="table table-bordered">
		<thead>
				<th>Id</th>
				<th>QTY</th>
				<th>Nama Barang</th>
				<th style="text-align:right">Harga Satuan</th>
				<th style="text-align:right">Sub-Total</th>
				<th>Aksi</th>
		</thead>

		<?php $i = 1; ?>
		<?php foreach ($this->cart->contents() as $items): ?>
				<tr>
					<td><?= $i++;?></td>
                <td>
					<?php echo $items['qty']; ?>
				</td>
                <td>
                    <?php echo $items['name']; ?>
                </td>
                <td style="text-align:right">Rp.<?php echo $items['price']; ?></td>
                <td style="text-align:right">Rp.<?php echo $items['subtotal']; ?></td>
				<td>
					<a class="btn btn-sm btn-danger" href="<?= base_url("penjualan/delete_cart/".$items['rowid'])?>">x</a>
				</td>
        </tr>
		<?php $i++; ?>
		<?php endforeach; ?>
</table>

	</div>

<script>
document.getElementById('bayar').addEventListener('input', calculateKembalian);

function calculateKembalian() {
    const totalHarga = parseFloat(document.getElementById('total').value);
    const bayar = parseFloat(document.getElementById('bayar').value);
    let kembalian = bayar - totalHarga;
    document.getElementById('result').value = kembalian;
}

$(document).ready(function() {
	$('#nama-barang').select2();
	
	$('#nama-barang').on('select2:select', function (e) {
        let data = e.params.data;
        $.ajax({
            url: '<?= base_url("barang/ajax_get_barang") ?>',
            type: 'POST',
            data: JSON.stringify({ 'id': data.id }),
            contentType: 'application/json',
            success: function(response) {
				data = JSON.parse(response)
                $("#satuan").val(data.Satuan);
                $("#HargaSatuan").val(data.HargaSatuan);
                $("#Nama_Barang").val(data.Nama_Barang);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

});
</script>