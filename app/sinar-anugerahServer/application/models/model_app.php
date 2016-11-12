<?php

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }
// ===================================================================================================== //
//                                                                                                       //
//                                              PEMESANAN                                                //
//                                                                                                       //
// ===================================================================================================== //
    //    KODE PEMESANAN
      function getAllDataPemesanan(){
        return $this->db->query("SELECT
                a.kd_pemesanan,
                a.tgl_pemesanan,
                (select count(kd_pemesanan) as jum from tbl_detail_pemesanan where kd_pemesanan=a.kd_pemesanan) as jumlah
                from tbl_pemesanan a
                ORDER BY a.kd_pemesanan desc
        ")->result();
    }

    function getDataPemesanan($id){
        return $this->db->query("SELECT * from tbl_pemesan a
                left join tb_supplier b on a.kd_supplier=b.kd_supplier
                left join tbl_pegawai c on a.kd_pegawai=c.kd_pegawai
                where a.kd_pemesanan = '$id'")->result();
    }

    function getPemesanan($id){
        return $this->db->query("
                select a.kd_pemesanan,a.qty,b.nm_barang
                from tbl_detail_pemesanan a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_pemesanan = '$id'")->result();
    } 

    public function getKodePemesanan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pemesanan,3)) as kd_max from tbl_pemesanan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "Bm".$kd;
    }

    function getAllSupplierBarang($id){
        return $this->db->query("
                select *
                from tbl_barang a
                join tb_supplier b on a.kd_supplier = b.kd_supplier 
                where a.kd_supplier = '$id'
                order by a.kd_supplier
                ")->result();
    }    
    
    function getAllBarangSupplier($id){
        return $this->db->query("
            select *
            from tbl_barang a 
            join tb_supplier b on a.kd_supplier=b.kd_supplier
            join tbl_jenis_barang c on a.id_jenis_barang=c.id_jenis_barang
            where a.kd_supplier='$id'
            ")->result();
    }
    

// ===================================================================================================== //
//                                                                                                       //
//                                              PENJUALAN                                                //
//                                                                                                       //
// ===================================================================================================== //

    //    KODE PENJUALAN
    public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penjualan,3)) as kd_max from tbl_penjualan_header");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "Pn".$kd;
    }

    function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.kd_penjualan,
                a.tanggal_penjualan,
                a.total_harga,
                (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan) as jumlah
                from tbl_penjualan_header a 
                ORDER BY a.kd_penjualan DESC
        ")->result();
    }

    function getDataPenjualan($id){
        return $this->db->query("SELECT * from tbl_penjualan_header a
                left join tbl_pelanggan b on a.kd_pelanggan=b.kd_pelanggan
                left join tbl_pegawai c on a.kd_pegawai=c.kd_pegawai
                where a.kd_penjualan = '$id'")->result();
    }

    function getBarangPenjualan($id){
        return $this->db->query("
                select a.kd_barang,a.qty,a.rusak,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id'")->result();
    }

    function getBarangJual(){
        return $this->db->query ("SELECT * from tbl_barang where stok > 0")->result();
    }

// ===================================================================================================== //
//                                                                                                       //
//                                          RETURN CUSTOMER                                              //
//                                                                                                       //
// ===================================================================================================== //
    function getAllBarangReturn($id){
        return $this->db->query("
                select a.kd_barang,a.qty,a.rusak,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id' and a.return_dt = ''")->result();
    }

    function getBarangReturn($id){
        return $this->db->query("
                select a.kd_barang,a.qty,a.rusak,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id' and a.return_dt = ''")->result();
    }

    function getBarangReturnCustomer($id){
        return $this->db->query("
                select a.kd_barang,a.qty,a.rusak,a.status,a.rusak,a.ket,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id' and a.return_dt = 'yes'")->result();
    }

    function getSisaReturn($id){
        return $this->db->query("
                select a.kd_barang,a.qty,a.rusak,a.status,a.rusak,a.ket,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id' and a.return_dt = 'yes' and a.status = 'proses'")->result();
    }

    function getAllDataReturnPenjualan(){
        return $this->db->query("SELECT
                a.kd_penjualan,
                (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan and return_dt = 'yes') as jumlah
                from tbl_penjualan_header a
                where a.dt_return = 'yes'
                ORDER BY a.kd_penjualan DESC
        ")->result();
    }
// ===================================================================================================== //
//                                                                                                       //
//                                        VERIFIKASI GUDANG                                              //
//                                                                                                       //
// ===================================================================================================== //

    function getVerifikasi(){
        return $this->db->query("SELECT
                a.id,a.kd_penjualan, b.nm_barang, a.qty, a.rusak, a.ket, a.status
                from tbl_penjualan_detail a
                join tbl_barang b on a.kd_barang = b.kd_barang
                where a.return_dt = 'yes'
                ORDER BY a.status ASC
        ")->result();
    }

    function getSelectedVerifikasi($id){
        return $this->db->query("SELECT
                a.id,a.kd_barang,a.kd_penjualan, b.nm_barang, a.qty, a.rusak, a.ket, a.status
                from tbl_penjualan_detail a
                join tbl_barang b on a.kd_barang = b.kd_barang
                where a.id = '$id' and a.return_dt = 'yes'
                ORDER BY a.kd_penjualan DESC
        ")->result();
    }
// ===================================================================================================== //
//                                                                                                       //
//                                            BARANG MASUK                                               //
//                                                                                                       //
// ===================================================================================================== //

    function getAllDataBarangMasuk(){
        return $this->db->query("SELECT
                a.kd_barang_masuk,
                a.tanggal_masuk,
                (select count(kd_barang_masuk) as jum from tbl_barang_masuk_detail where kd_barang_masuk=a.kd_barang_masuk) as jumlah
                from tbl_barang_masuk a
                ORDER BY a.kd_barang_masuk desc
        ")->result();
    }

    function getDataBarangMasuk($id){
        return $this->db->query("SELECT * from tbl_barang_masuk a
                left join tb_supplier b on a.kd_supplier=b.kd_supplier
                left join tbl_pegawai c on a.kd_pegawai=c.kd_pegawai
                where a.kd_barang_masuk = '$id'")->result();
    }

    function getBarangMasuk($id){
        return $this->db->query("
                select a.kd_barang,a.qty,b.nm_barang
                from tbl_barang_masuk_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_barang_masuk = '$id'")->result();
    } 

    public function getKodeBarangMasuk()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_barang_masuk,3)) as kd_max from tbl_barang_masuk");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "Bm".$kd;
    }


// ===================================================================================================== //
//                                                                                                       //
//                                           RETURN BARANG                                               //
//                                                                                                       //
// ===================================================================================================== //

// ===================================================================================================== //
//                                                                                                       //
//                                              BARANG                                                   //
//                                                                                                       //
// ===================================================================================================== //

    function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(kd_barang,3)) as kd_max from tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "Br".$kd;
    }

    function getBarang($id){
        return $this->db->query("SELECT * 
            from tbl_barang a 
            join tbl_jenis_barang b on a.id_jenis_barang=b.id_jenis_barang
            join tb_supplier c on a.kd_supplier=c.kd_supplier
            where a.kd_barang = '$id'
            ")->result();
    }

    function getKodeJenisBarang(){
        $q = $this->db->query("select MAX(RIGHT(id_jenis_barang,3)) as kd_max from tbl_jenis_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "Jb".$kd;
    }

        function getAllDataBarang(){
        return $this->db->query("SELECT
                a.kd_barang,
                a.nm_barang,
                c.nm_supplier,
                a.stok,
                a.rusak,
                a.harga,
                b.jenis_barang
                from tbl_barang a
                inner join tbl_jenis_barang b on a.id_jenis_barang = b.id_jenis_barang
                inner join tb_supplier c on a.kd_supplier = c.kd_supplier
                ORDER BY a.nm_barang ASC
        ")->result();
    }

        function getAllBarangRusak(){
        return $this->db->query("SELECT
                a.kd_barang,
                a.nm_barang,
                c.nm_supplier,
                a.stok,
                a.rusak,
                b.jenis_barang
                from tbl_barang a
                inner join tbl_jenis_barang b on a.id_jenis_barang = b.id_jenis_barang
                inner join tb_supplier c on a.kd_supplier = c.kd_supplier
                where a.rusak > '0'
                ORDER BY a.nm_barang ASC
        ")->result();
    }

// ===================================================================================================== //
//                                                                                                       //
//                                              PELANGGAN                                                //
//                                                                                                       //
// ===================================================================================================== //

    public function getKodePelanggan(){
        $q = $this->db->query("select MAX(RIGHT(kd_pelanggan,3)) as kd_max from tbl_pelanggan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "Pl".$kd;
    }

    function getPelanggan($id){
        return $this->db->query("SELECT * from tbl_pelanggan where kd_pelanggan = '$id'")->result();
    }

// ===================================================================================================== //
//                                                                                                       //
//                                              SUPPLIER                                                 //
//                                                                                                       //
// ===================================================================================================== //

    public function getKodeSupplier(){
        $q = $this->db->query("select MAX(RIGHT(kd_supplier,3)) as kd_max from tb_supplier");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "Sp".$kd;
    }

    function getSupplier($id){
        return $this->db->query("SELECT * from tb_supplier where kd_supplier = '$id'")->result();
    }

// ===================================================================================================== //
//                                                                                                       //
//                                              PEGAWAI                                                  //
//                                                                                                       //
// ===================================================================================================== //

    public function getKodePegawai(){
        $q = $this->db->query("select MAX(RIGHT(kd_pegawai,3)) as kd_max from tbl_pegawai");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "Pg".$kd;
    }

    function getPegawai($id){
        return $this->db->query("SELECT * from tbl_pegawai where kd_pegawai = '$id'")->result();
    }

// ===================================================================================================== //
//                                                                                                       //
//                                          UPDATE STOK                                                  //
//                                                                                                       //
// ===================================================================================================== //

    public function getTambahStok($kd_barang,$tambah)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }
    public function getKembalikanStok($kd_barang)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok;
        }
        return $stok;
    }

// ===================================================================================================== //
//                                                                                                       //
//                                              GLOBAL                                                   //
//                                                                                                       //
// ===================================================================================================== //

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
    function manualQuery($q)
    {
        return $this->db->query($q);
    }



// ===================================================================================================== //
//                                                                                                       //
//                                              LOGIN                                                    //
//                                                                                                       //
// ===================================================================================================== //

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

}