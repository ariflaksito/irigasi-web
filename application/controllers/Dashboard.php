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

        $this->data['cusers'] = $this->masterdata->countusers();
        $this->data['cirigasi'] = $this->masterdata->countirigasi();
        $this->data['cdata'] = $this->masterdata->countdata();
        $this->data['creport'] = $this->masterdata->countreport();
        $this->data['irigasi'] = $this->masterdata->getirigasi();

    	$this->load->view('dashboard', $this->data);
    }

    public function users(){
        $this->load->model('masterdata');

        $this->data['title'] = 'Petugas';
        $this->data['page']  = 'users';
        $this->data['users'] = $this->masterdata->getusers(); 

        $this->load->view('dashboard', $this->data);
    }

    public function irigasi(){
        $this->load->model('masterdata');

        $this->data['title'] = 'Irigasi';
        $this->data['page'] = 'irigasi';
        $this->data['irigasi'] = $this->masterdata->getirigasi();         

        $this->load->view('dashboard', $this->data);
    }

    public function data(){
        $this->load->model('masterdata');

        $this->data['title'] = 'Data';
        $this->data['page'] = 'data';
        $this->data['data'] = $this->masterdata->getdata();                 

        $this->load->view('dashboard', $this->data);
    }

    public function report(){
        $this->load->model('masterdata');

        $this->data['title'] = 'Report';
        $this->data['page'] = 'report';
        $this->data['report'] = $this->masterdata->getreport();

        $this->load->view('dashboard', $this->data);
    }

    public function alokasi($var = ""){
        $this->data['title'] = 'Alokasi';
        $this->data['page'] = 'alokasi';
        $this->data['add'] = null;
        $this->data['msg'] = "";

        $this->load->model('alokasi');
        $post = $this->input->post();
        if($post){
            $this->data['add'] = $this->alokasi->add($post);
            $this->data['msg'] = $this->alokasi->get_msg();
        }

        $this->load->model('masterdata');
        $this->data['irigasi'] = $this->masterdata->getirigasi();   
        $this->data['users'] = $this->masterdata->getusers(); 
        $this->data['alokasi'] = $this->alokasi->getall();

        if($var=="del"){
            $post = $this->input->post();
            $this->alokasi->del($post['aid']);
        }

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