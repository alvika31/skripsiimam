<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = [
      'title' => 'Halaman Login'
    ];
    $this->load->view('auth/login', $data);
  }

  function login()
  {

    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $user = $this->Auth_model->get($username);
    if (empty($user)) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      <span style="color:white">Username Tidak Ditemukan</span>
     </div>');
      redirect('auth');
    } else {
      if ($password == $user->password) {
        $session = array(
          'authenticated' => true,
          'id_pegawai' => $user->id_pegawai,
          'nama_lengkap' => $user->nama_lengkap,
          'username' => $user->username,
          'user_type' => $user->user_type,
          'umur' => $user->umur,
          'image' => $user->image,
          'kode_pegawai' => $user->kode_pegawai,
          'jabatan' => $user->jabatan,
          'tgl_lahir' => $user->tgl_lahir,
          'tempat_lahir' => $user->tempat_lahir,
          'jenis_kelamin' => $user->jenis_kelamin,
          'status' => "login",
          'is_login' => true
        );
        $this->session->set_userdata($session);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <span style="color:white">Harap Masukan Password Yang Benar</span>
       </div>');
        redirect('auth');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }

  public function myProfile()
  {
    $data = [
      'title' => 'Halaman My Profile'
    ];

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('auth/profile', $data);
    $this->load->view('layout/footer');
  }

  public function blocked()
  {

    $data = [
      'title' => 'Halaman Blocked'
    ];

    $this->load->view('layout/header', $data);
    $this->load->view('layout/sidebar');
    $this->load->view('auth/block', $data);
    $this->load->view('layout/footer');
  }

  function cara_absen()
  {

    $data = [
      'title' => 'Cara Melakukan Absensi'
    ];
    $this->load->view('layout/header', $data);
    $this->load->view('auth/caraabsen');
    $this->load->view('layout/footer');
  }
}
