<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct(){
        parent:: __construct();

    }

    public function LOGIN_USER($email, $password){
        $array = array('email' => $email, 'password' => $password);
        $res =$this->db->from("user_tb")->where($array)->get();
        $user_data = [];
        if($res->num_rows() > 0){
            $user_data = [
                'fname' => $res->row()->fname,
                'user_id' => $res->row()->id,
            ];
        }
        return $user_data;
    }

	
}
