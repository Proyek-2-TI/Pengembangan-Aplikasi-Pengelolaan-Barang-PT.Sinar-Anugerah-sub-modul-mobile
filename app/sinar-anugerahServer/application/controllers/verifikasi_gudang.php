<?php
class Verifikasi_gudang extends CI_Controller{
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
            'title'=>'Verifiksi Gudang',
            'dt'=>$this->model_app->getVerifikasi(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/verifikasi_gudang/v_verifikasi_gudang');
        $this->load->view('element/v_footer');
    }

    function select_verifikasi(){
        $id = $this->uri->segment(3);
        $data=array(
            'title'=>'Verifiksi Gudang',
            'dt'=>$this->model_app->getSelectedVerifikasi($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/verifikasi_gudang/v_selected_verifikasi');
        $this->load->view('element/v_footer');
    }

    function update_return_c(){
        if($this->input->post('status')=="diterima"){

        $data2=array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_barang'=>$this->input->post('kd_barang'),
            'd_rusak'=>$this->input->post('d_rusak'),
            'ket'=>$this->input->post('ket'),
        );
        $this->model_app->insertData('tbl_confirm_rusak',$data2);

        $id=array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_barang'=>$this->input->post('kd_barang'),
        );
        $data=array(
            'status'=>$this->input->post('status'),
        );
        $this->model_app->updateData("tbl_penjualan_detail",$data,$id);
        redirect('verifikasi_gudang');
        
        }else{

        $id=array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_barang'=>$this->input->post('kd_barang'),
        );
        $data=array(
            'status'=>$this->input->post('status'),
        );
        $this->model_app->updateData("tbl_penjualan_detail",$data,$id);
        redirect('verifikasi_gudang');            
        }
    }
}
