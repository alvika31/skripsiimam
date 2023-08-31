<?php
$user_type = $pegawai['user_type'];
$jenis_kelamin = $pegawai['jenis_kelamin'];



?>

<main class="main-content position-relative border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="card" style="padding: 30px">

        <?php echo form_open_multipart('admin/editPegawai'); ?>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" value="<?= $pegawai['id_pegawai'] ?>" name="id_pegawai">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= $pegawai['nama_lengkap']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" value="<?= $pegawai['username']; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Password</label><br>
              <input type="password" class="form-control" id="myInput" placeholder="Password" name="password">
              <label class="text-danger">Note: Kosongkan field ini bila tidak ingin ganti password</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fcustomCheck1" onclick="myFunction()">
                <label class="custom-control-label" for="customCheck1">Show Password</label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Usertype</label>
              <div class="input-group mb-4">
                <select name="user_type" class="form-control">
                  <option value="Admin" <?= set_select('user_type', 'Admin', $user_type == 'Admin' ? TRUE : FALSE) ?>>Admin</option>
                  <option value="Karyawan" <?= set_select('user_type', 'Karyawan', $user_type == 'Karyawan' ? TRUE : FALSE) ?>>Karyawan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Umur</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Umur" name="umur" value="<?= $pegawai['umur']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <img src="<?= base_url() . '/upload/' . $pegawai['image'] ?>" width="100px"><br>
              <label>Upload gambar</label>
              <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Pegawai</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Pegawai" name="kode_pegawai" value="<?= $pegawai['kode_pegawai']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Jabatan</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jabatan" name="jabatan" value="<?= $pegawai['jabatan']; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-date-input" class="form-control-label">Tanggal Lahir</label>
              <input class="form-control" type="date" value="<?= $pegawai['tgl_lahir']; ?>" id="example-date-input" name="tgl_lahir">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $pegawai['tempat_lahir']; ?>" placeholder="Tempat Lahir" name="tempat_lahir">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control">
                <option value="Pria" <?= set_select('jenis_kelamin', 'Pria', $jenis_kelamin == 'Pria' ? TRUE : FALSE) ?>>Pria</option>
                <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan', $jenis_kelamin == 'Perempuan' ? TRUE : FALSE) ?>>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">

          </div>
        </div>
        <input type="submit" class="btn bg-gradient-secondary" value="Simpan" onclick="return confirm('Apakah Anda Yakin Mau merubah ?')">
        <a href="<?= site_url('admin') ?>" class="btn bg-gradient-danger">Back</a>

        </form>


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