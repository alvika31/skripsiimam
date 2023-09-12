<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function absen_harian_user($id_pegawai)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl_absen', $today);
        $this->db->where('id_pegawai', $id_pegawai);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function absen_harian_user_pulang($id_pegawai)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl_absen', $today);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->where('status_absen', 2);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }

    public function getUserbyId($id_pegawai, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai=user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->order_by('absensi.id_absen', 'DESC');
        $result = $this->db->get();
        return $result;
    }
    public function getUserbyIdd($id_pegawai)
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai=user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->order_by('absensi.id_absen', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    public function insertSelfie($data)
    {
        return $this->db->insert('selfie_absen', $data);
    }

    public function getUserDetailId($id_absen, $id_pegawai)
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai=user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->where('absensi.id_absen', $id_absen);
        $query = $this->db->get();
        return $query;
    }

    public function getUserPegawai($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai=user.id_pegawai');
        $this->db->order_by('absensi.id_absen', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    public function getUserDetailPegawai($id_absen)
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai=user.id_pegawai');
        $this->db->where('absensi.id_absen', $id_absen);
        $query = $this->db->get();
        return $query;
    }
    function dataAbsenId($number, $offset)
    {
        return $query = $this->db->get('absensi', $number, $offset)->result();
    }


    function filter_username($id_pegawai, $tanggal, $vbulan)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->where('month(absensi.tgl_absen)', $vbulan);
        $this->db->where('year(absensi.tgl_absen)', $tanggal);
        $this->db->order_by('absensi.id_absen', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    function filter_name($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->order_by('absensi.id_absen', 'DESC');
        $result = $this->db->get();
        return $result;
    }

    function delete_absen($id_absen)
    {

        $this->db->where('id_absen', $id_absen);
        $this->db->delete('absensi');
    }

    function select_name_filter($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_pegawai', $id_pegawai);
        $result = $this->db->get();
        return $result;
    }

    function getTepatWaktu()
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('tgl_absen', date('Y-m-d'));
        $this->db->where('status_absen', 1);
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function getTelat()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('tgl_absen', date('Y-m-d'));
        $this->db->where('status_absen', 0);
        $result = $this->db->get()->num_rows();
        return $result;
    }
    function getSudahPresensiP()
    {
        $keterangan = array('Cuti', 'Sakit');
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('status_absen', 2);

        $this->db->where('tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function getJumlahPegawai()
    {
        $this->db->select('*');
        $this->db->from('user');
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function fetchPresensiMasuk()
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->result();
        return $result;
    }

    function getDataTepatWaktu()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $this->db->where('absensi.status_absen', 1);
        $result = $this->db->get()->result();
        return $result;
    }

    function fetchPresensiPulang()
    {

        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.status_absen', 2);

        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->result();
        return $result;
    }

    function fetchPresensiTelat()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.status_absen', 0);
        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->result();
        return $result;
    }

    function belumPresensi()
    {

        $query = $this->db->get('absensi', 2)->result();
        $this->db->last_query();
        return $query; // Return Last Query

        // $name = array('alvika', 'rio');
        // $user = $this->db->get('user');
        // $absen = $this->db->get('absensi')->result();

        // $this->db->select('*');
        // $this->db->from('absensi');
        // $this->db->join('user', 'user.id_pegawai != absensi.id_pegawai');
        // $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        // $result = $this->db->get()->result();
        // return $result;
    }

    function presensiSakit()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');

        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->result();
        return $result;
    }

    function getJumlahSakit()
    {
        $this->db->select('*');
        $this->db->from('absensi');

        $this->db->where('tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function getJumlahCuti()
    {
        $this->db->select('*');
        $this->db->from('absensi');

        $this->db->where('tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->num_rows();
        return $result;
    }

    function presensiCuti()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');

        $this->db->where('absensi.tgl_absen', date('Y-m-d'));
        $result = $this->db->get()->result();
        return $result;
    }

    function countPresensi($id_pegawai, $tanggal, $vbulan)
    {
        $keterangan = array('Cuti', 'Sakit');
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->where('month(absensi.tgl_absen)', $vbulan);
        $this->db->where('year(absensi.tgl_absen)', $tanggal);

        $result = $this->db->get()->num_rows();
        return $result;
    }

    function countSakit($id_pegawai, $tanggal, $vbulan)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->where('month(absensi.tgl_absen)', $vbulan);
        $this->db->where('year(absensi.tgl_absen)', $tanggal);

        $result = $this->db->get()->num_rows();
        return $result;
    }

    function countCuti($id_pegawai, $tanggal, $vbulan)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('absensi.id_pegawai', $id_pegawai);
        $this->db->where('month(absensi.tgl_absen)', $vbulan);
        $this->db->where('year(absensi.tgl_absen)', $tanggal);

        $result = $this->db->get()->num_rows();
        return $result;
    }

    function countBelumPresensi()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('absensi', 'absensi.id_pegawai = user.id_pegawai');
        $this->db->where('tgl_absen', date('Y-m-d'));
        $this->db->where_not_in('absensi.id_pegawai', 'user.id_pegawai');

        $result = $this->db->get()->num_rows();
        return $result;
    }

    public function getRadius()
    {
        $result = $this->db->get('radius');
        return $result->result();
    }

    public function detailRadius($id_radius)
    {
        return $this->db->get_where('radius', ['id_radius' => $id_radius])
            ->row_array();
    }

    public function updateRadius($data, $id_radius)
    {
        $this->db->where('id_radius', $id_radius);
        $result = $this->db->update('radius', $data);
        return $result;
    }

    public function getJamFirst()
    {
        $query = $this->db->get('jam');
        $firstRow = $query->row();
        return $firstRow;
    }
}
