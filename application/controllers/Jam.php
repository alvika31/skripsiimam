<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Jam_model');
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

            'jam' => $this->Jam_model->get_all(),
            'title' => 'Halaman Setting Jam'

        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('jam', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit($id_jam)
    {
        if ($this->session->userdata('user_type') == "Karyawan") {
            redirect("auth/blocked");
        }
        $data = [
            'title' => 'Halaman Edit Jam',
            'jam' => $this->Jam_model->getId($id_jam),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('edit_jam', $data);
        $this->load->view('layout/footer');
    }

    public function updateJam()
    {
        if ($this->session->userdata('user_type') == "Karyawan") {
            redirect("auth/blocked");
        }

        $id_jam = $this->input->post('id_jam');
        $start = $this->input->post('start');
        $finish = $this->input->post('finish');


        $data = array(
            'start' => $start,
            'finish' => $finish
        );

        $result = $this->Jam_model->update_data($id_jam, $data, 'jam');
        if ($result == TRUE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					<strong style="color:white">Jam Berhasil dirubah!</strong>
					</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					<strong style="color:white">Jam Tidak Berhasil dirubah!</strong>
					</div>');
        }
        redirect('jam');
    }
}
