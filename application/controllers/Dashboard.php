<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index(){
        $this->data['title'] = 'Dashboard';
    	$this->load->view('dashboard', $this->data);
    }

}   