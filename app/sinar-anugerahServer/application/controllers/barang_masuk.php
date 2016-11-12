<?php
class Barang_masuk extends CI_Controller{
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
            'title'=>'Barang Masuk Gudang',
            'data_barang_masuk'=>$this->model_app->getAllDataBarangMasuk(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/barang_masuk/v_barang_masuk');
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function barang_masuk_gudang(){
        $data=array(
            'title'=>'Barang Masuk Gudang',
            'kd_supplier'=>$this->model_app->getKodeSupplier(),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/barang_masuk/v_supplier');
        $this->load->view('element/v_footer');
        
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

    function detail_barang_masuk(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Barang Masuk',
            'dt_barang_masuk'=>$this->model_app->getDataBarangMasuk($id),
            'barang_masuk'=>$this->model_app->getBarangMasuk($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/barang_masuk/v_detail_barang_masuk');
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
        $this->load->view('pages/barang_masuk/v_barang_supplier');
        $this->load->view('element/v_footer');
    }

// ===========================================    Tambah Pemesanan     ======================================= //
// ===========================================         sec 1           ======================================= //
    function pages_tambah_barang_masuk(){
        $id= $this->uri->segment(3);
        $detail = array(
            'id'    => $this->input->post('kd_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('d_rusak'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($detail);

        $data=array(
            'title'=>'Tambah Barang Masuk',
            'kd_barang_masuk'=>$this->model_app->getKodeBarangMasuk(),
            'data_barang'=>$this->model_app->getAllSupplierBarang($id),
            'data_supplier'=>$this->model_app->getAllData('tb_supplier'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/barang_masuk/v_add_barang_masuk');
        $this->load->view('element/v_footer');
    }

    function simpan_barang_masuk(){
        $data = array(
            'kd_barang_masuk'=>$this->input->post('kd_barang_masuk'),
            'kd_supplier'=>$this->input->post('kd_supplier'),
            'tanggal_masuk'=>date("Y-m-d",strtotime($this->input->post('tanggal_masuk'))),
            'kd_pegawai'=>$this->session->userdata('ID'),
        );
        $this->model_app->insertData("tbl_barang_masuk",$data);

        foreach($this->cart->contents() as $items){
            $kd_barang = $items['id'];
            $qty = $items['qty'];
            $d_rusak = $items['price'];
            $data_detail = array(
                'kd_barang_masuk' => $this->input->post('kd_barang_masuk'),
                'kd_barang'=> $kd_barang,
                'qty'=>$qty,
                'd_rusak'=>$d_rusak,
            );
            $this->model_app->insertData("tbl_barang_masuk_detail",$data_detail);

        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('barang_masuk');
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
    function hapus_barang(){
        $id= $this->uri->segment(3);
        $bc=$this->model_app->getSelectedData("tbl_penjualan_header",$id);
        foreach($bc->result() as $dph){
            $sess_data['kd_penjualan'] = $dph->kd_penjualan;
            $this->session->set_userdata($sess_data);
        }

        $kode = explode("/",$_GET['kode']);
        if($kode[0]=="tambah")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
        }
        else if($kode[0]=="edit")
        {
            $data = array(
                'rowid' => $kode[1],
                'qty'   => 0
            );
            $this->cart->update($data);
            $hps['kd_penjualan'] = $kode[2];
            $hps['kd_barang'] = $kode[3];
            $this->model_app->deleteData("tbl_penjualan_detail",$hps);

            $key_barang['kd_barang'] = $hps['kd_barang'];
            $d_u['stok'] = $kode[4]+$kode[5];
            $this->model_app->updateData("tbl_barang",$d_u,$key_barang);
        }
        redirect('penjualan/pages_edit/'.$this->session->userdata('kd_penjualan'));
    }

    function hapus(){
        $hapus['kd_barang_masuk'] = $this->uri->segment(3);
        $this->model_app->deleteData("tbl_barang_masuk_detail",$hapus);
        $this->model_app->deleteData("tbl_barang_masuk",$hapus);
        redirect('barang_masuk');
    }
}
