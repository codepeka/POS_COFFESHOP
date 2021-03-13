let save_method; //for save method string
let table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#myTable').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "LaporanPenjualan/ajax_list",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });

});

 
function detail(id) {
 	// $('#titleModal').text("Detail Penjualan"); // Set title to Bootstrap modal title
  //   $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded

    //Ajax Load data from ajax
    $.ajax({
        url : "LaporanPenjualan/ajax_detail/" + id,
        type: "GET",
        cache: false,
        success: function(data)
        {
            $('#titleModal').text("Detail Penjualan"); // Set title to Bootstrap modal title
        	$('#showDataModal').html(data);
            $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}
 
function reload_table() {
    table.ajax.reload(null,false); //reload datatable ajax 
}


$(document).ready(function(){

    firstMassage();

	// pesan pertama yang akan tampil di jumbotron
	function firstMassage() {
		let html = `<div class="text-center" id="firstMassage">
	                	<h1 style="color: #6777ef">Data Laporan Penjualan</h1>
	                	<h5>Pilih tanggal sesuai dengan data laporan yang ingin anda lihat.</h5>
	                </div>`;
	    $('#showData').html(html);
	}
	

	// mencari data berdasarkan bulan
	$('#searchDate').on('click', function(){
	// function detail(id){
		// console.log(111);
		let tgl_mulai = $('#tglMulai').val();
		let tgl_akhir = $('#tglAkhir').val();
		if (tgl_mulai != '' && tgl_akhir != '') {
		    $.ajax({
		        type  : 'GET',
		        url   : 'LaporanPenjualan/searchByDate/' + tgl_mulai + '/' + tgl_akhir,
        		cache: false,
		        beforeSend: function() {
		        	$('#showData').html(`<div class="text-center"><h1 style="color: #ff9800">Loading...</h1></div>`);
		        },
		        success : function(data){
		            let html;
		            html = `<a href="javascript:void(0)" class="btn btn-primary mb-4" onclick="cetak('${tgl_mulai}', '${tgl_akhir}')"><i class="fa fa-print"></i>  Cetak Laporan Ini</a>
					          <div class="table-responsive">
					            <table class="table table-bordered">
					              <thead>
					                <tr>
					                  <th class="text-center no"> # </th>
					                  <th>ID NOTA</th>
					                  <th>Kasir</th>
					                  <th>Tanggal</th>
					                  <th>Nama Barang</th>
					                  <th>Jumlah Barang</th>
					                  <th>Harga Barang</th>
					                </tr>
					              </thead>
					              <tbody>`;
		            html += data;
		            html += `</tbody>
				            </table>
				          </div>`;

		            if (data == '') {
			        	html = `<div class="text-center">
				                	<h1 style="color: #e83e8c">Data Kosong</h1>
				                	<h5>Tanggal <strong style="color: #6777ef">${tgl_mulai}</strong> Sampai <strong style="color: #6777ef">${tgl_akhir}</strong> tidak ada laporan barang keluar / penjualan.
				                	</h5>
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
function cetak(tgl_mulai, tgl_akhir) {
  window.open("LaporanPenjualan/cetak/" + tgl_mulai + '/' + tgl_akhir, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=100,width=900,height=460");
}
