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
    		'aid' => $json->aid,
    		'image' => $json->img,
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

        $data = array();
        if($json!=null){
            $data = array(
                'username' => $json->uid,
                'password' => $json->pwd
            );    
        }

        $this->load->model('masterdata');
        $this->load->model('alokasi');
        $return = $this->masterdata->api_login($data);

        if($return['status'])
            $return['irigasi'] = $this->alokasi->get($return['data']->uid);
        
        $return['msg'] = $this->masterdata->get_msg();
        
        $this->response($return, 200); 
       
    }

    public function irigasi_get(){
        $this->load->model('masterdata');
        $return = $this->masterdata->api_irigasi();

        $this->response(array(
            'status'=> true,
            'data'=> $return), 
        200); 
    } 
}