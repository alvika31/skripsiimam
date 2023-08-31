<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function addUser($data)
    {
        $result = $this->db->insert('user', $data);
        return $result;
    }

    public function read()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function infoPegawai($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function delete($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->delete('user');
    }

    public function getId($id_pegawai)
    {
        return $this->db->get_where('user', ['id_pegawai' => $id_pegawai])
            ->row_array();
    }

    public function prosesEditPegawai()
    {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'user_type' => $this->input->post('user_type'),
            'umur' => $this->input->post('umur'),
            'kode_pegawai' => $this->input->post('kode_pegawai'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        );

        $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
        $this->db->update('user', $data);
    }
}
