<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    var $data;

    public function __construct(){
    	parent::__construct();
    }

    public function indata(){
    	$post = $this->input->post();
    	if(!$post){
    		exit('error');
    	}

    	$data = array(
    		'uid' => $post['uid'],
    		'irigasiid' => $post['iid'],
    		'tinggi' => $post['tgg'],
    		'ket' => $post['ket'],
    		'is_banjir' => $post['fld']
    	);

    	return $this->db->insert('idata', $data);
    }
}