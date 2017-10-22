<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct(){
        parent::__construct();       
    }

    public function index(){
    	$yy = date('Y');
    	$mm = date('m');
    	if (!is_dir('uploads/'.$yy.'/'.$mm)) {
		    mkdir('./uploads/' .$yy.'/'.$mm, 0777, TRUE);

		}
    	$target_path = "uploads/".$yy.'/'.$mm.'/';
 
		// array for final json respone
		$response = array();


        if (!empty($_FILES['image']['name'])) {
		    $target_path = $target_path . basename($_FILES['image']['name']);
		 
		    $response['file_name'] = basename($_FILES['image']['name']);		   
		 
		    try {
		        
		        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
		            
		            $response['status'] = false;
		            $response['msg'] = 'Could not move the file!';
		        }else{

			        // Resize image
			        $config['image_library'] = 'gd2';
					$config['source_image'] = $target_path;
					$config['maintain_ratio'] = TRUE;
					$config['width']         = 640;
					$config['height']       = 480;

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();

					$data = array(
			    		'aid' => $this->input->post('aid'),
			    		'image' => $target_path,
			    		'tinggi' => $this->input->post('tinggi'),
			    		'ket' => $this->input->post('ket'),
			    		'is_banjir' => $this->input->post('flood'),
			    	);

			        $this->load->model('masterdata');
			    	$this->masterdata->api_addidata($data);
			 
			        // File successfully uploaded
			        $response['msg'] = 'File uploaded successfully!';
			        $response['status'] = true;
			    }    

		    } catch (Exception $e) {
		      
		        $response['status'] = false;
		        $response['msg'] = $e->getMessage();
		    }
		} else {
		    // File parameter is missing
		    $response['status'] = true;
		    $response['msg'] = 'Not received any file!';
		}
		 
		// Echo final json response to client
		echo json_encode($response);
    }
}