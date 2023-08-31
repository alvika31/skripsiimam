<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Users_model');
		if ($this->session->userdata('status') != "login") {
			redirect("auth/login");
		}
	}

	public function index()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}


		$data = [
			'title' => 'Halaman Home',
			'users' => $this->Users_model->read()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('admin/data_pegawai', $data);
		$this->load->view('layout/footer', $data);
	}

	public function add()
	{


		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size']             = 5000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('pesanGagal', '<div class="alert alert-danger" role="alert">
					<strong style="color:white">Gambar Gagal Di Upload</strong>
				</div>');
			redirect('admin');
		} else {

			$image = $this->upload->data();
			$image = $image['file_name'];


			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'user_type' => $this->input->post('user_type'),
				'image' => $image,
				'umur' => $this->input->post('umur'),
				'kode_pegawai' => $this->input->post('kode_pegawai'),
				'jabatan' => $this->input->post('jabatan'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin')
			);
			$this->Users_model->addUser($data);
			// $this->db->insert('user', $data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					<strong style="color:white">User Berhasil ditambahkan!</strong>
					</div>');
			redirect('admin');
		}
	}

	public function detail($id_pegawai)
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$data = [
			'title' => 'Halaman Detail User',
			'info' => $this->Users_model->infoPegawai($id_pegawai)
		];


		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/info_pegawai', $data);
		$this->load->view('layout/footer');
	}

	public function delete($id_pegawai)
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$this->Users_model->delete($id_pegawai);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msgSuc', '<div class="alert alert-success" role="alert">
			<strong style="color:white">User Berhasil Dihapus!</strong>
			</div>');
		} else {
			$this->session->set_flashdata('msgFai', '<div class="alert alert-success" role="alert">
			<strong style="color:white">User Gagal Dihapus!</strong>
			</div>');
		}
		redirect('Admin');
	}

	public function edit($id_pegawai)
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$data = [
			'title' => 'Halaman Edit User',
			'pegawai' => $this->Users_model->getId($id_pegawai),

		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/edit_pegawai', $data);
		$this->load->view('layout/footer');
	}

	public function editPegawai()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$id_pegawai = $this->input->post('id_pegawai');
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$nama_lengkap = $this->input->post('nama_lengkap', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password');
			$user_type = $this->input->post('user_type', TRUE);
			$umur = $this->input->post('umur', TRUE);
			$kode_pegawai = $this->input->post('kode_pegawai', TRUE);
			$jabatan = $this->input->post('jabatan', TRUE);
			$tgl_lahir = $this->input->post('tgl_lahir', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);

			if ($password == "") {
				$data = array(
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'user_type' => $user_type,
					'umur' => $umur,
					'kode_pegawai' => $kode_pegawai,
					'jabatan' => $jabatan,
					'tgl_lahir' => $tgl_lahir,
					'tempat_lahir' => $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin
				);
			} else {
				$data = array(
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'password' => md5($password),
					'user_type' => $user_type,
					'umur' => $umur,
					'kode_pegawai' => $kode_pegawai,
					'jabatan' => $jabatan,
					'tgl_lahir' => $tgl_lahir,
					'tempat_lahir' => $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin
				);
			}



			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->update('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				<strong style="color:white">User Berhasil Di Edit!</strong>
				</div>');
			redirect('admin');
		} else {

			$image = $this->upload->data();
			$image = $image['file_name'];

			$nama_lengkap = $this->input->post('nama_lengkap', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password');
			$user_type = $this->input->post('user_type', TRUE);
			$umur = $this->input->post('umur', TRUE);
			$kode_pegawai = $this->input->post('kode_pegawai', TRUE);
			$jabatan = $this->input->post('jabatan', TRUE);
			$tgl_lahir = $this->input->post('tgl_lahir', TRUE);
			$tempat_lahir = $this->input->post('tempat_lahir', TRUE);
			$jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);


			if ($password == "") {
				$data = array(
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'user_type' => $user_type,
					'image' => $image,
					'umur' => $umur,
					'kode_pegawai' => $kode_pegawai,
					'jabatan' => $jabatan,
					'tgl_lahir' => $tgl_lahir,
					'tempat_lahir' => $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin
				);
			} else {
				$data = array(
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'password' => md5($password),
					'user_type' => $user_type,
					'image' => $image,
					'umur' => $umur,
					'kode_pegawai' => $kode_pegawai,
					'jabatan' => $jabatan,
					'tgl_lahir' => $tgl_lahir,
					'tempat_lahir' => $tempat_lahir,
					'jenis_kelamin' => $jenis_kelamin
				);
			}


			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->update('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					<strong style="color:white">User Berhasil Diedit!</strong>
					</div>');
			redirect('admin');
		}
	}

	function changePassword()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$password = $this->input->post('password');
		$data = [
			'password' => md5($password)
		];
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('user', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					<strong style="color:white">Password Berhasil Diganti!</strong>
					</div>');
		redirect('auth/myProfile');
	}
}
