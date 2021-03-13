<!-- <script src="<?= base_url('assets/action/user.js'); ?>"></script> -->

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>
  <div class="card">
    <!-- <div class="card-header">
      <h4 style="font-size: 30px">Selamat Datang, <?= $this->session->userdata('name'); ?></h4>
    </div> -->
    <div class="card-body">
    <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
          <div class="alert-title">Selamat Datang, <?= $this->session->userdata('name') ?></div>
          Selamat berkerja dan jangan lupa tersenyum. <br>
          Have a nice day.
        </div>
      </div>
    </div>
    <div class="card-footer bg-whitesmoke">
      Kerja, Kerja, Kerja.
    </div>
  </div>
</section>