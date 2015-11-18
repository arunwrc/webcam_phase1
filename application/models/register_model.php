<?php
/**
 * Created by PhpStorm.
 * User: arun
 * Date: 22/07/15
 * Time: 12:02 AM
 */
class Register_model extends CI_Model {

   
    public function add_new($data){
        return $this->db->insert('customer_data', $data);
    }

   

}


