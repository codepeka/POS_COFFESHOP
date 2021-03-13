<div class="ukuran">
  <?php 
  	$tokos = $this->db->get('setting', 0, 1)->result(); 
  	foreach ($tokos as $toko) {
  		echo '<h1 class="V-toko">'. $toko->nama_toko . '</h1>';
  	}
  ?>
  
  <h1 class="V-title">LAPORAN PENGELUARAN BAHAN BAKU</h1>
  <h3 class="V-tanggal">Bulan : <?= date('F Y', strtotime($date)) ?></h3>
  <table cellpadding="5" cellspacing="0" id="myTable" width="100%">
    <thead>
      <tr>
        <th class="text-center no"> No. </th>
        <th>Bahan Baku</th>
        <th width="100px" align="center">Tanggal</th>
        <th>Sub Total</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	  $no = 1;
    	  $totalHarga = 0;
    	  foreach ($dataID as $row): 
    	  $totalHarga += $row->total_harga;
		?>
    	<tr>
    	  <td class="text-center"><?= $no++; ?></td>
    	  <td><?= $row->bahan_baku; ?></td>
    	  <td class="text-center"><?= $row->tgl_ubah; ?></td>
    	  <td>Rp. <?= number_format($row->total_harga, 0,',' ,'.'); ?></td>
    	</tr>
    	<?php endforeach; ?>
    	<tr style="border: 1px border: 1px; background-color: #e6e6e6; font-weight: bold;">
  		<td class="text-right" colspan="3">Total Harga : </td>
  		<td>Rp. <?= number_format($totalHarga, 0,',' ,'.'); ?></td>
  	</tr>
    </tbody>
  </table>
</div>

<style type="text/css">
	* { font-family: sans-serif; }
	.v-toko { font-family: fantasy; margin: 0; }
	.v-title { font-family: monospace; margin: 0; }
	.v-tanggal { font-family: cursive; margin-top: 0; }
	.ukuran {
		width: 210mm;
		text-align: center;
		margin: 20px auto;
	}
	#myTable, th, td {
		border: 1px solid #333;
	} 
	.text-right { text-align: right; }
	.text-center { text-align: center; }
	.text-left { text-align: left; }
</style>

<script type="text/javascript">
	window.print();
</script>