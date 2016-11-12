<?php

class Global_model extends CI_Model{
    function __construct(){
        parent::__construct();
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

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function manualQuery($q)
    {
        return $this->db->query($q);
    }

}