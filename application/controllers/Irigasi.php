<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Irigasi extends CI_Controller {

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

    public function edit($id){
        $this->data['title'] = 'Edit Irigasi';
        $this->data['page'] = 'frm_irigasi';

        $post = $this->input->post();
        if($post){
            if(!$this->_valirigasi()) {
                $out = array(
                    'msg' => validation_errors('<span>', '</span><br />'),
                    'sts' => false
                );
            }else{
                $this->masterdata->editirigasi($id, $post);
                $out = array(
                    'msg' => 'Edit Irigasi berhasil',
                    'sts' => true
                );
            }

            $this->data['out'] = $out;
        }    

        $this->data['irg'] = $this->masterdata->getdirigasi($id);
        $this->load->view('dashboard', $this->data);
    }

    public function add(){
        $this->data['title'] = 'Tambah Irigasi';
        $this->data['page'] = 'frm_irigasi';

        $val = array('nama'=>'', 'jenis'=>'', 'kabupaten'=>'', 'kecamatan'=>'',
            'desa'=>'','latitude'=>'', 'longitude'=>'');
        $this->data['irg'] = $val;

        $post = $this->input->post();
        if($post){
            if(!$this->_valirigasi()) {
                $out = array(
                    'msg' => validation_errors('<span>', '</span><br />'),
                    'sts' => false
                );
            }else{
                $this->masterdata->addirigasi($post);
                $out = array(
                    'msg' => 'Tambah Irigasi berhasil',
                    'sts' => true
                );
            }

            $this->data['out'] = $out;
        }    

        $this->load->view('dashboard', $this->data);
    }

    private function _valirigasi(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Irigasi', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Irigasi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', '');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', '');
        $this->form_validation->set_rules('desa', 'Desa', '');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|decimal');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|decimal');

        if ($this->form_validation->run() == FALSE) {
            return false;
        }else{
            return true;
        } 
    }
}    