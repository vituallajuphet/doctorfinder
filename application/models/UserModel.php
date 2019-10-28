<?php
defined('BASEPATH') OR exit('No direct script access allowed');

<<<<<<< HEAD
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
=======
class UserModel extends CI_Model{

    private $result = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($args)
    {
        $msg = array();
        $args["password"] = md5($args["password"]);
        $check_if_admin_exist = $this->db->where($args)->get('user');
        if( $check_if_admin_exist->num_rows() > 0 ){
            $msg["user_data"] = $check_if_admin_exist->result_array();
            $msg["message"] = "Successfully login";
            $msg["code"] = "200";
        } else {
            $msg["message"] = "Invalid username and password";
            $msg["code"] = "203";
        }
        return $msg;
    }

    //CHECK INFORMATION
    public function checkInformation( $check_info, $table_name )
    {
        $check_info_exist = $this->db->where($check_info)->get($table_name);
        return $check_info_exist;
    }

    // CREATE USER
    public function createUser( $data )
    {
        $chck_info = array( "email_address"=>$data["email_address"]  );
        $chck_result = $this->checkInformation($chck_info, "user");

        if( $chck_result->num_rows() == 0 ){
            // $data["user_type"] = "member";
            $data["password"] = md5("proweaver!!2019");
            $this->db->insert("user", $data);
            $this->result["message"] = "Successfully added user!";
            $this->result["code"] = 201;
        } else {
            $this->result["message"] = "User is already exist!";
            $this->result["code"] = 203;
        }
        return $this->result;
    }

    // DELETE USER
    public function deleteUser( $user_id )
    {
        $chck_info = array( "user_id"=>$user_id  );
        $chck_result = $this->checkInformation($chck_info, "user");
        if( $chck_result->num_rows() > 0 ){
            $this->db->where($chck_info);
            $this->db->delete("user");  
            $this->result["message"] = "Successfully deleted user!";
            $this->result["code"] = 201; 
        } else {
            $this->result["message"] = "User is not exist!";
            $this->result["code"] = 203;
        }
        return $this->result;
    }

    //UPDATED USER
    public function updateUser( $user_data )
    {
        $chck_info = array( "user_id"=>$user_data["user_id"] );
        $chck_result = $this->checkInformation($chck_info, "user");
        if( $chck_result->num_rows() > 0 ){
            $this->db->where( $chck_info );
            $this->db->update( "user", $user_data );
            $this->result["message"] = "Successfully updated user!";
            $this->result["code"] = 201; 
        } else {
            $this->result["message"] = "User is not exist!";
            $this->result["code"] = 203; 
        }
        return $this->result;
    }

    //USER LIST
    public function userList()
    {
        $user_list = $this->db->get("user");
        $result["message"] = "ok";
        $result["code"] = 200;
        $result["data"] = $user_list->result_array();
        return $result;
    }


    // SEARCH USER
    public function searchEmail( $search_data ){

        $s = "%".$search_data."%";
        $search = $this->db->query( "SELECT * FROM user WHERE full_name LIKE '".$s."' ");
        if( $search->num_rows() > 0 )
        {
            $msg["message"] = "ok";
            $msg["code"] = 200;
            $msg["data"] = $search->result_array();
            
        } else {
            $msg["message"] = "No data found!";
            $msg["code"] = 201;
            $msg["data"] = "No data found!";
        }
        return $msg;

    }

    //USER UPDATE PASSWORD OR PROFILE
    public function updateProfile( $user_data ){
        $chck_info = array( "user_id"=>$user_data["user_id"] );
        $chck_result = $this->checkInformation($chck_info, "user");
        if( $chck_result->num_rows() > 0 ){
            $user_data["password"] = md5($user_data["password"]);
            $this->db->where( $chck_info );
            $this->db->update( "user", $user_data );
            $this->result["message"] = "Successfully updated password!";
            $this->result["code"] = 201; 
        } else {
            $this->result["message"] = "User is not exist!";
            $this->result["code"] = 203; 
        }
        return $this->result;
    }


    

}
>>>>>>> 83438cca80510e95c9c94b68125924ed868f465e
