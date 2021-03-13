$(document).ready(function(){
	firstMassage();

	// pesan pertama yang akan tampil di jumbotron
	function firstMassage() {
		let html = `<div class="text-center" id="firstMassage">
	                	<h1 style="color: #6777ef">Data Laporan Per Bulan</h1>
	                	<h5>Pilih bulan sesuai dengan data laporan yang ingin anda lihat. <br> Dengan cara klik ikon kalender.</h5>
	                </div>`;
	    $('#showData').html(html);
	}

	// mencari data berdasarkan bulan
	$('#searchMonth').on('keyup change', function(){
	// function detail(id){
		// console.log(111);
		let id = $(this).val();
		if (id != '') {
		    $.ajax({
		        type  : 'GET',
		        url   : 'LaporanBahanBaku/ajax_detail/' + id,
		        async : true,
		        dataType : 'json',
		        beforeSend: function() {
		        	$('#showData').html(`<div class="text-center"><h1 style="color: #ff9800">Loading...</h1></div>`);
		        },
		        success : function(data){
		        	let no = 1;
		            let totalHarga = 0;
			        let options = {month: 'long'};
					let today  = new Date(id);
		            let html = `<a href="javascript:void(0)" class="btn btn-primary mb-4" onclick="cetak('${id}')"><i class="fa fa-print"></i>  Cetak Laporan Bulan ${today.toLocaleDateString("id-ID", options)}</a>
		            	  <div class="table-responsive" id="showTable">
				                  <table class="table table-bordered" id="myTable">
				                    <thead>
				                      <tr>
				                        <th class="text-center no"> # </th>
				                        <th>Bahan Baku</th>
				                        <th>Tanggal</th>
				                        <th>Sub Total</th>
				                      </tr>
				                    </thead>
				                    <tbody>`;

		            for(let i=0; i<data.length; i++){
		                html += `<tr>
		                		  <td>${no++}</td>
					              <td>${data[i].bahan_baku}</td>
					              <td>${data[i].tgl_ubah}</td>
					              <td>Rp. ${new Intl.NumberFormat().format(data[i].total_harga)}</td>
					            <tr>`;
					    totalHarga += parseInt(data[i].total_harga);
		            }
		            html += `<tr style="border: 1px border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
		                    	<td class="text-right" colspan="3">Total Harga : </td>
		                    	<td>Rp. ${new Intl.NumberFormat().format(totalHarga)}</td>
		                    </tr>`;
					html += `</tbody>
			                </table>
			          	  </div>`;

			        if (data.length == 0) {
			        	html = `<div class="text-center">
				                	<h1 style="color: #e83e8c">Data Kosong</h1>
				                	<h5>Bulan <strong style="color: #6777ef">${today.toLocaleDateString("en-US", options)}</strong> tidak ada laporan barang masuk.</h5>
				                </div>`;
			        }

		            $('#showData').html(html);
		        }
		    });
		} else {
			firstMassage();
		}
	});

});


// Fungsi cetak laporan
function cetak(id) {
  window.open("LaporanBahanBaku/cetak/" + id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=100,width=900,height=460");
}