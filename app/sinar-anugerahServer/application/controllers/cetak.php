<?php

class Cetak extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }

    function print_penjualan(){
        $id=$this->uri->segment(3);
        $data=array(
            'title'=>'Penjualan',
            'dt_contact'=>$this->model_app->getAllData('tbl_contact'),
            'dt_penjualan'=>$this->model_app->getDataPenjualan($id),
            'barang_jual'=>$this->model_app->getBarangPenjualan($id),
        );
        $this->load->view('pages/penjualan/v_print_penjualan',$data);
    }

    function print_pemesanan(){
        $id=$this->uri->segment(3);
        $data=array(
            'title'=>'Pemesanan',
            'dt_contact'=>$this->model_app->getAllData('tbl_contact'),
            'dt_pemesanan'=>$this->model_app->getDataPemesanan($id),
            'barang_pesan'=>$this->model_app->getBarangPemesanan($id),
        );
        $this->load->view('pages/pemesanan/v_print_pemesanan',$data);
    }

    function print_barang_masuk(){
        $id=$this->uri->segment(3);
        $data=array(
            'title'=>'Barang Masuk',
            'dt_contact'=>$this->model_app->getAllData('tbl_contact'),
            'dt_barang_masuk'=>$this->model_app->getDataBarangMasuk($id),
            'barang_masuk'=>$this->model_app->getBarangMasuk($id),
        );
        $this->load->view('pages/barang_masuk/v_print_barang_masuk',$data);
    }
    function print_return_customer(){
        $id=$this->uri->segment(3);
        $data=array(
            'title'=>'Return Customer',
            'dt_contact'=>$this->model_app->getAllData('tbl_contact'),
            'dt_penjualan'=>$this->model_app->getDataPenjualan($id),
            'data_return'=>$this->model_app->getBarangReturnCustomer($id),
            'barang_return'=>$this->model_app->getAllBarangReturn($id),
        );
        $this->load->view('pages/barang_return/v_print_barang_return',$data);
    }
}