<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Data Kasir</h4>
        <a class="btn btn-success" href="<?= base_url("kasir/add")?>">Tambah Kasir</a>
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
      <th scope="col">Username</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor HP</th>
      <th scope="col">Nomor KTP</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1; 
  foreach ($kasir as $kas): ?>
    <tr>
      <th scope="row"><?= $i++?></th>
      <td><?php echo $kas->Username ?></td>
      <td><?php echo $kas->NamaKasir ?></td>
      <td><?php echo $kas->Alamat ?></td>
      <td><?php echo $kas->NomorHP ?></td>
      <td><?php echo $kas->NomorKTP ?></td>
      <td>
          <a class="btn btn-info" href="<?= base_url("kasir/edit/").$kas->ID_Kasir?>">Edit</a>
          <a class="btn btn-danger" href="<?= base_url("kasir/delete/").$kas->ID_Kasir?>">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>  </tbody>
</table>
</div>