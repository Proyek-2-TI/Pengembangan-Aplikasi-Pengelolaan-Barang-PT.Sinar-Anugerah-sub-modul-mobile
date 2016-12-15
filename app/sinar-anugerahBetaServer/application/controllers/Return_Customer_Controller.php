<?php
class Return_Customer_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
        $this->load->helper('currency_format_helper');
    }

    function index () {
        $data=array(
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => 'active' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => '' ,

            'title'=>'Return Barang',
            'headerPage'=>'Return Data Barang',
            'headerPanel'=>'List Data Return Barang',

            'data_penjualan'=>$this->Return_Customer_Model->getAllDataReturnPenjualan(),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/return_customer/v_return_customer');
        $this->load->view('elements/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();     	
    }

    function pilihPenjualan () {
        $id= $this->uri->segment(3);
        if ($this->input->post('statusPost') == 'inputRB') {
            $ids['ID_BARANG'] = $this->input->post('id_barang');
            $data=array(
                'QTY_RUSAK'=>$this->input->post('qty_rusak'),
                'STATUS_RETURN'=>'proses',
            );
            $this->Global_model->updateData('TBL_PENJUALAN_DETAIL',$data,$ids);                        
        }
        $data=array(
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => 'active' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => '' ,

            'title'=>'Return Barang',
            'headerPage'=>'Return Data Barang',
            'headerPanel'=>'List Data Return Barang',

            'data_penjualan'=>$this->Return_Customer_Model->getBarangReturnPenjualan($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/return_customer/v_list_barang');
        $this->load->view('elements/v_footer');
    }

}