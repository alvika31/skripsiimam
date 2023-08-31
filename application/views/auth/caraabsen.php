<!-- Navbar Light -->
<style>
    body {
  -ms-overflow-style: none; /* for Internet Explorer, Edge */
  scrollbar-width: none; /* for Firefox */
  overflow-y: scroll; 
}

body::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}
</style>
<nav
  class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
  <div class="container">
    <a class="navbar-brand" href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
      CV. Baraya Abdi Sadaya
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <div class="row">
          
          <div class="col-auto">
            <div class="bg-white border-radius-lg d-flex me-2">
              
            
              <a href="<?=site_url('auth')?>" class="btn bg-gradient-primary my-1 me-1">Login</a>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="row m-4">
    
        <div class="card p-4">
        <h4 class="text-center">Cara Melakukan Presensi di CV. Baraya Abdi Sadaya</h4>
        <hr>
            <div class="col-xs-6">
                <p> 1. Silahkan Masuk ke Halaman Login, lalu masukan username dan password yang sudah diberi oleh admin </p>
            </div>
            <div class="col-xs-6">
            <img src="<?= base_url() . '/upload/login.png'?>" width="500px">
            </div>
            <br>
            <div class="col-xs-6">
                <p> 2. Setelah Login berhasil izinkan notifikasi lokasi seperti di bawah ini.  </p>
            </div>
            <div class="col-xs-6">
            <img src="<?= base_url() . '/upload/cara.png'?>" width="500px">
            </div>
            <br>
            <div class="col-xs-6">
                <p> 3. Dan anda sudah bisa melakukan Absen, Silahkan Absen pada waktu yang ditentukan </p>
            </div>
            <div class="col-xs-6">
            <img src="<?= base_url() . '/upload/absen.png'?>" width="500px">
            </div>



            </div>
        
</div>
</div>
<!-- End Navbar -->
