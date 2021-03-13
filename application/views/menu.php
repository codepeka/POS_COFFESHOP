<script type="text/javascript">const base_url = '<?php echo base_url(); ?>';</script>
<script src="<?= base_url('assets/js/jquery.maskMoney.min.js'); ?>"></script>
<script src="<?= base_url('assets/action/menue.js'); ?>"></script>


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
              <i class="fas fa-plus"></i> Tambah Data Menu 
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
                    <th>Nama Menu</th>
                    <th>Ketegori</th>
                    <th>Harga Jual</th>
                    <th>Tanggal Buat</th>
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
        <h5 class="modal-title" id="titleModal">Data Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" novalidate="" id="myForm" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nmMenu">Nama Menu</label>
            <input type="hidden" name="idne" id="idne" value="1">
            <input type="text" class="form-control" name="nmMenu" id="nmMenu" required="">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Nama Menu Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="photo">Foto Menu</label>
            <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
            <div id="imgShow" class="d-flex justify-content-center"></div>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <!-- <div class="invalid-feedback"> Nama Menu Wajib Diisi! </div> -->
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" name="kategori" id="kategori" required="">
              <option value="makanan">Makanan</option>
              <option value="minuman">Minuman</option>
            </select>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Kategori Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label for="hrgJual">Harga Jual</label>
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Rp.</span>
              </div>
              <input type="text" class="form-control uang" name="hrgJual" id="hrgJual" required="">
            </div>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Harga Jual Wajib Diisi! </div>
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

<script type="text/javascript">
// Eksekusi Menampilkan Gambar yang dipilih
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // $('#imgShow').attr('src', e.target.result);
            $('#imgShow').html(`<img src='${e.target.result}' width="100%" class="mt-2">`);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#imgShow').html('');
    }
}

// Memanggil function Menampilkan Gambar yang dipilih
$('#photo').change(function() {
    readURL(this);
});
</script>