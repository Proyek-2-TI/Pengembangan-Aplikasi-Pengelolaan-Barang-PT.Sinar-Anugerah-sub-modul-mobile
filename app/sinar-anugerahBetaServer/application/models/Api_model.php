<?php

class Api_model extends CI_Model {

    function login($username, $password)
    {
        $result = $this->db->query("
        	SELECT *
            FROM TBL_CUSTOMER
            WHERE USERNAME = '$username' AND PASSWORD = '$password'");
        return $result->result();
    }

}