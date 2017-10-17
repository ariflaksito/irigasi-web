<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct(){
        parent::__construct();       
    }

    public function index(){
    	$target_path = "uploads/";
 
		// array for final json respone
		$response = array();


        if (!empty($_FILES['image']['name'])) {
		    $target_path = $target_path . basename($_FILES['image']['name']);
		 
		    $response['file_name'] = basename($_FILES['image']['name']);		   
		 
		    try {
		        // Throws exception incase file is not being moved
		        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
		            // make error flag true
		            $response['error'] = true;
		            $response['message'] = 'Could not move the file!';
		        }
		 
		        // File successfully uploaded
		        $response['message'] = 'File uploaded successfully!';
		        $response['error'] = false;
		        $response['file_path'] = $file_upload_url . basename($_FILES['image']['name']);

		    } catch (Exception $e) {
		        // Exception occurred. Make error flag true
		        $response['error'] = true;
		        $response['message'] = $e->getMessage();
		    }
		} else {
		    // File parameter is missing
		    $response['error'] = true;
		    $response['message'] = 'Not received any file!';
		}
		 
		// Echo final json response to client
		echo json_encode($response);
    }
}