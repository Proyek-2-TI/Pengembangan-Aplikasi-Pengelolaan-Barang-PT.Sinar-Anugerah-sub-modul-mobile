<?php
class Penjualan_model extends CI_Model{

    function getAllDataPenjualan(){
        return $this->db->query("
            SELECT *
            FROM ALDY.TBL_PENJUALAN 
            INNER JOIN ALDY.TBL_CUSTOMER ON TBL_PENJUALAN.ID_CUSTOMER = TBL_CUSTOMER.ID_CUSTOMER
            INNER JOIN ALDY.TBL_PEGAWAI ON TBL_PENJUALAN.ID_PEGAWAI = TBL_PEGAWAI.ID_PEGAWAI
            ORDER BY ID_PENJUALAN ASC
        ")->result();
    }

    function getDetailPenjualan($id){
        return $this->db->query("
            SELECT *
            FROM ALDY.TBL_PENJUALAN_DETAIL 
            INNER JOIN ALDY.TBL_BARANG ON TBL_PENJUALAN_DETAIL.ID_BARANG = TBL_BARANG.ID_BARANG
            WHERE TBL_PENJUALAN_DETAIL.ID_PENJUALAN = '$id'
            ORDER BY TBL_PENJUALAN_DETAIL.ID_BARANG ASC
        ")->result();
    }

    public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(SUBSTR(ID_PENJUALAN,-3,3)) as ID_MAX from TBL_PENJUALAN");
        $ID = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->ID_MAX)+1;
                $ID = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $ID = "001";
        }
        return "Pn".$ID;
    }

    function getBarangJual(){
        return $this->db->query ("SELECT * from TBL_BARANG where STOK_BARANG > 0")->result();
    }

}