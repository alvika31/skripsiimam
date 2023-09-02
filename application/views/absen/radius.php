<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card" style="width:100%; padding-top: 30px;padding-bottom: 30px">
                    <h3 class="text-center mb-4">Data Radius Absen</h3>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-1">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kordinat</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($radius as $radius) {

                                ?>
                                    <tr>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2 "><?= $i++ ?></td>
                                        <td class="align-middle text-xs text-uppercase font-weight-bolder opacity-7 ps-2"><?= $radius->kordinat ?></td>
                                        <td>
                                            <a href="<?= site_url('absensi/edit_radius/' . $radius->id_radius) ?>" class="btn btn-warning">Edit</a>

                                        </td>
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