<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card" style="width:100%; padding-top: 30px;padding-bottom: 30px">
                    <h3 class="text-center mb-4">Data Sudah Presensi Pulang</h3>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-1">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Pegawai</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jam Presensi Pulang</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($listPresensiPulang as $Pulang) {
                                    $tanggal = date('Y-m-d', strtotime($Pulang->tgl_absen));

                                ?>
                                    <tr>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2 "><?= $i++ ?></td>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2"><?= $Pulang->nama_lengkap ?></td>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2">
                                            <?= tanggal_indo($tanggal, true) ?></td>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2"><?= $Pulang->jam_absen_pulang ?></td>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2"> <a href="<?= site_url('absensi/detailKehadiranPegawai/' . $Pulang->id_absen) ?>" class="btn btn-info btn-sm" style="padding: 10px" data-toggle="tooltip" data-placement="top" title="Detail Absen">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </a></td>
                                    </tr>
                                <?php } ?>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>