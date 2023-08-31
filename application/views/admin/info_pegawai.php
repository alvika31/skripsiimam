<main class="main-content position-relative border-radius-lg ">
    <?php $i = 1;
    foreach ($info as $infos) { ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">
                    <div class="row" style="padding: 30px">
                        <div class="col-sm-4 align-self-center"><img src="<?= base_url() . '/upload/' . $infos->image ?>" width="300px"></div>
                        <div class="col-sm-8 align-self-center">

                            <h2 class="text-capitalize">Informasi Pegawai</h1>
                                <p>Nama Lengkap: <?= $infos->nama_lengkap; ?></p>
                                <p>Username: <?= $infos->username; ?></p>
                                <?php if ($infos->user_type == "Admin") { ?>
                                    <p>Tipe User: <span class="badge bg-gradient-primary">HRD</span></p>
                                <?php } else { ?>
                                    <p>Tipe User: <span class="badge bg-gradient-danger"><?= $infos->user_type; ?></span></p>
                                <?php } ?>
                                <p>Umur: <?= $infos->umur; ?> Tahun</p>
                                <p>Kode Pegawai: <?= $infos->kode_pegawai; ?></p>
                                <p>Jabatan: <?= $infos->jabatan; ?></p>
                                <p>Tempat, Tanggal Lahir: <?= $infos->tempat_lahir; ?>, <?= $infos->tgl_lahir; ?></p>
                                <p>Jenis Kelamin: <?= $infos->jenis_kelamin; ?></p>

                                <a href="<?= site_url('admin') ?>" class="btn bg-gradient-danger">Back</a>




                        </div>
                    </div>




                <?php } ?>



                </div>
            </div>
        </div>
</main>