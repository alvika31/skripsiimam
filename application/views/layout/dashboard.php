<main class="main-content position-relative border-radius-lg ">

  <div class="container-fluid py-4">

    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <h3 class="font-weight-bolder text-black mb-0">Selamat Datang dihalaman Dashboard <?= $this->session->userdata('username'); ?></h3>
            <p>Anda Login Sebagai <?= $this->session->userdata('user_type'); ?></p>
            <p>Anda Login Sebagai <?= $this->session->userdata('jabatan'); ?></p>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>