<?php

$id = $namaselect->id_pegawai;
$nama_lengkap = $namaselect->nama_lengkap;
?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row align-items-end">

            <div class="col-md-5 col-xs-12">
                <form action="<?= site_url('absensi/filter') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" style="color:white">Filter By Nama Karyawan</label>

                        <select name="id_pegawai" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($nama as $nama) { ?>

                                <option value="<?= $nama->id_pegawai ?>"> <?= $nama->nama_lengkap ?></option>

                            <?php }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="form-group">
                    <label for="exampleFormControlInput1" style="color:white">Bulan, Tahun Presensi</label>
                    <input type="month" name="tanggal" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col-2">
                <input type="submit" name="filter" class="btn bg-gradient-info" value="Filter Karyawan">
                </form>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-2 col-6">
                <a href="<?= site_url('absensi/delete_all') ?>" onclick="return confirm('Apakah Yakin Mau Menghapus Semua Data Absensi?')" name="filter" class="btn bg-gradient-danger">Delete All Data</a>
            </div>
            <div class="col-md-2 col-6">
                <a href="<?= site_url('absensi/export') ?>" name="filter" class="btn bg-gradient-warning">Export To PDF</a>
            </div>
        </div>




        <div class="row justify-content-center text-white my-3">
            <div class="col-md m-md-0 m-2 col">
                <div class="card bg-dark p-3">
                    Nama Karyawan:<br>
                    <b><?= $namaselect->nama_lengkap ?>
                    </b>
                </div>
            </div>
            <?php if (empty($inp)) { ?>
                <div class="col-md m-md-0 m-2 col">
                    <div class="card bg-success p-3">
                        Bulan Presensi:<br>
                        <b>Semua Tanggal</b>
                    </div>
                </div>

            <?php } else { ?>


                <div class="col-md m-md-0 m-2 col">
                    <div class="card bg-success p-3">
                        Bulan Presensi:<br>
                        <b><?= date('F, Y', strtotime($inp)) ?></b>
                    </div>
                </div>
                <div class="col-md m-md-0 m-2 col">
                    <div class="card bg-warning p-3">
                        Presensi Hadir:<br>
                        <b><?= $countPresensi ?></b>
                    </div>
                </div>
                <div class="col-md m-md-0 m-2 col">
                    <div class="card bg-danger p-3">
                        Sakit:<br>
                        <b><?= $countSakit ?></b>
                    </div>
                </div>
                <div class="col-md m-md-0 m-2 col">
                    <div class="card bg-info p-3">
                        Cuti:<br>
                        <b><?= $countCuti ?></b>
                    </div>
                </div>
            <?php } ?>
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
                                <?php if (empty($fil)) { ?>
                                    <h6 class="mb-0 text-xs"> <span class="badge badge-md bg-gradient-danger">Data Presensi Belum Ada</span></h6>

                                <?php } else { ?>
                                    <?php $i = 1;
                                    foreach ($fil as $fill) { ?>

                                        <?php $tanggal = date('Y-m-d', strtotime($fill->tgl_absen));
                                        $jam_pulang = $fill->status_absen;
                                        $jam = $fill->jam_absen;
                                        ?>

                                        <tr>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"> <?= $i++ ?></h6>
                                            </td>
                                            <?php
                                            setlocale(LC_ALL, 'id-ID', 'id_ID');

                                            ?>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"> <?= tanggal_indo($tanggal, true) ?></h6>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0 text-xs"> <?= $fill->username ?></h6>
                                            </td>
                                            <?php if ($fill->keterangan_absen == 'Sakit') { ?>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"> <span class="badge bg-gradient-danger">Sakit</span></h6>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"> <span class="badge bg-gradient-danger">Sakit</span></h6>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"> <span class="badge bg-gradient-danger">Sakit</span></h6>
                                                </td>

                                            <?php } elseif ($fill->keterangan_absen == 'Cuti') { ?>
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
                                                    <h6 class="mb-0 text-xs"><?= $fill->jam_absen ?></h6>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-xs"><?= $fill->jam_absen_pulang ?></h6>
                                                </td>
                                                <?php if ($fill->status_absen == 1) { ?>
                                                    <td class="align-middle">
                                                        <h6 class="mb-0 text-xs"><span class="badge bg-gradient-danger">Belum Presensi Pulang</span></h6>
                                                    </td>
                                                <?php } elseif ($fill->status_absen == 2) { ?>
                                                    <td class="align-middle">
                                                        <h6 class="mb-0 text-xs"><span class="badge bg-gradient-success">Sudah Presensi </span></h6>
                                                    </td>
                                            <?php }
                                            } ?>





                                            <td class="align-middle">
                                                <a href="<?= site_url('absensi/detailKehadiranPegawai/' . $fill->id_absen) ?>" class="btn btn-info btn-sm" style="padding: 10px" title="Detail Presensi">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                    </svg>
                                                </a>
                                                <a href="<?= site_url('absensi/deleteAbsensi/' . $fill->id_absen) ?>" class="btn btn-danger btn-sm" style="padding: 10px" title="Delete Presensi" onclick="return confirm('Apakah Yakin Mau Menghapus')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </a>
                                            </td>



                                        </tr>
                                <?php }
                                } ?>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>