<?php

class Supplier_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getIdSupplier($id){
        return $this->db->query("SELECT * from TBL_SUPPLIER where ID_SUPPLIER = '$id'")->result();
    }

}