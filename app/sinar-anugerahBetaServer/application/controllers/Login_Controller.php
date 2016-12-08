<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function index()
	{
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/v_login');
	}

    function cek_login() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->Login_model->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->ID_PEGAWAI,
                    'USERNAME' => $row->USERNAME,
                    'PASS'=>$row->PASSWORD,
                    'NAME'=>$row->NM_PEGAWAI,
                    'LEVEL' => $row->ID_LVL_AKSES,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                redirect('Dashboard_controller','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            redirect('Login_controller','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
    redirect('Login_Controller');
    }

}
