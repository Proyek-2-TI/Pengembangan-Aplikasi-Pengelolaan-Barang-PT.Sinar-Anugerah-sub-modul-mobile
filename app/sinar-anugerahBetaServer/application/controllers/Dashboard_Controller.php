<?php
class Dashboard_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
    }

    function index(){
        $data=array(
            'title'=>'Dashboard',
            'active_dashboard'=>'active',
            //'dt_pegawai'=>$this->model_app->getAllData('tbl_pegawai'),
            'dt_contact'=>$this->Global_model->getAllData('TBL_CONTACT'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/v_dashboard');
        $this->load->view('elements/v_footer');
    }
    
    //function profile(){
    //    $data=array(
    //        'title'=>'profile',
    //        'dt_contact'=>$this->model_app->getAllData('tbl_contact'),
    //    );
    //    $this->load->view('element/v_header',$data);
    //   $this->load->view('pages/v_profile');
    //    $this->load->view('element/v_footer');
    //}

}