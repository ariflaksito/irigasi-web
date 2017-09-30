<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('logged_in')){
            redirect('/dashboard');
        }
    }

    public function index(){
        $data = array();
    	if($this->session->has_userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
        }

        $this->load->view('login', $data);
    }

    public function do_login(){
        $usr = $this->input->post('usr');
        $pwd = $this->input->post('pwd');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usr', 'Username', 'required');
        $this->form_validation->set_rules('pwd', 'Password', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error_msg', validation_errors('<span>', '</span><br />'));
            redirect('/login');
        }else{
            $this->load->model('masterdata');
            $row = $this->masterdata->adminlogin($usr, $pwd);

            if($row!=NULL){
                $newdata = array(
                    'id'        => $row->adminid,
                    'user'      => $usr,
                    'fullname'  => $row->fullname,
                    'lastlog'   => $row->log_date,                    
                    'logged_in' => TRUE
                );

                $this->masterdata->updatelog($row->adminid);

                $this->session->set_userdata($newdata);
                redirect('/dashboard');

            }else {
                $this->session->set_flashdata('error_msg', 'User dan Password tidak sesuai');
                redirect('/login');
            }
        }    
    }

}    