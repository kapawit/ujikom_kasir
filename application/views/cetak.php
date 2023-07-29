<script>
  window.onload = function () {
    window.print();
  }
</script>
<div class="container mt-5">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-center mb-3">
      <div class="text-center">
        <h4>Struk Pembelian</h4>
        <h4>Minimarket</h4>
        <h5>Nama Kasir&#9;:  <?= $this->session->userdata('Nama_Kasir')?></h5>
        <h5>Tgl Cetak&#9;:  <?= date('Y-m-d H:i:s')?></h5>
      </div>
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
    <hr>
    <div class="yesprint">
<table class="table table-bordered">
  <thead>
      <th width="10%" >ID</th>
      <th width="20%" >Nama Barang</th>
      <th width="10%" >Kuantitas</th>
      <th width="10%">Satuan</th>
      <th width="20%" >Harga Satuan</th>
      <th width="30%">Sub Total</th>
  </thead>
  <tbody>
  <?php
  $i = 1; 
  $total = 0;
  if(count($barang) > 0) { ?>
    <?php foreach ($barang as $val): 
      $total += $val->Sub_Total;
      ?>
      <tr>
        <th scope="row"><?= $i++?></th>
        <td><?php echo $val->Nama_Barang ?></td>
        <td><?php echo $val->Kuantitas ?></td>
        <td><?php echo $val->HargaSatuan ?></td>
        <td><?php echo $val->Satuan ?></td>
        <td><?php echo $val->Sub_Total ?></td>
      </tr>
      <?php endforeach; ?>  
      <tr>
        <td colspan="5">
        </td>
        <td >
          <?= $total?>
        </td>
      </tr>
      <?php } else { ?>
      <tr>
        <td class="text-center" colspan="4">Data Tidak Ditemukan</td>
      </tr>
    <?php } ?>   
  </tbody>
</table>
</div>
</div>
</div>
</div>