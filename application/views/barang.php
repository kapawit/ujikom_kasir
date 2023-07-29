<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Data barang</h4>
        <a class="btn btn-success" href="<?= base_url("barang/add")?>">Tambah Barang</a>
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
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Satuan</th>
      <th scope="col">Harga Satuan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1; 
  foreach ($barang as $bar): ?>
    <tr>
      <th scope="row"><?= $i++?></th>
      <td><?php echo $bar->Nama_Barang ?></td>
      <td><?php echo $bar->Satuan ?></td>
      <td><?php echo $bar->HargaSatuan ?></td>
      <td>
          <a class="btn btn-info" href="<?= base_url("barang/edit/").$bar->ID_barang?>">Edit</a>
          <a class="btn btn-danger" href="<?= base_url("barang/delete/").$bar->ID_barang?>">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>  </tbody>
</table>
</div>