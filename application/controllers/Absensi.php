<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Users_model');
		$this->load->model('Jam_model');
		$this->load->model('Auth_model');
		$this->load->model('Absensi_model');
		$this->load->helper('date');
		$this->load->library('Pdf');
		$this->jamMasuk = $this->db->get_where('jam', ['id_jam' => 8])->row_array();
		$this->jamPulang = $this->db->get_where('jam', ['id_jam' => 9])->row_array();
		$id_pegawai = $this->session->id_pegawai;
		date_default_timezone_set("Asia/jakarta");
		if (!$this->session->userdata('username')) redirect('auth/login');
	}

	public function index()
	{
		if (date("H") < 4) {
			$greet = 'Selamat Malam';
		} elseif (date("H") < 11) {
			$greet = 'Selamat Pagi';
		} elseif (date("H") < 16) {
			$greet = 'Selamat Siang';
		} elseif (date("H") < 18) {
			$greet = 'Selamat Sore';
		} else {
			$greet = 'Selamat Malam';
		}

		$now = date('H:i:s');
		$id_pegawai = $this->session->id_pegawai;

		setlocale(LC_ALL, 'id-ID', 'id_ID');

		$prensiMasuk = $this->Absensi_model->getSudahPresensiM();
		$jumlahPegawai = $this->Absensi_model->getJumlahPegawai();
		$presensiPulang = $jumlahPegawai - $prensiMasuk;


		$data = [

			'title' => 'Halaman Absensi',
			'absen' => $this->Absensi_model->absen_harian_user($this->session->userdata('id_pegawai'))->num_rows(),
			'pulang' => $this->Absensi_model->absen_harian_user_pulang($this->session->userdata('id_pegawai'))->num_rows(),
			'jam' => $this->Jam_model->get_all(),
			'jam_m' => $this->Jam_model->get_jam_masuk(),
			'jam_p' => $this->Jam_model->get_jam_pulang(),
			'greeting' => $greet,
			'user' => $this->Absensi_model->getUserbyIdd($id_pegawai)->result(),
			'sudah_presensiM' => $prensiMasuk,
			'sudah_presensiP' => $this->Absensi_model->getSudahPresensiP(),
			'belum_presensi' => $this->Absensi_model->countBelumPresensi(),
			'jumlah_pegawai' => $jumlahPegawai,
			'presensi_sakit' => $this->Absensi_model->getJumlahSakit(),
			'presensi_cuti' => $this->Absensi_model->getJumlahCuti()
		];






		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/index', $data);
		$this->load->view('layout/footer');
	}



	// public function absen()
	// {
	// 	$today = $this->get_today_date;
	// 	$jammasuk = $this->jamMasuk;
	// 	$jampulang = $this->jamPulang;
	// 	$absen_harian = $this->Absensi_model->absen_harian_user($this->session->userdata('id_pegawai'))->num_rows();


	// 	if ($this->input->post('masuk')) {

	// 		$data = [
	// 			'tgl_absen' => date('Y-m-d'),
	// 			'jam_absen' => date('H:i:s'),
	// 			'keterangan_absen' => $this->input->post('keterangan_absen'),
	// 			'lat_absen' => $this->input->post('lat_absen'),
	// 			'long_absen' => $this->input->post('long_absen'),
	// 			'id_pegawai' => $this->session->id_pegawai,
	// 			'status_absen' => 1

	// 		];
	// 		$result = $this->db->insert('absensi', $data);
	// 		if ($result == TRUE) {
	// 			$this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center text-white" role="alert">
	// 				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	// 				<div>
	// 				Selamat Absen Masuk Anda Sudah Dicatat
	// 				</div>
	// 			</div>');
	// 		} else {
	// 			$this->session->set_flashdata('pesan', '<div class="alert alert-warning d-flex align-items-center" role="alert">
	// 				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
	// 				<div>
	// 				Maaf, Data Anda Belum Dicatat
	// 				</div>
	// 			</div>');
	// 		}
	// 		redirect('absensi');
	// 	} elseif ($this->input->post('pulang')) {
	// 		$data = [

	// 			'jam_absen_pulang' => date('H:i:s'),
	// 			'status_absen' => 2


	// 		];
	// 		$id_absen = $this->input->post('id_absen');
	// 		$id_pegawai = $this->session->id_pegawai;

	// 		$this->db->where('tgl_absen', date('Y-m-d'));
	// 		$this->db->where('id_pegawai', $id_pegawai);
	// 		$result2 = $this->db->update('absensi', $data);

	// 		if ($result2 == TRUE) {
	// 			$this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center text-white" role="alert">
	// 				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
	// 				<div>
	// 				Selamat Absen Pulang Anda Sudah Dicatat
	// 				</div>
	// 			</div>');
	// 		} else {
	// 			$this->session->set_flashdata('pesan', '<div class="alert alert-warning d-flex align-items-center" role="alert">
	// 				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
	// 				<div>
	// 				Maaf, Data Anda Belum Dicatat
	// 				</div>
	// 			</div>');
	// 		}
	// 		redirect('absensi');
	// 	}
	// }

	public function absen()
	{
		if ($this->input->post('masuk')) {
			$config['upload_path']          = './selfie_karyawan/';
			$config['allowed_types']        = 'gif|jpg|JPG|png|PNG|jpeg|JPEG';
			$config['max_size']             = 5000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('selfie_absen')) {
				$this->session->set_flashdata('pesanGagal', '<div class="alert alert-danger" role="alert">
					<strong style="color:white">Gambar Gagal Di Upload</strong>
				</div>');
				redirect('absen/lokasi');
			} else {

				$image = $this->upload->data();
				$image = $image['file_name'];


				$data = array(
					'tgl_absen' => date('Y-m-d'),
					'jam_absen' => date('H:i:s'),
					'lat_absen' => $this->input->post('lat_absen'),
					'long_absen' => $this->input->post('long_absen'),
					'id_pegawai' => $this->session->id_pegawai,
					'status_absen' => 1,
					'selfie_absen' => $image
				);
				$result = $this->db->insert('absensi', $data);
				// $this->db->insert('user', $data);

				if ($result == TRUE) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center text-white" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						<div>
						Selamat Absen Masuk Anda Sudah Dicatat
						</div>
					</div>');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning d-flex align-items-center" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						<div>
						Maaf, Data Anda Belum Dicatat
						</div>
					</div>');
				}
				redirect('absensi');
			}
		}
	}

	public function lokasi()
	{

		$data = [
			'title' => 'Lokasi Anda'
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/lokasi', $data);
		$this->load->view('layout/footer');
	}

	public function dataKehadiran_byUser()
	{

		$id_pegawai = $this->session->id_pegawai;

		$this->load->library('pagination');

		$config['base_url'] = site_url('absensi/dataKehadiran_byUser');
		$config['total_rows'] = $this->db->count_all('absensi');
		$config['per_page'] = 10;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$data['i'] = $start + 1;



		$data = array(
			'title' => 'Data Kehadiran Anda',
			'user' => $this->Absensi_model->getUserbyId($id_pegawai, $limit, $start)->result(),
			'i' => $start + 1
		);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/datakehadiran', $data);
		$this->load->view('layout/footer');
	}

	public function dataKehadiran()
	{

		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$this->load->library('pagination');

		$config['base_url'] = site_url('absensi/dataKehadiran');
		$config['total_rows'] = $this->db->count_all('absensi');
		$config['per_page'] = 10;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$data['i'] = $start + 1;


		$data = array(
			'title' => 'Data Kehadiran Pegawai',
			'user' => $this->Absensi_model->getUserPegawai($limit, $start)->result(),
			'i' => $start + 1,
			'nama' => $this->db->get('user')->result()
		);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/datakehadiranpegawi', $data);
		$this->load->view('layout/footer');
	}

	public function detailKehadiran_byUser($id_absen)
	{

		$id_pegawai = $this->session->id_pegawai;
		$data = array(
			'title' => 'Data Detail Kehadiranku',
			'user' => $this->Absensi_model->getUserDetailId($id_absen, $id_pegawai)->result()
		);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/detailkehadiranuser', $data);
		$this->load->view('layout/footer');
	}
	public function detailKehadiranPegawai($id_absen)
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$data = array(
			'title' => 'Data Detail Kehadiran Anda',
			'user' => $this->Absensi_model->getUserDetailPegawai($id_absen)->result()
		);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/detailkehadiranPegawai', $data);
		$this->load->view('layout/footer');
	}

	public function filter()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}



		$id_pegawai = $this->input->post('id_pegawai');
		$tanggal = $this->input->post('tanggal');
		$vbulan = date("m", strtotime($tanggal));

		if ($this->input->post('tanggal') == '') {

			$data = [
				'title' => 'Halaman Filter Data Absensi',
				'nama' => $this->db->get('user')->result(),
				'fil' => $this->Absensi_model->filter_name($id_pegawai)->result(),
				'identitas' => $this->db->get('user')->row(),
				'inp' => $this->input->post('tanggal'),
				'namaselect' => $this->Absensi_model->select_name_filter($id_pegawai)->row()

			];
		} else {

			$data = [
				'title' => 'Halaman Filter Data Absensi',
				'nama' => $this->db->get('user')->result(),
				'fil' => $this->Absensi_model->filter_username($id_pegawai, $tanggal, $vbulan)->result(),
				'countPresensi' => $this->Absensi_model->countPresensi($id_pegawai, $tanggal, $vbulan),
				'countSakit' => $this->Absensi_model->countSakit($id_pegawai, $tanggal, $vbulan),
				'countCuti' => $this->Absensi_model->countCuti($id_pegawai, $tanggal, $vbulan),
				'identitas' => $this->db->get('user')->row(),
				'inp' => $this->input->post('tanggal'),
				'namaselect' => $this->Absensi_model->select_name_filter($id_pegawai)->row()
			];
		}


		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/filterkehadiranpegawi', $data);
		$this->load->view('layout/footer');
	}

	function deleteAbsensi($id_absen)
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}


		$this->Absensi_model->delete_absen($id_absen);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('psn', '<div class="alert alert-success" role="alert">
			<strong style="color:white">Data Absensi Berhasil Dihapus!</strong>
			</div>');
		} else {
			$this->session->set_flashdata('psn', '<div class="alert alert-success" role="alert">
			<strong style="color:white">Data Gagal Dihapus!</strong>
			</div>');
		}
		redirect('Absensi/dataKehadiran');
	}

	function export()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}


		$data = [
			'nama' => $this->db->get('user')->result(),
			'title' => 'Halaman Export PDF'
		];


		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('absen/export_absensi', $data);
		$this->load->view('layout/footer');
	}

	function do_export()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}
		$bulan = date_create($this->input->post('tanggal'));

		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DAFTAR PRESENSI CV. ASIAN TEKNOLOGI INSPIRA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(0, 7, date_format($bulan, 'F-Y'), 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pegawai', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Tanggal Absen', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Datang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Pulang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Status Kehadiran', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Latitude Maps', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Longtitude Maps', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);

		$id_pegawai = $this->input->post('id_pegawai');
		$tanggal = $this->input->post('tanggal');
		$vbulan = date("m", strtotime($tanggal));

		$no = 0;

		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
		$this->db->where('absensi.id_pegawai', $id_pegawai);
		$this->db->where('month(absensi.tgl_absen)', $vbulan);
		$this->db->where('year(absensi.tgl_absen)', $tanggal);
		$pegawai = $this->db->get()->result();

		$i = 1;
		foreach ($pegawai as $data) {
			$date = $data->tgl_absen;
			$pdf->Cell(10, 6, $i++, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->username, 1, 0);
			$pdf->Cell(40, 6, $date, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen_pulang, 1, 0);
			$pdf->Cell(40, 6, $data->keterangan_absen, 1, 0);
			$pdf->Cell(40, 6, $data->lat_absen, 1, 0);
			$pdf->Cell(40, 6, $data->long_absen, 1, 1);
		}
		$pdf->Output();
	}

	function do_export_staff()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}
		$bulan = date_create($this->input->post('tanggal'));



		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DAFTAR PRESENSI CV. ASIAN TEKNOLOGI INSPIRA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(0, 7, date_format($bulan, 'F-Y'), 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pegawai', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Tanggal Absen', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Datang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Pulang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Status Kehadiran', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Latitude Maps', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Longtitude Maps', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);

		$tanggal = $this->input->post('tanggal');
		$vbulan = date("m", strtotime($tanggal));

		$no = 0;

		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
		$this->db->where('month(absensi.tgl_absen)', $vbulan);
		$this->db->where('year(absensi.tgl_absen)', $tanggal);
		$this->db->order_by('user.username', 'asc');
		$pegawai = $this->db->get()->result();

		$i = 1;
		foreach ($pegawai as $data) {
			$date = $data->tgl_absen;
			$pdf->Cell(10, 6, $i++, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->username, 1, 0);
			$pdf->Cell(40, 6, $date, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen_pulang, 1, 0);
			$pdf->Cell(40, 6, $data->keterangan_absen, 1, 0);
			$pdf->Cell(40, 6, $data->lat_absen, 1, 0);
			$pdf->Cell(40, 6, $data->long_absen, 1, 1);
		}
		$pdf->Output();
	}

	function export_all()
	{

		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'DAFTAR ABSENSI CV. ASIAN TEKNOLOGI INSPIRA', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Nama Pegawai', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Tanggal Absen', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Datang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Jam Pulang', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Status Kehadiran', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Latitude Maps', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Longtitude Maps', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);

		$id_pegawai = $this->input->post('id_pegawai');

		$no = 0;

		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');

		$pegawai = $this->db->get()->result();

		foreach ($pegawai as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->username, 1, 0);
			$pdf->Cell(40, 6, $data->tgl_absen, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen, 1, 0);
			$pdf->Cell(40, 6, $data->jam_absen_pulang, 1, 0);
			$pdf->Cell(40, 6, $data->keterangan_absen, 1, 0);
			$pdf->Cell(40, 6, $data->lat_absen, 1, 0);
			$pdf->Cell(40, 6, $data->long_absen, 1, 1);
		}
		$pdf->Output();
	}

	function delete_all()
	{
		if ($this->session->userdata('user_type') == "Karyawan") {
			redirect("auth/blocked");
		}

		$query = $this->db->empty_table('absensi');
		if ($query) {

			redirect('absensi/datakehadiran');
		}
	}

	function dataPresensiMasuk()
	{
		$data = [
			'listPresensiMasuk' => $this->Absensi_model->fetchPresensiMasuk(),
			'title' => 'Halaman Yang sudah presensi'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/listSudahAbsen', $data);
		$this->load->view('layout/footer');
	}

	function dataPresensiPulang()
	{
		$data = [
			'listPresensiPulang' => $this->Absensi_model->fetchPresensiPulang(),
			'title' => 'Halaman Yang sudah presensi Pulang'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/listSudahPulang', $data);
		$this->load->view('layout/footer');
	}

	function dataBelumPresensi()
	{
		$user = $this->Users_model->read();

		$data = [
			'belum_presensi' => $this->Absensi_model->belumPresensi($user),
			'title' => 'Halaman Belum Presensi'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/listBelumAbsen', $data);
		$this->load->view('layout/footer');
	}

	function dataSakit()
	{
		$data = [
			'presensi_sakit' => $this->Absensi_model->presensiSakit(),
			'title' => 'Halaman Presensi Sakit'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/listPresensiSakit', $data);
		$this->load->view('layout/footer');
	}

	function dataCuti()
	{
		$data = [
			'presensi_cuti' => $this->Absensi_model->presensiCuti(),
			'title' => 'Halaman Presensi Cuti'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absen/listPresensiCuti', $data);
		$this->load->view('layout/footer');
	}

	public function selfie()
	{
	}
}
