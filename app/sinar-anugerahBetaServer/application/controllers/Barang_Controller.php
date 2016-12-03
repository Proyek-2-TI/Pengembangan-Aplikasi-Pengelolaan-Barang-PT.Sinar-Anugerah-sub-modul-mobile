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

    function edit_data_barang(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Edit Data Barang',
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
            'data_jenis_barang'=>$this->Global_model->getAllData('TBL_JENIS_BARANG'),
            'data_barang'=>$this->Barang_model->getIdBarang($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang/v_edit_barang');
        $this->load->view('elements/v_footer');
    }

    function edit_barang(){
        $id['ID_BARANG'] = $this->input->post('id_barang');
        $data=array(
            'NM_BARANG'=>$this->input->post('nm_barang'),
            'STOK_BARANG'=>$this->input->post('stok_barang'),
            'HARGA_BARANG'=>$this->input->post('harga_barang'),
            'RUSAK_BARANG'=>$this->input->post('rusak_barang'),
            'ID_JENIS_BARANG'=>$this->input->post('id_jenis_barang'),
            'ID_SUPPLIER'=>$this->input->post('id_supplier'),
        );
        $this->Global_model->updateData('TBL_BARANG',$data,$id);
        redirect("Barang_Controller");

    }

    function hapus_barang(){
        $id['ID_BARANG'] = $this->uri->segment(3);
        $this->Global_model->deleteData('TBL_BARANG',$id);
        redirect("Barang_Controller");
    }

}