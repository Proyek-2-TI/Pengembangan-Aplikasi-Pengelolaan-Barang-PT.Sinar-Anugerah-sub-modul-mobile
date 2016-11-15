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
}