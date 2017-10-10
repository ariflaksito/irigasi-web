<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alokasi extends CoreModel {

    public function __construct()
    {
        parent::__construct();

    }

    public function add($data = array()){
    	$rules = array(
            array('field' => 'uid', 'label' => 'Petugas', 'rules' => 'required|numeric'),  
            array('field' => 'irigasiid', 'label' => 'Lokasi', 'rules' => 'required|numeric'),
            array('field' => 'type', 'label' => 'Type', 'rules' => 'required|numeric')
        );

        if (!$this->set_data($rules, $data)) {            
            $this->umsg = $this->msg;
            return false;          
        }

        if($this->db->insert('alokasi', $data)){
        	$this->umsg = "Input data berhasil";
        	return true;
        }else{
        	$this->umsg = $this->db->error();
        	return false;
        }

    }

    public function get($uid){
        $sql = "select aid,username,u.nama, i.nama as irigasi, desa, kecamatan, latitude, longitude, type
            from alokasi a 
            join users u on a.uid = u.uid
            join irigasi i on a.irigasiid = i.irigasiid
            where a.uid = $uid
            Order by a.irigasiid";

        return $this->db->query($sql)->result();
    }

    public function getall(){
    	$sql = "select aid,username,u.nama, i.nama as irigasi, desa, kecamatan, latitude, longitude, type
			from alokasi a 
			join users u on a.uid = u.uid
			join irigasi i on a.irigasiid = i.irigasiid
			Order by a.irigasiid";

		return $this->db->query($sql)->result();	
    }

    public function del($id){
        return $this->db->delete('alokasi', array("aid"=>$id));
    }

}