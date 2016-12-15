<?php
class Return_Customer_Model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAllDataReturnPenjualan(){
        return $this->db->query("SELECT
                a.ID_PENJUALAN,
                a.TGL_PENJUALAN,
                a.TOTAL_PENJUALAN,
                b.NM_CUSTOMER,
                c.NM_PEGAWAI,
                (select count(ID_PENJUALAN) as jum from TBL_PENJUALAN_DETAIL where ID_PENJUALAN=a.ID_PENJUALAN and STATUS_RETURN = 'yes') as jumlah
                from TBL_PENJUALAN a
	            join TBL_CUSTOMER b on a.ID_CUSTOMER=b.ID_CUSTOMER
	            join TBL_PEGAWAI c on a.ID_PEGAWAI=c.ID_PEGAWAI

                where a.RETURN_PENJUALAN = 'yes'
                ORDER BY a.ID_PENJUALAN DESC
        ")->result();
    }    

    function getBarangReturnPenjualan($id){
        return $this->db->query("SELECT *
                from TBL_PENJUALAN_DETAIL a
	            join TBL_BARANG b on a.ID_BARANG=b.ID_BARANG
	            WHERE a.ID_PENJUALAN = '$id'
                ORDER BY b.NM_BARANG DESC
        ")->result();
    }    

}