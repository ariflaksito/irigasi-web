<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function userlogin($u, $p){
        $this->db->Where('username', $u);
        $this->db->Where('password', $p);
        $query = $this->db->get('admin');

        return $query->row();
    }

    public function updatelog($id){
        $this->db->Where('adminid', $id);
        $this->db->Update('admin', array('log_date'=>date('Y-m-d H:i:s')));
    }
}    