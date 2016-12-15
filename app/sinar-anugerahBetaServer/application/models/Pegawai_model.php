<?php
class Pegawai_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getIdPegawai($id){
        return $this->db->query("SELECT * from TBL_PEGAWAI where ID_PEGAWAI = '$id'")->result();
    }
//    function insert 
    public function getKodePegawai(){
        $q = $this->db->query("select MAX(SUBSTR(ID_PEGAWAI,-3,3)) as ID_MAX from TBL_PEGAWAI");
        $ID = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->ID_MAX)+1;
                $ID = sprintf("%03s", $tmp);
            }
        }else{
            $ID = "001";
        }
        return "pg".$ID;
    }
    public function insertPegawai()
    {
        $id_pegawai    = $this->input->post('id_pegawai');
        $username    = $this->input->post('username');
        $password  = $this->input->post('password');
        $nm_pegawai = $this->input->post('nm_pegawai');
        $id_lvl_akses = $this->input->post('id_lvl_akses');
        $data=array(
            'ID_PEGAWAI'=> $this->input->post('id_pegawai'),
            'USERNAME'=>$this->input->post('username'),
            'PASSWORD'=>$this->input->post('password'),
            'NM_PEGAWAI'=>$this->input->post('nm_pegawai'),
            'ID_LVL_AKSES'=>$this->input->post('id_lvl_akses'),
        );
        $this->db->insert('TBL_PEGAWAI',$data);
    }
}