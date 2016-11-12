<?php

class Supplier_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getIdSupplier($id){
        return $this->db->query("SELECT * from TBL_SUPPLIER where ID_SUPPLIER = '$id'")->result();
    }


//    function insert 

    public function getKodeSupplier(){
        $q = $this->db->query("select MAX(SUBSTR(ID_SUPPLIER,-3,3)) as ID_MAX from TBL_SUPPLIER");
        $ID = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->ID_MAX)+1;
                $ID = sprintf("%03s", $tmp);
            }
        }else{
            $ID = "001";
        }
        return "ps".$ID;
    }

    public function insertSupplier()
    {
        $id_supplier    = $this->input->post('id_supplier');
        $nm_supplier    = $this->input->post('nm_supplier');
        $almt_supplier  = $this->input->post('almt_supplier');
        $email_supplier = $this->input->post('email_supplier');

        $data=array(
            'ID_SUPPLIER'=> $this->input->post('id_supplier'),
            'NM_SUPPLIER'=>$this->input->post('nm_supplier'),
            'ALMT_SUPPLIER'=>$this->input->post('almt_supplier'),
            'EMAIL_SUPPLIER'=>$this->input->post('email_supplier'),
        );

        $this->db->insert('TBL_SUPPLIER',$data);
    }

}