<?php
class Barang_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Data Barang',
            'ID_BARANG'=>$this->Barang_model->getKodeBarang(),
            'data_barang'=>$this->Barang_model->getAllDataBarang(),
            'data_jenis_barang'=>$this->Global_model->getAllData('TBL_JENIS_BARANG'),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang/v_barang');
        $this->load->view('elements/v_footer');
    }

    function tambah_barang(){

        $this->Barang_model->insertBarang();
        redirect("Barang_Controller");
    }
}