<?php
class Penjualan_Controller extends CI_Controller{
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
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => '' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => 'active' ,

            'title'=>'Penjualan',
            'headerPage'=>'Data Penjualan',
            'headerPanel'=>'List Data Penjualan',

            'data_penjualan'=>$this->Penjualan_model->getAllDataPenjualan(),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/penjualan/v_penjualan');
        $this->load->view('elements/v_footer');
    }

    function tambah_penjualan(){
        $data=array(
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => '' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => 'active' ,

            'title'=>'Penjualan',
            'headerPage'=>'Data Penjualan',
            'headerPanel'=>'List Data Penjualan',

            'kd_penjualan'=>$this->Penjualan_model->getKodePenjualan(),
            'data_barang'=>$this->Penjualan_model->getBarangJual(),
            'data_customer'=>$this->Global_model->getAllData('TBL_CUSTOMER'),
        );
        $this->load->view('elementS/v_header',$data);
        $this->load->view('pages/penjualan/v_add_penjualan');
        $this->load->view('elementS/v_footer');
    }

    function get_detail_customer(){
        $id['id_customer']=$this->input->post('id_customer');
        $data=array(
            'detail_customer'=>$this->Global_model->getSelectedData('TBL_CUSTOMER',$id)->result(),
        );
        $this->load->view('pages/penjualan/ajax_detail_customer',$data);
    }

}
