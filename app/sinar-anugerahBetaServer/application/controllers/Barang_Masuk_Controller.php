<?php
class Barang_Masuk_Controller extends CI_Controller {
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
            'dashboard' => 'active' ,   'pegawai' => '' ,
            'barang'    => '' ,         'supplier' => '' ,
            'customer'  => '' ,         'penjualan' => '' ,

            'title'=>'Barang Masuk',
            'headerPage'=>'Data Barang Masuk',
            'headerPanel'=>'Kelola Barang Masuk',

            'data_barang_masuk'=>$this->Barang_Masuk_Model->getAllDataBarangMasuk(),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang_masuk/v_barang_masuk');
        $this->load->view('elements/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function select_supplier(){
        $data=array(
            'dashboard' => 'active' ,   'pegawai' => '' ,
            'barang'    => '' ,         'supplier' => '' ,
            'customer'  => '' ,         'penjualan' => '' ,

            'title'=>'Barang Masuk',
            'headerPage'=>'Data Barang Masuk',
            'headerPanel'=>'Kelola Barang Masuk',

            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang_masuk/v_select_supplier');
        $this->load->view('elements/v_footer');
        
    }

    function view_barang(){
        $id= $this->uri->segment(3);
        $data=array(
            'dashboard' => 'active' ,   'pegawai' => '' ,
            'barang'    => '' ,         'supplier' => '' ,
            'customer'  => '' ,         'penjualan' => '' ,

            'title'=>'Barang Masuk',
            'headerPage'=>'Data Barang Masuk',
            'headerPanel'=>'Kelola Barang Masuk',

            'data_barang'=>$this->Barang_Masuk_Model->getAllBarangSupplier($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang_masuk/v_barang_supplier');
        $this->load->view('elements/v_footer');
    }

    function pages_tambah_barang_masuk(){

        $id= $this->uri->segment(3);
        
        $detail = array(
            'id'    => $this->input->post('id_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('qty'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($detail);

        $data=array(
            'dashboard' => 'active' ,   'pegawai' => '' ,
            'barang'    => '' ,         'supplier' => '' ,
            'customer'  => '' ,         'penjualan' => '' ,

            'title'=>'Barang Masuk',
            'headerPage'=>'Tambah Data Barang Masuk',
            'headerPanel'=>'Kelola Data Barang Masuk',

            'id_barang_masuk'=>$this->Barang_Masuk_Model->getKodeBarangMasuk(),
            'data_barang'=>$this->Barang_Masuk_Model->getAllBarangSupplier($id),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang_masuk/v_add_barang_masuk');
        $this->load->view('elements/v_footer');
    }

    function get_detail_barang(){
        $id['ID_BARANG']=$this->input->post('id_barang');
        $data=array(
            'detail_barang'=>$this->Global_model->getSelectedData('TBL_BARANG',$id)->result(),
        );
        $this->load->view('pages/barang_masuk/ajax_detail_barang',$data);
    }

    function simpan_barang_masuk(){
        $data = array(
            'ID_BARANG_MASUK'=>$this->input->post('id_barang_masuk'),
            'ID_SUPPLIER'=> $this->input->post('id_supplier'),
            'TGL_BARANG_MASUK'=>date("d/M/Y",strtotime($this->input->post('tgl_barang_masuk'))),
            'ID_PEGAWAI'=>$this->session->userdata('ID'),
        );
        $this->Global_model->insertData("TBL_BARANG_MASUK",$data);

        foreach($this->cart->contents() as $items){
            $id_barang = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'ID_BARANG_MASUK' => $this->input->post('id_barang_masuk'),
                'ID_BARANG'=> $id_barang,
                'QTY'=>$qty,
            );
            $this->Global_model->insertData('ALDY.TBL_BARANG_MASUK_DETAIL',$data_detail);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('Barang_Masuk_Controller');
    }

}