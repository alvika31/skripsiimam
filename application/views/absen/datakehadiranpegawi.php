<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row align-items-end">
            <div class="col-md-5 col-xs-12">
                <form action="<?= site_url('absensi/filter') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" style="color:white">Filter By Nama Karyawan</label>

                        <select name="id_pegawai" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($nama as $nama) { ?>
                                <option value="<?= $nama->id_pegawai ?>"><?= $nama->nama_lengkap ?></option>

                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="form-group">
                    <label for="exampleFormControlInput1" style="color:white">Bulan, Tahun Presensi</label>
                    <input type="month" name="tanggal" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <input type="submit" name="filter" class="btn bg-gradient-info" value="Filter Karyawan">
                </form>
            </div>
        </div>
        <div class="container-fluid p-0 m-0">
            <div class="row">
                <div class="col-6 col-md-2">
                    <a href="<?= site_url('absensi/delete_all') ?>" onclick="return confirm('Apakah Yakin Mau Menghapus Semua Data Absensi?')" name="filter" class="btn bg-gradient-danger float-start">Delete All Data</a>
                </div>
                <div class="col-6 col-md-10">
                    <a href="<?= site_url('absensi/export') ?>" name="filter" class="btn bg-gradient-warning float-start">Export To PDF</a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px">


            <div class="col text-center">

                <div class="card" style="width:100%; padding-top: 30px;padding-bottom: 30px">
                    <?php echo $this->session->flashdata('psn'); ?>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>

                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pegawai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Presensi Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Presensi Pulang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Info Presensi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                                <?php foreach ($user as $users) { ?>
                                    <?php $tanggal = date('Y-m-d', strtotime($users->tgl_absen));
                                    $jam_pulang = $users->status_absen;
                                    $jam = $users->jam_absen;
                                    ?>

                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-xs"><?= $i++ ?></h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-xs"><?= tanggal_indo($tanggal, TRUE) ?></h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-xs"><?= $users->username ?></h6>
                                        </td>
                                        <?php if ($users->keterangan_absen == 'Sakit') { ?>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-danger">Sakit</span></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-danger">Sakit</span></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-danger">Sakit</span></h6>
                                            </td>

                                        <?php } elseif ($users->keterangan_absen == 'Cuti') { ?>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-warning">Cuti</span></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-warning">Cuti</span></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><span class="badge bg-gradient-warning">Cuti</span></h6>
                                            </td>
                                        <?php } else { ?>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><?= $users->jam_absen ?></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"><?= $users->jam_absen_pulang ?></h6>
                                            </td>
                                            <?php if ($users->status_absen == 1) { ?>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"><span class="badge bg-gradient-danger">Belum Presensi Pulang</span></h6>
                                                </td>
                                            <?php } elseif ($users->status_absen == 2) { ?>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"><span class="badge bg-gradient-success">Sudah Presensi </span></h6>
                                                </td>
                                        <?php }
                                        } ?>





                                        <td class="align-middle">
                                            <a href="<?= site_url('absensi/detailKehadiranPegawai/' . $users->id_absen) ?>" class="btn btn-info btn-sm" style="padding: 10px" title="Detail Absen">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </a>
                                            <a href="<?= site_url('absensi/deleteAbsensi/' . $users->id_absen) ?>" class="btn btn-danger btn-sm" style="padding: 10px" title="Delete Absensi" onclick="return confirm('Apakah Yakin Mau Menghapus')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg>
                                            </a>
                                        </td>



                                    </tr>
                                <?php } ?>
                            </thead>
                        </table>
                        <br>
                        <span class="badge badge-info"><?php echo $this->pagination->create_links(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>