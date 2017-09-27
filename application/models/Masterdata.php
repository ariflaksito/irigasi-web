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

    public function countUsers(){
        return $this->db->count_all_results('users'); 
    }

    public function countIrigasi(){
        return $this->db->count_all_results('irigasi'); 
    }

    public function getusers(){
        $this->db->order_by('nama');
        return $this->db->get('users')->result();
    }

    public function getirigasi(){
        $this->db->order_by('nama');
        return $this->db->get('irigasi')->result();   
    }
}    