<?php
require(APPPATH.'libraries/REST_Controller.php');
 
class Api extends REST_Controller {

    public function __construct(){
        
        parent::__construct();
        $this->output->enable_profiler(false);

    }

    public function indata_post(){

        $json = json_decode($this->post('data'));
    	
    	$data = array(
    		'uid' => $json->uid,
    		'irigasiid' => $json->iid,
    		'tinggi' => $json->tgg,
    		'ket' => $json->ket,
    		'is_banjir' => $json->fld
    	);

        $this->load->model('masterdata');
    	$return = $this->masterdata->api_addidata($data);
        
        $this->response(array('sts'=>$return,'msg' => $this->masterdata->get_msg()), 200); 
       
    }

    public function login_post(){
        $json = json_decode($this->post('data'));

        $data = array(
            'username' => $json->uid,
            'password' => $json->pwd
        );

        $this->load->model('masterdata');
        $return = $this->masterdata->api_login($data);

        $sts = (count($return)>0)?true:false; 
        $msg = (count($return)>0)?'Login Berhasil':'Login Gagal, Periksa kembali user dan password anda'; 
        
        $this->response(array(
            'sts'=> $sts,
            'msg' => $msg,
            'data'=> $return), 
        200); 
       
    }

    public function irigasi_get(){
        $this->load->model('masterdata');
        $return = $this->masterdata->api_irigasi();

        $this->response(array(
            'sts'=> true,
            'data'=> $return), 
        200); 
    } 
}