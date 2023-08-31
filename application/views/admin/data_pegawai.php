<main class="main-content position-relative border-radius-lg ">

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col">

        <!-- Button trigger modal -->
        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" style="width: 200px" data-bs-target="#exampleModal">
          Tambah Pegawai
        </button>
        <?php echo validation_errors(); ?>

        <?php echo $this->session->flashdata('pesanGagal'); ?>
        <?php echo $this->session->flashdata('pesan'); ?>
        <?php echo $this->session->flashdata('msgSuc'); ?>
        <?php echo $this->session->flashdata('msgFai'); ?>





        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pegawai</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode Pegawai</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pas Poto</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kelamin</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role Akun</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                </tr>
                <?php $i = 1;
                foreach ($users as $user) { ?>
              </thead>
              <tbody>

                <tr>
                  <td>
                    <div class="my-auto">
                      <h6 class="mb-0 text-xs"> <?= $i++ ?></h6>
                    </div>
                  </td>
                  <td>
                    <div class="my-auto">
                      <h6 class="mb-0 text-xs"> <?= $user->nama_lengkap ?></h6>
                    </div>
                  </td>
                  <td>
                    <div class="my-auto">
                      <h6 class="mb-0 text-xs"> <?= $user->kode_pegawai ?></h6>
                    </div>

                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center">
                      <img style="border-radius: 50%;" src="<?= base_url() . '/upload/' . $user->image ?>" width="50px" height="50px">

                    </div>
                  </td>

                  <td>
                    <div class="my-auto">
                      <h6 class="mb-0 text-xs"> <?= $user->username ?></h6>
                    </div>
                  </td>
                  <td>
                    <div class="my-auto">
                      <h6 class="mb-0 text-xs"> <?= $user->jenis_kelamin ?></h6>
                    </div>
                  </td>
                  <td>
                    <div class="my-auto">
                      <?php if ($user->user_type == "Admin") { ?>
                        <h6 class="mb-0 text-xs"> <span class="badge bg-gradient-primary"> HRD</span></h6>
                      <?php } else { ?>
                        <h6 class="mb-0 text-xs"> <span class="badge bg-gradient-danger"> <?= $user->user_type ?></span></h6>
                      <?php } ?>
                    </div>
                  </td>
                  <td>
                    <a href="<?= site_url('admin/detail/' . $user->id_pegawai) ?>" title="Detail User" class="btn btn-info btn-sm" style="padding: 10px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                      </svg>
                    </a>
                    <a href="<?= site_url('admin/delete/' . $user->id_pegawai) ?>" title="Delete User" class="btn btn-danger btn-sm" style="padding: 10px" onclick="return confirm('Apakah Mau Menghapus Akun <?= $user->nama_lengkap ?> ?')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                      </svg>
                    </a>
                    <a href="<?= site_url('admin/edit/' . $user->id_pegawai) ?>" title="Edit User" class="btn btn-success btn-sm" style="padding: 10px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg>
                    </a>
                  </td>


                </tr>
              <?php } ?>

              </tbody>
            </table>
          </div>
        </div>



        <!-- Modal tambah data -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('admin/add'); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group mb-4">
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Usertype</label>
                      <div class="input-group mb-4">
                        <select name="user_type" class="form-control">
                          <option value="Admin">HRD</option>
                          <option value="Karyawan">Karyawan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Umur" name="umur" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Upload gambar</label>
                      <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Pegawai" name="kode_pegawai" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jabatan" name="jabatan" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-date-input" class="form-control-label">Tanggal Lahir</label>
                      <input class="form-control" type="date" value="2018-11-23" id="example-date-input" name="tgl_lahir" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tempat Lahir" name="tempat_lahir" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control">
                        <option value="Pria">Pria</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">

                  </div>
                </div>
                <input type="submit" class="btn bg-gradient-secondary" value="Simpan">

                </form>
                <div class="modal-footer">

                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Modal End Add -->


      </div>
    </div>
  </div>
</main>