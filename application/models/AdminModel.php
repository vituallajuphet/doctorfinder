<?php 

class AdminModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function login($args)
    {
        $msg = array();
        $args["password"] = md5($args["password"]);
        $check_if_admin_exist = $this->db->where($args)->get('admin');
        
        if( $check_if_admin_exist->num_rows() > 0 ){
            $msg["admin_data"] = $check_if_admin_exist->result_array();
            $msg["message"] = "Successfully login";
            $msg["code"] = "400";
        } else {
            $msg["message"] = "Invalid username and password";
            $msg["code"] = "404";
        }
        return $msg;
    }

}