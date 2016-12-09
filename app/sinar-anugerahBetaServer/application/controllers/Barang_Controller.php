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
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => 'active' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => '' ,

            'title'=>'Barang',
            'headerPage'=>'Data Barang',
            'headerPanel'=>'List Data Barang',

            'data_barang'=>$this->Barang_model->getAllDataBarang(),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang/v_barang');
        $this->load->view('elements/v_footer');
    }

    function tambah_barang(){
        $data=array(
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => 'active' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => '' ,

            'title'=>'Barang',
            'headerPage'=>'Data Barang',
            'headerPanel'=>'Tambah Data Barang',

            'ID_BARANG'=>$this->Barang_model->getKodeBarang(),
            'jenis_barang'=>$this->Global_model->getAllData('TBL_JENIS_BARANG'),
            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang/v_add_barang');
        $this->load->view('elements/v_footer');
    }

    function proses_tambah_barang(){
        $this->load->helper(array('form','file','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('companyname','CompanyName','trim|required');

        $config_image = array();
        $config_image['upload_path']    = './uploads';
        $config_image['allowed_types']  = 'jpg|png|gif';
        $config_image['max_size']       = '1024';

        $this->load->library('upload',$config_image);

            $this->upload->do_upload();
            $data=array('upload_data' => $this->upload->data());
            
            $this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);

            $products = array(
                'ID_BARANG' => $this->input->post('id_barang'),
                'NM_BARANG' => $this->input->post('nm_barang'),
                'STOK_BARANG' => $this->input->post('stok_barang'),
                'HARGA_BARANG' => $this->input->post('harga_barang'),
                'RUSAK_BARANG' => $this->input->post('rusak_barang'),
                'ID_JENIS_BARANG' => $this->input->post('id_jenis_barang'),
                'ID_SUPPLIER' => $this->input->post('id_supplier'),
                'GBR_BARANG' => $data['upload_data']['file_name']
                );
            $this->Global_model->insertData('TBL_BARANG', $products);
            redirect("Barang_Controller");
    }

    public function image_resize($path,$file)
    {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['maintian_ratio'] = TRUE;
        $config_resize['width'] = 250;
        $config_resize['height'] = 250;
        $config_resize['new_image'] = './uploads/thumb/'.$file;

        $this->load->library('image_lib',$config_resize);
        $this->image_lib->resize();
    }

    function edit_data_barang(){
        $id= $this->uri->segment(3);
        $data=array(
            'dashboard' => '' , 'pegawai' => '' ,
            'barang' => 'active' , 'supplier' => '' ,
            'customer' => '' , 'penjualan' => '' ,

            'title'=>'Barang',
            'headerPage'=>'Data Barang',
            'headerPanel'=>'Edit Data Barang',


            'data_supplier'=>$this->Global_model->getAllData('TBL_SUPPLIER'),
            'data_jenis_barang'=>$this->Global_model->getAllData('TBL_JENIS_BARANG'),
            'data_barang'=>$this->Barang_model->getIdBarang($id),
        );
        $this->load->view('elements/v_header',$data);
        $this->load->view('pages/barang/v_edit_barang');
        $this->load->view('elements/v_footer');
    }

    function proses_edit_barang(){
        $this->load->helper(array('form','file','url'));

        $config_image = array();
        $config_image['upload_path']    = './uploads';
        $config_image['allowed_types']  = 'jpg|png|gif';
        $config_image['max_size']       = '1024';

        $this->load->library('upload',$config_image);

            $this->upload->do_upload();
            $data=array('upload_data' => $this->upload->data());
            
            $this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
            $id['ID_BARANG'] = $this->input->post('id_barang');
            $products = array(
                'NM_BARANG' => $this->input->post('nm_barang'),
                'STOK_BARANG' => $this->input->post('stok_barang'),
                'HARGA_BARANG' => $this->input->post('harga_barang'),
                'RUSAK_BARANG' => $this->input->post('rusak_barang'),
                'ID_JENIS_BARANG' => $this->input->post('id_jenis_barang'),
                'ID_SUPPLIER' => $this->input->post('id_supplier'),
                'GBR_BARANG' => $data['upload_data']['file_name']
                );
            $this->Global_model->updateData('TBL_BARANG', $products,$id);
            redirect("Barang_Controller");
    }

    function hapus_barang(){
        $id['ID_BARANG'] = $this->uri->segment(3);
        $this->Global_model->deleteData('TBL_BARANG',$id);
        redirect("Barang_Controller");
    }

}