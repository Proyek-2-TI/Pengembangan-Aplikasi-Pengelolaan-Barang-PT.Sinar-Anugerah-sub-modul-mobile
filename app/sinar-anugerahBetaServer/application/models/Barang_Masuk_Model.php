<?php

class Barang_Masuk_Model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAllDataBarangMasuk(){
        return $this->db->query("
        	SELECT
            a.ID_BARANG_MASUK,
            a.TGL_BARANG_MASUK,
            (select count(ID_BARANG_MASUK) as jum from TBL_BARANG_MASUK_DETAIL where ID_BARANG_MASUK=a.ID_BARANG_MASUK) as jumlah
            from ALDY.TBL_BARANG_MASUK a
            ORDER BY a.ID_BARANG_MASUK desc
        ")->result();
    }

    function getAllBarangSupplier($id){
        return $this->db->query("
            SELECT *
            from TBL_BARANG a 
            join TBL_SUPPLIER b on a.ID_SUPPLIER=b.ID_SUPPLIER
            join TBL_JENIS_BARANG c on a.ID_JENIS_BARANG=c.ID_JENIS_BARANG
            where a.ID_SUPPLIER='$id'
        ")->result();
    }

    public function getKodeBarangMasuk(){
        $q = $this->db->query("select MAX(SUBSTR(ID_BARANG_MASUK,-3,3)) as ID_MAX from TBL_BARANG_MASUK");
        $ID = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->ID_MAX)+1;
                $ID = sprintf("%03s", $tmp);
            }
        }else{
            $ID = "001";
        }
        return "bm".$ID;
    }

}