<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <?php if ($this->session->userdata('user_type') == 'Admin') { ?>
            <div class="row mb-4">

                <div class="col-md-3">
                    <a href="<?= site_url('absensi/dataTepatWaktu') ?>">
                        <div class="card bg-gradient-success text-white p-3">
                            <h6 class="text-white font-weight-bold">Tepat Waktu</h6>
                            <p><?php
                                $tanggal = date('Y-m-d');
                                ?>
                                <?= tanggal_indo($tanggal, true) ?></p>
                            <h1 class="mt-4 text-white"><?= $tepatwaktu ?></h1>Orang
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= site_url('absensi/dataPresensiTelat') ?>">
                        <div class="card bg-gradient-danger text-white p-3">
                            <h6 class="text-white font-weight-bold">Telat</h6>
                            <p>
                                <?= tanggal_indo($tanggal, true) ?></p>
                            <h1 class="mt-4 text-white"><?= $telat ?></h1>Orang
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-3">
                    <a href="<?= site_url('absensi/dataSakit') ?>">
                        <div class="card bg-gradient-warning text-white p-3">
                            <h6 class="text-white font-weight-bold">Sakit </h6>
                            <p><?php
                                setlocale(LC_ALL, 'id-ID', 'id_ID');
                                ?>
                                <?= tanggal_indo($tanggal, true) ?></p>
                            <h1 class="mt-4 text-white"><?= $presensi_sakit ?></h1>Orang
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= site_url('Absensi/dataCuti') ?>">
                        <div class="card bg-gradient-danger text-white p-3">
                            <h6 class="text-white font-weight-bold">Cuti </h6>
                            <p><?php
                                setlocale(LC_ALL, 'id-ID', 'id_ID');
                                ?>
                                <?= tanggal_indo($tanggal, true) ?></p>
                            <h1 class="mt-4 text-white"><?= $presensi_cuti ?></h1>Orang
                        </div>
                </div> -->
                <!-- <div class="col-md-3">
                    <a href="<?= site_url('absensi/dataBelumPresensi') ?>">
                        <div class="card bg-gradient-warning text-white p-3">
                            <h6 class="text-white font-weight-bold">Belum Presensi </h6>
                            <p><?php
                                setlocale(LC_ALL, 'id-ID', 'id_ID');
                                ?>
                               <?= tanggal_indo($tanggal, true) ?></p>
                            <h1 class="mt-4 text-white"><?= $belum_presensi ?></h1>Orang
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?= site_url('admin') ?>">
                        <div class="card bg-gradient-danger text-white p-3">
                            <h6 class="text-white font-weight-bold">Jumlah Pegawai </h6>
                            <p>CV. Asian Teknologi Inspira</p>
                            <h1 class="mt-4 text-white"><?= $jumlah_pegawai ?></h1>Orang
                        </div>
                </div> -->
                </a>
            </div>
        <?php } ?>
        <?php $tanggal = date('Y-m-d'); ?>
        <div class="row" style="margin-bottom: 50px">
            <div class="col text-center">
                <div class="card" style="width:100%; padding-top: 30px;padding-bottom: 30px">
                    <div class="card-body">
                        <img src="<?= base_url() . '/upload/logo.png' ?>" class="align-top" alt="..." width="150px">
                        <h3 class="card-subtitle mb-2 text-muted mt-3">Hallo, <?= $greeting ?> <?php echo $this->session->userdata('nama_lengkap'); ?></h3>
                        <marquee>
                            <p class="card-text">Jangan Lupa Isi Prensensi Tepat Waktu ya!</p>
                        </marquee>

                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">

            <div class="col d-block d-md-none">

                <div class="card  mb-5">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <b> Identitas Diri</b>
                        <hr>

                    </div>

                    <div class="card-body pt-3">
                        <div class="align-items-center">
                            <div class="col col-xs-12 align-self-start">
                                <img src="<?= base_url() . '/upload/' . $this->session->userdata('image'); ?>" class="align-top" alt="..." width="250px">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="name ps-3">
                                    <span>Nama Lengkap:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('nama_lengkap'); ?></small>
                                    </div>
                                    <span>Username:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('username'); ?></small>
                                    </div>
                                    <span>User Type:</span>
                                    <div class="stats">
                                        <span class="badge badge-pill bg-gradient-primary"><small><?php echo $this->session->userdata('user_type'); ?></small></span>
                                    </div>
                                    <span>Umur:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('umur'); ?></small>
                                    </div>
                                    <span>Kode Pegawai:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('kode_pegawai'); ?></small>
                                    </div>
                                    <span>Jabatan:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('jabatan'); ?></small>
                                    </div>
                                    <span>Tempat Tanggal Lahir:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('tempat_lahir'); ?>, <?php echo $this->session->userdata('tgl_lahir'); ?></small>
                                    </div>
                                    <span>Jenis Kelamin:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('jenis_kelamin'); ?></small>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col d-none d-md-block">

                <div class="card">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <b> Identitas Diri</b>
                        <hr>

                    </div>

                    <div class="card-body pt-3">
                        <div class="author align-items-center">
                            <div class="col col-xs-12 align-self-start">
                                <img src="<?= base_url() . '/upload/' . $this->session->userdata('image'); ?>" class="align-top" alt="..." width="150px">
                            </div>
                            <div class="col-8">
                                <div class="name ps-3">
                                    <span>Nama Lengkap:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('nama_lengkap'); ?></small>
                                    </div>
                                    <span>Username:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('username'); ?></small>
                                    </div>
                                    <span>User Type:</span>
                                    <div class="stats">
                                        <span class="badge badge-pill bg-gradient-primary"><small><?php echo $this->session->userdata('user_type'); ?></small></span>
                                    </div>
                                    <span>Umur:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('umur'); ?></small>
                                    </div>
                                    <span>Kode Pegawai:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('kode_pegawai'); ?></small>
                                    </div>
                                    <span>Jabatan:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('jabatan'); ?></small>
                                    </div>
                                    <span>Tempat Tanggal Lahir:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('tempat_lahir'); ?>, <?php echo $this->session->userdata('tgl_lahir'); ?></small>
                                    </div>
                                    <span>Jenis Kelamin:</span>
                                    <div class="stats">
                                        <small><?php echo $this->session->userdata('jenis_kelamin'); ?></small>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-md po">

                <div class="card">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <b> Presensi</b>
                        <hr>
                        <label class="display-6"> <?= tanggal_indo($tanggal, true) ?></label><br>
                        <label id="hours" class="display-6"><?= date('H') ?></label>:<label id="minutes" class="display-6"><?= date('i') ?></label>:<label id="seconds" class="display-6"><?= date('s') ?></label>
                    </div>


                    <div class="card-body pt-2">
                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["lat_absen"].value;
                                var b = document.forms["Form"]["long_absen"].value;
                                if (a == null || a == "", b == null || b == "") {
                                    alert("Silahkan Ijinkan Popup Lokasi");
                                    return false;
                                }
                            }
                        </script>

                        <a href="<?= site_url('absensi/lokasi') ?>" class="btn bg-gradient-primary">Isi Presensi</a>

                        <table border="0px">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <?php $i = 1;
                                foreach ($jam as $jam) { ?>
                                    <td><b><?= $jam->keterangan ?>:</b> </td>
                                    <td><?= $jam->start ?> - </td>
                                    <td><?= $jam->finish ?></td>

                            </tr>
                        <?php } ?>

                        </table>

                    </div>

                </div>
            </div>

        </div>



    </div>
    </div>
</main>





<script type="text/javascript">
    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert('Lokasi tidak support dibrowser anda');
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        document.getElementById('lat').value = lat;
        document.getElementById('long').value = long;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
</script>


<script>
    var hoursLabel = document.getElementById("hours");
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    setInterval(setTime, 1000);

    function setTime() {
        secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
        minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
        hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }

    <?php if (@$this->session->absen_needed) : ?>
        var absenNeeded = '<?= json_encode($this->session->absen_needed) ?>';
        <?php $this->session->sess_unset('absen_needed') ?>
    <?php endif; ?>
</script>

<script>
    function showLocationPopup() {
        // Periksa apakah browser mendukung Geolocation API
        if ("geolocation" in navigator) {
            // Dapatkan lokasi pengguna menggunakan Geolocation API
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var locationMessage = "Lokasi terkini Anda:\nLatitude: " + latitude + "\nLongitude: " + longitude;

                // Tampilkan hasil lokasi dalam pop-up
                alert(locationMessage);
            });
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }
    }
</script>