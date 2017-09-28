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

    	$data = json_decode($post['params']);
    	return $this->db->insert('idata', $data);
    }
}