<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('logged_in')) {
            redirect('login', 'refresh');
        }else{
        	$this->data['sess'] = $this->session->userdata();	
        }    
        
    }

    public function index(){
        $this->load->model('masterdata');

        $this->data['title'] = 'Dashboard';
        $this->data['page'] = 'home';

        $this->data['cusers'] = $this->masterdata->countUsers();
        $this->data['cirigasi'] = $this->masterdata->countIrigasi();

    	$this->load->view('dashboard', $this->data);
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('lastlog');
        $this->session->unset_userdata('logged_in');

        redirect('/login');
    }

}   