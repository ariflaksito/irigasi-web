<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CoreModel {

    public function __construct()
    {
        parent::__construct();

    }

    public function adminlogin($u, $p){
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

    public function api_addidata($data = array()){
        $rules = array(
            array('field' => 'uid', 'label' => 'Id Petugas', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'irigasiid', 'label' => 'Id irigasi', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'tinggi', 'label' => 'Tinggi', 'rules' => 'required|numeric'),  
            array('field' => 'ket', 'label' => 'Keterangan', 'rules' => 'trim'),  
            array('field' => 'is_banjir', 'label' => 'Info Banjir', 'rules' => 'required|numeric')            
        );

        if (!$this->set_data($rules, $data)) {            
            $this->umsg = $this->msg;
            return false;
        }

        $data['datetime'] = date('c');
        if ($this->db->insert('idata', $data)) {
            $this->umsg = 'Data berhasil ditambah';
            return true;
        } else {
            $this->umsg = 'Data gagal ditambah';
            return false;
        }
    }

    public function api_login($data = array()){
        $rules = array(
            array('field' => 'username', 'label' => 'Username', 'rules' => 'required|trim'),  
            array('field' => 'password', 'label' => 'Password', 'rules' => 'required|trim')
        );

        if (!$this->set_data($rules, $data)) {            
            $this->umsg = $this->msg;
            return false;
        }

        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);

        return $this->db->get('users')->result();

    }

    public function api_irigasi(){
        $this->db->order_by('nama');
        return $this->db->get('irigasi')->result();
    }
}    