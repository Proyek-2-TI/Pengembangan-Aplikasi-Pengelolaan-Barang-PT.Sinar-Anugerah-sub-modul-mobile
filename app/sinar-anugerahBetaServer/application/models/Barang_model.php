<?php

class Barang_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
// ===================================================================================================== //
//                                                                                                       //
//                                              PELANGGAN                                                //
//                                                                                                       //
// ===================================================================================================== //

    function getAllDataBarang(){
        return $this->db->query("
            SELECT *
            FROM ALDY.TBL_BARANG 
            INNER JOIN ALDY.TBL_JENIS_BARANG ON TBL_BARANG.ID_JENIS_BARANG = TBL_JENIS_BARANG.ID_JENIS_BARANG
            INNER JOIN ALDY.TBL_SUPPLIER ON TBL_BARANG.ID_SUPPLIER = TBL_SUPPLIER.ID_SUPPLIER
            ORDER BY NM_BARANG ASC
        ")->result();
    }

    public function getKodeBarang(){
        $q = $this->db->query("select MAX(SUBSTR(ID_BARANG,-3,3)) as ID_MAX from TBL_BARANG");
        $ID = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->ID_MAX)+1;
                $ID = sprintf("%03s", $tmp);
            }
        }else{
            $ID = "001";
        }
        return "br".$ID;
    }

    public function insertBarang()
    {
        $id_barang    = $this->input->post('id_barang');
        $nm_barang    = $this->input->post('nm_barang');
        $stok_barang  = $this->input->post('stok_barang');
        $harga_barang = $this->input->post('harga_barang');
        $id_jenis_barang = $this->input->post('id_jenis_barang');
        $id_supplier = $this->input->post('id_supplier');

        $data=array(
            'ID_BARANG'=> $this->input->post('id_barang'),
            'NM_BARANG'=>$this->input->post('nm_barang'),
            'STOK_BARANG'=>$this->input->post('stok_barang'),
            'HARGA_BARANG'=>$this->input->post('harga_barang'),
            'RUSAK_BARANG'=>$this->input->post('rusak_barang'),
            'ID_JENIS_BARANG'=>$this->input->post('id_jenis_barang'),
            'ID_SUPPLIER'=>$this->input->post('id_supplier'),
        );

        $this->db->insert('TBL_BARANG',$data);
    }

    function getIdBarang($id){
        return $this->db->query("
            SELECT *
            FROM ALDY.TBL_BARANG 
            INNER JOIN ALDY.TBL_JENIS_BARANG ON TBL_BARANG.ID_JENIS_BARANG = TBL_JENIS_BARANG.ID_JENIS_BARANG
            INNER JOIN ALDY.TBL_SUPPLIER ON TBL_BARANG.ID_SUPPLIER = TBL_SUPPLIER.ID_SUPPLIER
            where ID_BARANG = '$id'
            ")->result();
    }


}