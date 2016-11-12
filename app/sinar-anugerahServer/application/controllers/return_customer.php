<?php
class Return_customer extends CI_Controller{
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
            'title'=>'Return Customer',
            'data_penjualan'=>$this->model_app->getAllDataReturnPenjualan(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_return_customer');
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy(); 
    }

    function data_return_c(){
        $data=array(
            'title'=>'Pengiriman Barang',
            'data_penjualan'=>$this->model_app->getAllDataPenjualan(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_confirm_return');
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function detail_return_customer(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Return Barang Customer',
            'dt_penjualan'=>$this->model_app->getDataPenjualan($id),
            'data_return'=>$this->model_app->getBarangReturnCustomer($id),
            'barang_return'=>$this->model_app->getAllBarangReturn($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_detail_return_customer');
        $this->load->view('element/v_footer');
    }

    function verifikasi_gudang(){
        $data=array(
            'title'=>'Return Barang Customer',
            'data_penjualan'=>$this->model_app->getAllDataReturnPenjualan(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_verifikasi_gudang');
        $this->load->view('element/v_footer');
    }
// ===========================================    Tambah Return Customer   ======================================= //
// ===========================================           sec 1             ======================================= //
    function detail_vg(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Verfikasi Return Barang',
            'dt_penjualan'=>$this->model_app->getDataPenjualan($id),
            'data_return'=>$this->model_app->getSisaReturn($id),
            'data'=>$this->model_app->getBarangReturnCustomer($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_confirm_verifikasi');
        $this->load->view('element/v_footer');
    }

    function detail_rc(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Return Barang Pelanggan',
            'dt_penjualan'=>$this->model_app->getDataPenjualan($id),
            'data_return'=>$this->model_app->getBarangReturn($id),
            'barang_return'=>$this->model_app->getAllBarangReturn($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/return_customer/v_tambah_customer');
        $this->load->view('element/v_footer');
    }



    function pages_tambah_return_C(){
        $data=array(
            'title'=>'Tambah Return Pelanggan',
            'kd_penjualan'=>$this->model_app->getKodePenjualan(),
            'data_barang'=>$this->model_app->getBarangJual(),
            'data_pelanggan'=>$this->model_app->getAllData('tbl_pelanggan'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/penjualan/v_add_penjualan');
        $this->load->view('element/v_footer');
    }

    function get_detail_barang(){
        $id['kd_barang']=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_app->getSelectedData('tbl_barang',$id)->result(),
        );
        $this->load->view('pages/return_customer/ajax_detail_barang',$data);
    }

    function detail_barang_return(){
        $id['kd_barang']=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_app->getSelectedData('tbl_barang',$id)->result(),
        );
        $this->load->view('pages/return_customer/ajax_detail_barang_return',$data);
    }

    function get_detail_pelanggan(){
        $id['kd_pelanggan']=$this->input->post('kd_pelanggan');
        $data=array(
            'detail_pelanggan'=>$this->model_app->getSelectedData('tbl_pelanggan',$id)->result(),
        );
        $this->load->view('pages/penjualan/ajax_detail_pelanggan',$data);
    }

//    INSERT DATA

    function simpan_return_c(){
        $id=array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_barang'=>$this->input->post('kd_barang'),
        );
        $data=array(
            'rusak'=>$this->input->post('rusak'),
            'return_dt'=>$this->input->post('return_dt'),
            'status'=>$this->input->post('status'),
            'ket'=>$this->input->post('ket'),
        );
        $this->model_app->updateData("tbl_penjualan_detail",$data,$id);
        
        $kd['kd_penjualan']=$this->input->post('kd_penjualan');
        $status['dt_return']=$this->input->post('dt_return');

        $this->model_app->updateData("tbl_penjualan_header",$status,$kd);
        redirect('return_customer');
    }

    function update_return_c(){
        $id=array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_barang'=>$this->input->post('kd_barang'),
        );
        $data=array(
            'status'=>$this->input->post('status'),
        );
        $this->model_app->updateData("tbl_penjualan_detail",$data,$id);
        
        $kd['kd_penjualan']=$this->input->post('kd_penjualan');
        $status['dt_return']=$this->input->post('dt_return');

        $this->model_app->updateData("tbl_penjualan_header",$status,$kd);
        redirect('return_customer/verifikasi_gudang');
    }

//    DELETE

    function hapus(){
        $id['kd_penjualan'] = $this->uri->segment(3);
        $data['return_dt']= "";
        $status['dt_return']="";
        $this->model_app->updateData("tbl_penjualan_detail",$data,$id);
        $this->model_app->updateData("tbl_penjualan_header",$status,$id);
        redirect('return_customer/data_return_c');
    }
}
