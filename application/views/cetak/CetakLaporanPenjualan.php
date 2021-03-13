<div class="ukuran">
  <?php 
  	$tokos = $this->db->get('setting', 0, 1)->result(); 
  	foreach ($tokos as $toko) {
  		echo '<h1 class="V-toko">'. $toko->nama_toko . '</h1>';
  	}
  ?>
  
  <h1 class="V-title">LAPORAN PENJUALAN</h1>
  <h3 class="V-tanggal">Tanggal : <?= date('d F Y', strtotime($date_start)) ?> sampai <?= date('d F Y', strtotime($date_finish)) ?></h3>
  <!-- tabelnya -->
  <table cellpadding="5" cellspacing="0" id="myTable" width="100%">
	<thead>
	  <tr>
	    <th class="text-center no"> # </th>
	    <th>ID Nota</th>
	    <th>Kasir</th>
	    <th>Tanggal</th>
	    <th>Nama Menu</th>
	    <th>Jumlah Menu</th>
	    <th>Harga Menu</th>
	  </tr>
	</thead>
	<tbody>
      <?php 
        $no = 1;
        $totalHarga = 0;
        $totDis = 0;
        foreach ($dataPuall as $row) {
			// left join antara pemesanan detail dan pemesanan
        	$this->db->select('a.id_pemesanan, b.nama_menu, a.jumlah_menu, a.harga_asli');
			$this->db->join('menu b', 'b.id_menu = a.id_menu', 'left');
			$this->db->from('pemesanan_detail a');
			$this->db->where('a.id_pemesanan', $row->id_pemesanan);
        	$dataDPI = $this->db->get();
 			$rowspan = $dataDPI->num_rows() + 2;  

        	echo '<tr>
			        <td rowspan="'. ($rowspan) .'">'. $no++ .'</td>
			        <td rowspan="'. $rowspan .'">NOTA-'. $row->id_pemesanan .'</td>
			        <td rowspan="'. $rowspan .'">'. $row->nama.'</td>
			        <td rowspan="'. $rowspan .'">'. $row->tgl_ubah .'</td>
			      </tr>';
 			foreach ($dataDPI->result() as $r) {
            	echo '<tr>
                  	    <td>'. $r->nama_menu .'</td>
                  	    <td class="text-center">'. $r->jumlah_menu .'</td>
                  	    <td>Rp. '. number_format($r->harga_asli, 0,',' ,'.') .'</td>
                  	  </tr>';
                $totalHarga += $r->harga_asli;
            }
            echo '<tr style="background-color: #13ff9261;">
            		<td colspan="2" align="right">Diskon : </td>
            		<td colspan="1">Rp. '. number_format($row->diskon, 0,',' ,'.') .'</td>
            	  </tr>';
            	  $totDis += $row->diskon;
	    }
            echo '<tr style="border: 1px border: 1px; background-color: #e6e6e6; font-weight: bold;">
			      	<td class="text-right" colspan="6">Total Harga : </td>
			      	<td>Rp. '. number_format(($totalHarga - $totDis), 0,',' ,'.') .'</td>
			      </tr>'; 
	  ?>
    </tbody>
  </table>
  <!-- penutup tabelnya -->
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
	// window.print();
</script>