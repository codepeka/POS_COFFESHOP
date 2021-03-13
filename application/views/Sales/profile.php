<script src="<?= base_url('assets/action/profile.js'); ?>"></script>

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>
</section>

<section class="section">
  <!-- Tabel Data Keseluruhan -->
  <div class="section-body">
    <div class="row">
      <div class="col-sm-12 col-xs-12 col-md-12">
        <!-- Form -->
		<form class="needs-validation" novalidate="" id="myForm" >
		  <div class="card" id="settings-card">
		    <div class="card-header">
		      <h4>Edit Profil</h4>
		    </div>
		    <div class="card-body">                          
		      <div class="form-group row align-items-center">
		        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama</label>
		        <div class="col-sm-6 col-md-9">
		          <input type="text" name="nama" class="form-control" id="nama" required>
		          <!-- Validation -->
                  <div class="valid-feedback"> Good job! </div>
                  <div class="invalid-feedback"> Nama Wajib Diisi! </div>
                  <!-- End Validation -->
		        </div>
		      </div>
		      <div class="form-group row align-items-center">
		        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Username</label>
		        <div class="col-sm-6 col-md-9">
		          <input type="text" name="username" class="form-control" id="username" required>
		          <!-- Validation -->
                  <div class="valid-feedback"> Good job! </div>
                  <div class="invalid-feedback"> Username Wajib Diisi! </div>
                  <!-- End Validation -->
		        </div>
		      </div>
		      <div class="form-group row align-items-center">
		        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Lama</label>
		        <div class="col-sm-6 col-md-9">
		          <input type="text" name="passLama" class="form-control" id="passLama" required>
		          <!-- Validation -->
                  <div class="valid-feedback"> Good job! </div>
                  <div class="invalid-feedback"> Password Lama Wajib Diisi! </div>
                  <!-- End Validation -->
		        </div>
		      </div>
		      <div class="form-group row align-items-center">
		        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Baru</label>
		        <div class="col-sm-6 col-md-9">
		          <input type="text" name="passBaru" class="form-control" id="passBaru" required>
		          <!-- Validation -->
                  <div class="valid-feedback"> Good job! </div>
                  <div class="invalid-feedback"> Password Baru Wajib Diisi! </div>
                  <!-- End Validation -->
		        </div>
		      </div>
		      <div class="form-group row align-items-center">
		        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Ulangi Password Baru</label>
		        <div class="col-sm-6 col-md-9">
		          <input type="text" name="ulangiPassBaru" class="form-control" id="ulangiPassBaru" required>
		          <!-- Validation -->
                  <div class="valid-feedback"> Good job! </div>
                  <div class="invalid-feedback"> Ulangi Password Baru Wajib Diisi! </div>
                  <!-- End Validation -->
		        </div>
		      </div>
		    </div>
		    <div class="card-footer bg-whitesmoke text-md-right">
		      <button class="btn btn-primary" id="btnSave" onclick="save()">Save Changes</button>
		    </div>
		  </div>
		</form>
		<!-- penutup form -->
      </div>
    </div>
  </div>
  <!-- End Tabel Data Keseluruhan -->
</section>


<!-- <form rumat="server">
	<input type="file" id="imgInp">
	<img id="imgShow" src="#" alt="your image" />
</form>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#imgShow').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#imgInp').change(function() {
		readURL(this);
	})
</script> -->