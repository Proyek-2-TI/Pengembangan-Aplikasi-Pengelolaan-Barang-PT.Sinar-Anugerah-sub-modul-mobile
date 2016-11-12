<?php

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('TBL_PEGAWAI');
        $this->db->where('USERNAME', $username);
        $this->db->where('PASSWORD', $password);
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