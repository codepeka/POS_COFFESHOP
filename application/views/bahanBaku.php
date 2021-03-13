<!-- <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css"> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> -->
<script src="<?= base_url('assets/js/jquery.maskMoney.min.js'); ?>"></script>
<script src="<?= base_url('assets/action/bahanBaku.js'); ?>"></script>

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h4>Basic DataTables</h4> -->
            <button type="button" class="btn btn-primary daterange-btn icon-left btn-icon tambah" onclick="tambah()">
              <i class="fas fa-plus"></i> Tambah Data Bahan Baku
            </button>
            <button class="btn btn-icon icon-left btn-info ml-2" onclick="reload_table()">
              <i class="fas fa-sync"></i> Refresh
            </button>
          </div>
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th class="text-center"> # </th>
                    <th>Bahan Baku</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="showData">
                  
                </tbody>
              </table>
            <!-- penutup tabelnya -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modalnya -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Data Masuk Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" novalidate="" id="myForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="bahanBaku">Bahan Baku : </label>
            <input type="hidden" name="idne" id="idne"> 
            <textarea class="form-control" name="bahanBaku" id="bahanBaku" style="height: 120px" required=""></textarea>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Barang Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="totalHarga">Total Harga : </label>
            <div class="input-group flex-nowrap">
      			  <div class="input-group-prepend">
      			    <span class="input-group-text" id="addon-wrapping">Rp.</span>
      			  </div>
              <input type="text" class="form-control uang" name="totalHarga" id="totalHarga" required="">
            </div>
              <!-- Validation -->
              <div class="valid-feedback"> Good job! </div>
              <div class="invalid-feedback"> Harga Barang Wajib Diisi! </div>
              <!-- End Validation -->
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- penutup ModalNya -->

