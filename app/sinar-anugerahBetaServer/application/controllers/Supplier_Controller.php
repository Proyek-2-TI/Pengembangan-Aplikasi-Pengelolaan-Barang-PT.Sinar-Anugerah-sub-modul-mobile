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
            //'ID_SUPPLIER'=>$this->Supplier_model->getKodeSupplier(),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/admin/v_supplier');
        $this->load->view('elements/v_footer');
    }


    function tambah_customer(){

        $this->Customer_model->insertCustomer();
        redirect("Customer_Controller");
    }

    function edit_data_customer(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Edit Data Customer',
            'dt_customer'=>$this->Customer_model->getIdCustomer($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/admin/v_edit_customer');
        $this->load->view('elements/v_footer');
    }

    function edit_customer(){
        $id['ID_CUSTOMER'] = $this->input->post('id_customer');
        $data=array(
            'NM_CUSTOMER'=>$this->input->post('nm_customer'),
            'ALMT_CUSTOMER'=>$this->input->post('almt_customer'),
            'EMAIL_CUSTOMER'=>$this->input->post('email_customer'),
        );
        $this->Global_model->updateData('TBL_CUSTOMER',$data,$id);
        redirect("Customer_Controller");
    }


    function hapus_customer(){
        $id['ID_CUSTOMER'] = $this->uri->segment(3);
        $this->Global_model->deleteData('TBL_CUSTOMER',$id);
        redirect("Customer_Controller");
    }

}