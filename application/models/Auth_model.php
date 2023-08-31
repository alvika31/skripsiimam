<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function get($username)
    {

        $this->db->where('username', $username);
        $result = $this->db->get('user')->row();
        return $result;
    }
}
