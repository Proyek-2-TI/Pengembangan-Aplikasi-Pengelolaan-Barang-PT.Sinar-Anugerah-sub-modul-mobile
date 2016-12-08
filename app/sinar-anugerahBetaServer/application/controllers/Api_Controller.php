<?php

class Api_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		// Load model model_json.php
		$this->load->model('Api_model');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

/*
	Target : http://localhost/proyek2/sinar-anugerahBetaServer/index.php/Api_Controller/
*/	
	public function login(){
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        $result = $this->Api_model->login($username, $password);
        echo json_encode($result);
	}

}