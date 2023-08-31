<main class="main-content position-relative border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="card" style="padding: 30px">
        <?php echo $this->session->flashdata('pesan'); ?>
        <?php echo form_open_multipart('admin/editPegawai'); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" value="<?php echo $this->session->userdata('id_pegawai'); ?>" name="id_pegawai">
              <label>Nama Lengkap</label>
              <input type="text" readonly class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $this->session->userdata('nama_lengkap'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input type="text" readonly class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" value="<?php echo $this->session->userdata('username'); ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Usertype</label>
              <div class="input-group mb-4">
                <select readonly name="user_type" class="form-control">
                  <option value="<?php echo $this->session->userdata('user_type'); ?>"><?php echo $this->session->userdata('user_type'); ?></option>

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Umur</label>
              <input readonly type="text" class="form-control" id="exampleFormControlInput1" placeholder="Umur" name="umur" value="<?php echo $this->session->userdata('umur'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Photo</label><br>
              <img src="<?= base_url() . '/upload/' . $this->session->userdata('image'); ?>" width="100px"><br>


            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Pegawai</label>
              <input readonly type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Pegawai" name="kode_pegawai" value="<?php echo $this->session->userdata('kode_pegawai'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Jabatan</label>
              <input readonly type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jabatan" name="jabatan" value="<?php echo $this->session->userdata('jabatan'); ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-date-input" class="form-control-label">Tanggal Lahir</label>
              <input readonly class="form-control" type="date" value="<?php echo $this->session->userdata('tgl_lahir'); ?>" id="example-date-input" name="tgl_lahir">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input readonly type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $this->session->userdata('tempat_lahir'); ?>" placeholder="Tempat Lahir" name="tempat_lahir">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
              <select readonly name="jenis_kelamin" class="form-control">
                <option value="<?php echo $this->session->userdata('jenis_kelamin'); ?>"><?php echo $this->session->userdata('jenis_kelamin'); ?></option>

              </select>
            </div>
          </div>
          <div class="col-md-6">

          </div>
        </div>

        <a href="<?= site_url('absensi') ?>" class="btn bg-gradient-danger">Back</a>
        <button type="button" data-bs-toggle="modal" style="width: 200px" data-bs-target="#staticBackdrop" class="btn bg-gradient-primary ms-3">Ganti Password</button>


        </form>
        <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open('admin/changePassword'); ?>
                <div class="form-group">
                  <input type="hidden" name="id_pegawai" value="<?php echo $this->session->userdata('id_pegawai'); ?>">
                  <label for="exampleFormControlInput1">New Password</label>
                  <input type="password" name="password" class="form-control" id="myInput">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" onclick="myFunction()">
                  <label class="form-check-label" for="defaultCheck1">
                    Show Password
                  </label>
                </div>
                <input type="submit" value="Ganti Password" class="btn btn-success mt-2">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</main>
<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>