<?php
class Pemesanan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
        $this->load->helper('currency_format_helper');
    }

// ===========================================        view data        ======================================= //
// ===========================================          sec 1          ======================================= //
    function index(){
        $data=array(
            'title'=>'Pemesanan',
            'Pemesanan'=>$this->model_app->getAllDataPemesanan(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/pemesanan/v_pemesanan');
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function Pemesanan(){
        $data=array(
            'title'=>'Pemesanan',
            'kd_supplier'=>$this->model_app->getKodeSupplier(),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/Pemesanan/v_supplier');
        $this->load->view('element/v_footer');
        
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function detail_pemesanan(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Pemesanan',
            'dt_pemesanan'=>$this->model_app->getDatapemesanan($id),
            'Pemesanan'=>$this->model_app->getpemesanan($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/Pemesanan/v_detail_pemesanan');
        $this->load->view('element/v_footer');
    }

    function detail_barang_supplier(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Data Barang',
            'data_barang'=>$this->model_app->getAllBarangSupplier($id),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/Pemesanan/v_barang_supplier');
        $this->load->view('element/v_footer');
    }

    function barang_pemesanan(){
        $data=array(
            'title'=>'Pemesanan',
            'kd_supplier'=>$this->model_app->getKodeSupplier(),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/pemesanan/v_supplier');
        $this->load->view('element/v_footer');
        
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

// ===========================================    Tambah Pemesanan     ======================================= //
// ===========================================         sec 1           ======================================= //
    function pages_tambah_pemesanan(){
        $id= $this->uri->segment(3);
        $detail = array(
            'id'    => $this->input->post('kd_pemesanan'),
            'qty'   => $this->input->post('qty'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($detail);

        $data=array(
            'title'=>'Tambah Pemesanan',
            'kd_pemesanan'=>$this->model_app->getKodePemesanan(),
            'data_barang'=>$this->model_app->getAllSupplierBarang($id),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/Pemesanan/v_add_pemesanan');
        $this->load->view('element/v_footer');
    }

    function simpan_pemesanan(){
        $data = array(
            'kd_pemesanan'=>$this->input->post('kd_pemesanan'),
            'kd_supplier'=>$this->input->post('kd_supplier'),
            'tanggal_masuk'=>date("Y-m-d",strtotime($this->input->post('tanggal_masuk'))),
            'kd_pegawai'=>$this->session->userdata('ID'),
        );
        $this->model_app->insertData("tbl_pemesanan",$data);

        foreach($this->cart->contents() as $items){
            $kd_pemesanan = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'kd_pemesanan' => $this->input->post('kd_pemesanan'),
                'kd_barang'=> $kd_barang,
                'qty'=>$qty,
            );
            $this->model_app->insertData("tbl_detail_pemesanan",$data_detail);

        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('Pemesanan');
    }

// ===========================================         sec 2           ======================================= //

    function get_detail_barang(){
        $id['kd_barang']=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_app->getSelectedData('tbl_barang',$id)->result(),
        );
        $this->load->view('pages/barang_masuk/ajax_detail_barang',$data);
    }

// =========================================================================================================== //
// ===========================================    Tambah Pemesanan     ======================================= //
// ===========================================         sec 1           ======================================= //



//    DELETE
   
    function hapus(){
        $hapus['kd_pemesanan'] = $this->uri->segment(3);
        $this->model_app->deleteData("tbl_detail_pemesanan",$hapus);
        $this->model_app->deleteData("tbl_pemesanan",$hapus);
        redirect('Pemesanan');
    }
}
