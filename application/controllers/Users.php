<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    var $data;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('logged_in')) {
            redirect('login', 'refresh');
        }else{
        	$this->data['sess'] = $this->session->userdata();	
            $this->load->model('masterdata');
        }    
        
    }

    public function edit($uid){
        $this->data['title'] = 'Edit Petugas';
        $this->data['page'] = 'frm_user';

        $post = $this->input->post();
        if($post){
            if(!$this->_valuser()) {
                $out = array(
                    'msg' => validation_errors('<span>', '</span><br />'),
                    'sts' => false
                );
            }else{
                $this->masterdata->edituser($uid, $post);
                $out = array(
                    'msg' => 'Update user berhasil',
                    'sts' => true
                );
            }

            $this->data['out'] = $out;
        }

        $this->data['user'] = $this->masterdata->getduser($uid);
        $this->load->view('dashboard', $this->data);
    }

    public function add(){
        $this->data['title'] = 'Tambah Petugas';
        $this->data['page'] = 'frm_user';

        $val = array('nama'=>'', 'nokontrak'=>'', 'jabatan'=>'', 'pendidikan'=>'',
            'alamat'=>'','hp'=>'');
        $this->data['user'] = $val;

        $post = $this->input->post();
        if($post){
            if(!$this->_valuser()) {
                $out = array(
                    'msg' => validation_errors('<span>', '</span><br />'),
                    'sts' => false
                );
            }else{
                $this->masterdata->adduser($post);
                $out = array(
                    'msg' => 'Tambah user berhasil',
                    'sts' => true
                );
            }

            $this->data['out'] = $out;
        }

        $this->load->view('dashboard', $this->data);
    }

    public function pwd($uid){
        $this->data['title'] = 'Reset Password Petugas';
        $this->data['page'] = 'frm_pwd';

        $post = $this->input->post();
        if($post){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('pwd', 'Password baru', 'required|min_length[4]
');
            $this->form_validation->set_rules('cpwd', 'Konfirmasi Password', 'required|matches[pwd]');
            if ($this->form_validation->run() == FALSE) {
                $out = array(
                    'msg' => validation_errors('<span>', '</span><br />'),
                    'sts' => false
                );
            }else{
                $this->masterdata->edituser($uid, array('password'=>$post['pwd']));
                $out = array(
                    'msg' => 'Update password berhasil',
                    'sts' => true
                );
            } 

            $this->data['out'] = $out;
        }


        $this->load->view('dashboard', $this->data);
    }

    private function _valuser(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            return false;
        }else{
            return true;
        } 
    }
}