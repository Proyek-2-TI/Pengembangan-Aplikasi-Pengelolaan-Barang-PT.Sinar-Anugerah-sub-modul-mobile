<?php
class Return_supplier extends CI_Controller{
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
            'title'=>'Data Admin',
            'kd_barang'=>$this->model_app->getKodeBarang(),
            'id_jenis_barang'=>$this->model_app->getKodeJenisBarang(),
            'data_barang'=>$this->model_app->getAllBarangRusak(),
            'data_jenis_barang'=>$this->model_app->getAllData('tbl_jenis_barang'),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/Return_supplier/v_barang_return');
        $this->load->view('element/v_footer');
    }

    function confirm_rusak(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Barang Rusak',
            'data'=>$this->model_app->getBarang($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_supplier/v_detail_barang_return');
        $this->load->view('element/v_footer');
    
    }

    function simpan(){
        $id['kd_barang'] = $this->input->post('kd_barang');
        $data=array(
            'stok'=>$this->input->post('stok') + $this->input->post('rusak'),
            'rusak'=>0,
        );
        $this->model_app->updateData('tbl_barang',$data,$id);
        redirect("return_supplier");
    }
}