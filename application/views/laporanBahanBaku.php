<!-- <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> -->
<!-- <script src="<?= base_url('assets/js/jquery.maskMoney.min.js'); ?>"></script> -->
<script src="<?= base_url('assets/action/laporanBahanBaku.js'); ?>"></script>

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          	<div class="container">
              <div class="form-group row mb-0">
                <label class="col-sm-2 col-form-label">Bulan : </label>
                <div class="col-sm-10">
                  <input type="month" class="form-control" id="searchMonth">
                  <small class="form-text text-muted">
                  	Laporan per bulan, pilih bulan sesuai dengan data laporan yang ingin anda lihat. 
                    Dengan cara klik ikon kalender.
                  </small>
                </div>
              </div>
          	</div>
          </div>
          <div class="card-body">
          	<div class="jumbotron text-center" id="showData">
              <!-- Isi datanya dari Js -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style type="text/css">
  .jumbotron {
  	padding: 2rem 2rem;
  }

  .table {
  	border-radius: 5px; 
  	background-color: white; 
  	margin-bottom: 0;
  }

  .table .no {
  	width: 10px;
  }
</style>