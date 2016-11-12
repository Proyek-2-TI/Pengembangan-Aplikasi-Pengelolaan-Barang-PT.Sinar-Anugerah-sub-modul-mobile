<?php
class Supplier_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
    }

    function index(){
        $data=array(
            'title'=>'Data Supplier',
            'ID_SUPPLIER'=>$this->Supplier_model->getKodeSupplier(),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/admin/v_supplier');
        $this->load->view('elements/v_footer');
    }

    function tambah_supplier(){

        $this->Supplier_model->insertSupplier();
        redirect("Supplier_Controller");
    }

    function edit_data_supplier(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Edit Data Supplier',
            'dt_supplier'=>$this->Supplier_model->getIdSupplier($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/admin/v_edit_supplier');
        $this->load->view('elements/v_footer');
    }

    function edit_supplier(){
        $id['ID_SUPPLIER'] = $this->input->post('id_supplier');
        $data=array(
            'NM_SUPPLIER'=>$this->input->post('nm_supplier'),
            'ALMT_SUPPLIER'=>$this->input->post('almt_supplier'),
            'EMAIL_SUPPLIER'=>$this->input->post('email_supplier'),
        );
        $this->Global_model->updateData('TBL_SUPPLIER',$data,$id);
        redirect("Supplier_Controller");
    }

    function hapus_supplier(){
        $id['ID_SUPPLIER'] = $this->uri->segment(3);
        $this->Global_model->deleteData('TBL_SUPPLIER',$id);
        redirect("Supplier_Controller");
    }

}