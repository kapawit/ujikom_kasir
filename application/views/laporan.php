<style media="screen">
  .noPrint{ 
    display: block; 
  }
  .yesprint{
    display: block !important;
    width: 100%;
  }
  </style>
<style media="print">
  .noPrint{
    display: none; 
  }
  .yesprint{
    display: block !important;
    width: 100%;
  }
</style>
<div class="container mt-5">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-between mb-3">
      <div>
        <h4>Laporan Penjualan</h4>
        <h5>Nama Kasir&#9;:  <?= $this->session->userdata('Nama_Kasir')?></h5>
        <h5>Tgl Cetak&#9;:  <?= date('Y-m-d H:i:s')?></h5>
      </div>
        <input style="height:50px;" class="btn btn-success noPrint" TYPE="button" onClick="window.print()" value="Cetak Laporan">
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
      <th width="20%" >Waktu Transaksi</th>
      <th width="30%">Total</th>
  </thead>
  <tbody>
  <?php
  $i = 1; 
  if(count($penjualan) > 0) { ?>
    <?php foreach ($penjualan as $val): ?>
      <tr>
        <th scope="row"><?= $i++?></th>
        <td><?php echo $val->WaktuTransaksi ?></td>
        <td><?php echo $val->Total ?></td>
      </tr>
      <?php endforeach; ?>  
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