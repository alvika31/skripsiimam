<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                            </svg>
                            Atur Jam Presensi
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Mulai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Selesai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($jam as $i => $j) : ?>
                                        <tr id="<?= 'jam-' . $j->id_jam ?>">
                                            <td>
                                                <h6 class="mb-0 text-xs"><?= ($i + 1) ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-xs"><?= $j->keterangan ?></h6>
                                            </td>
                                            <td class="jam-start">
                                                <h6 class="mb-0 text-xs"><?= $j->start ?></h6>
                                            </td>
                                            <td class="jam-finish">
                                                <h6 class="mb-0 text-xs"><?= $j->finish ?></h6>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('jam/edit/' . $j->id_jam) ?>" class="btn btn-primary btn-sm btn-edit-jam" data-jam="<?= base64_encode(json_encode($j)) ?>">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>