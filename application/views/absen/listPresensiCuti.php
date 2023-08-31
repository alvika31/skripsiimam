<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="width:100%; padding-top: 30px;padding-bottom: 30px">
                    <h3 class="text-center mb-4">Data Presensi Cuti</h3>
                    <table class="table align-items-center mb-1">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Pegawai</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                            </tr>
                            <?php $i = 1;
                            foreach ($presensi_cuti as $cuti) {
                                $tanggal = date('Y-m-d', strtotime($cuti->tgl_absen));
                            ?>

                                <tr>
                                    <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2 "><?= $i++ ?></td>
                                    <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2 "><?= $cuti->nama_lengkap ?></td>
                                    <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2 ">
                                        <?=tanggal_indo($tanggal, TRUE) ?></td>
                                    </td>
                                    <td class="align-middle text-xs text-uppercase font-weight-bolder ps-2 "><span class="badge bg-warning"><?= $cuti->keterangan_absen ?></span></td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>

                </div>

            </div>
        </div>
    </div>
</main>