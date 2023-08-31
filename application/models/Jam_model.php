<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jam_model extends CI_Model {

    public function get_all()
    {
        $result = $this->db->get('jam');
        return $result->result();
    }

    public function get_jam_masuk()
    {
        $result = $this->db->where('keterangan', 'Masuk')->get('jam');        
        return $result->result();
    }
    public function get_jam_pulang()
    {
        $result = $this->db->where('keterangan', 'Pulang')->get('jam');        
        return $result->result();
    }

    public function find($id_jam)
    {
        $this->db->where('id_jam', $id_jam);
        $result = $this->db->get('jam');
        return $result->row();
    }

    public function update_data($id_jam,$data,$table)
    {
        $this->db->where('id_jam', $id_jam);
        $result = $this->db->update('jam', $data);
        return $result;
    }

    public function getId($id_jam)
    {
        return $this->db->get_where('jam', ['id_jam' => $id_jam])
        ->row_array();
    }

}