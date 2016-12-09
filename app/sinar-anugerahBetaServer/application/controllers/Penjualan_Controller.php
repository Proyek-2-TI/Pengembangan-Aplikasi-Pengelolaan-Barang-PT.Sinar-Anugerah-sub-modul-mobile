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

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
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
        $id['ID_CUSTOMER']=$this->input->post('id_customer');
        $data=array(
            'detail_customer'=>$this->Global_model->getSelectedData('TBL_CUSTOMER',$id)->result(),
        );
        $this->load->view('pages/penjualan/ajax_detail_customer',$data);
    }

    function get_detail_barang(){
        $id['ID_BARANG']=$this->input->post('id_barang');
        $data=array(
            'detail_barang'=>$this->Global_model->getSelectedData('TBL_BARANG',$id)->result(),
        );
        $this->load->view('pages/penjualan/ajax_detail_barang',$data);
    }

    function tambah_penjualan_to_cart(){
        $data = array(
            'id'    => $this->input->post('id_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga_barang'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($data);
        redirect('Penjualan_Controller/tambah_penjualan');
    }

    function simpan_penjualan(){
        $data = array(
            'ID_PENJUALAN'=>$this->input->post('id_penjualan'),
            'ID_CUSTOMER'=>$this->input->post('ID_CUSTOMER'),
            'TOTAL_PENJUALAN'=>$this->input->post('total_penjualan'),
            'TGL_PENJUALAN'=>date("d/M/Y",strtotime($this->input->post('tgl_penjualan'))),
            'ID_PEGAWAI'=>$this->session->userdata('ID'),
        );
        $this->Global_model->insertData("TBL_PENJUALAN",$data);

        foreach($this->cart->contents() as $items){
            $id_barang = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'ID_PENJUALAN' => $this->input->post('id_penjualan'),
                'ID_BARANG'=> $id_barang,
                'QTY'=>$qty,
            );
            $this->Global_model->insertData('ALDY.TBL_PENJUALAN_DETAIL',$data_detail);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('Penjualan_Controller');
    }
}
