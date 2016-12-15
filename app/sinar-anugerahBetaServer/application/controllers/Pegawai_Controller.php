<?php
class Pegawai_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','USERNAME ATAU PASSWORD ANDA SALAH ');
            redirect('');
        };
    }
    function index(){
        $data=array(
            'dashboard' => '' , 'pegawai' => 'active' ,
            'barang' => '' , 'supplier' => '' ,
            'penjualan' => '' , 'customer' => '' ,
            'title'=>'Data Pegawai',
            'headerPage'=>'Data Pegawai',
            'headerPanel'=>'List Data Pegawai',
            'ID_PEGAWAI'=>$this->Pegawai_model->getKodePegawai(),
            'data_pegawai'=>$this->Global_model->getAllData('TBL_PEGAWAI'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/pegawai/v_pegawai');
        $this->load->view('elements/v_footer');
    }
    function tambah_pegawai(){
        $data=array(
            'dashboard' => '' , 'pegawai' => 'active' ,
            'barang' => '' , 'supplier' => '' ,
            'penjualan' => '' , 'customer' => '' ,
            'title'=>'Pegawai',
            'headerPage'=>'Data Pegawai',
            'headerPanel'=>'Tambah Data Pegawai',
            'ID_PEGAWAI'=>$this->Pegawai_model->getKodePegawai(),
            'data_pegawai'=>$this->Global_model->getAllData('TBL_PEGAWAI'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/pegawai/v_add_pegawai');
        $this->load->view('elements/v_footer');
    }
    function proses_tambah_pegawai(){
        $this->Pegawai_model->insertPegawai();
        redirect("Pegawai_Controller");
    }
    function edit_data_pegawai(){
        $id= $this->uri->segment(3);
        $data=array(
            'dashboard' => '' , 'pegawai' => 'active' ,
            'barang' => '' , 'supplier' => '' ,
            'penjualan' => '' , 'customer' => '' ,
            'title'=>'Pegawai',
            'headerPage'=>'Data Pegawai',
            'headerPanel'=>'Edit Data Pegawai',
            'data_pegawai'=>$this->Pegawai_model->getIdPegawai($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/pegawai/v_edit_pegawai');
        $this->load->view('elements/v_footer');
    }
    function proses_edit_pegawai(){
        $id['ID_PEGAWAI'] = $this->input->post('id_pegawai');
        $data=array(
            'NM_PEGAWAI'=>$this->input->post('nm_pegawai'),
            'USERNAME'=>$this->input->post('username'),
            'PASSWORD'=>$this->input->post('password'),
            'NM_PEGAWAI'=>$this->input->post('nm_pegawai'),
            'ID_LVL_AKSES'=>$this->input->post('id_lvl_akses'),
        );
        $this->Global_model->updateData('TBL_PEGAWAI',$data,$id);
        redirect("Pegawai_controller");
    }
    function hapus_pegawai(){
        $id['ID_PEGAWAI'] = $this->uri->segment(3);
        $this->Global_model->deleteData('TBL_PEGAWAI',$id);
        redirect("Pegawai_Controller");
    }
}