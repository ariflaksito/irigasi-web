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

    public function countusers(){
        return $this->db->count_all_results('users'); 
    }

    public function countirigasi(){
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

    public function getdata(){
        $sql = "select u.nama, i.nama as irigasi, tinggi, ket, datetime, type, 
            desa, kecamatan, kabupaten, is_banjir, image
            from idata d
            join alokasi a on a.aid = d.aid
            join users u On a.uid = u.uid
            join irigasi i On i.irigasiid = a.irigasiid
            Order by datetime desc Limit 0,1000";

        return $this->db->query($sql)->result();    
    }    

    public function api_addidata($data = array()){
        $rules = array(
            array('field' => 'aid', 'label' => 'ID Alokasi', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'image', 'label' => 'Gambar', 'rules' => 'trim'),  
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
            return array('status' => false, 'data' => null);
        }

        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);

        $rs = $this->db->get('users')->row();
        $sts = true;
        $this->umsg = "Login berhasil";

        if(count($rs)==0){
            $this->umsg = 'Username atau Password tidak sesuai';   
            $sts = false;
        } 

        return array('status' => $sts, 'data' => $rs);

    }

    public function api_irigasi(){
        $this->db->order_by('nama');
        return $this->db->get('irigasi')->result();

    }
}    