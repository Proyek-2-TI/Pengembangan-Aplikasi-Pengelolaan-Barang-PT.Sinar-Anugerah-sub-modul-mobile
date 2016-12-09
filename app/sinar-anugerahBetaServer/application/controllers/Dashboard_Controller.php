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
            'dashboard' => 'active' ,   'pegawai' => '' ,
            'barang'    => '' ,         'supplier' => '' ,
            'customer'  => '' ,         'penjualan' => '' ,

            'title'=>'Dahboard Admin',
            'headerPage'=>'Dashboard',
            'headerPanel'=>'Kelola Data',

            'ID_BARANG'=>$this->Barang_model->getKodeBarang(),
            'data_barang'=>$this->Barang_model->getAllDataBarang(),
            'data_jenis_barang'=>$this->Global_model->getAllData('TBL_JENIS_BARANG'),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header', $data);
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