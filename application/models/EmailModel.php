<?php 
// RESPONSE CODE:
// 200 -> OK
// 201 -> Success
// 202 -> Existed
// 203 -> Warning
// 204 -> Error occured
class EmailModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $msg = array();
    }

    // CREATE EMAIL
    public function createEmail( $data )
    {
        $check_if_account_name_exist = $this->db->where( "account_name", $data["account_name"] )->get("email_tbl");
        if( $check_if_account_name_exist->num_rows() == 0 )
        {
            $this->db->insert("email_tbl", $data);
            $msg["message"] = "Successfully added!";
            $msg["code"] = 201;

        } else {
            $msg["message"] = "Account name is already exist!";
            $msg["code"] = 202;
        }
        
        return $msg;
    }

    // GET EMAIL
    public function getEmail()
    {
        $result = $this->db->get("email_tbl");
        $msg["message"] = "ok";
        $msg["code"] = 200;
        $msg["data"] = $result->result_array();
        return $msg;
    }

    // DELETE EMAIL
    public function deleteEmail( $email_id )
    {
        $check_if_email_exist = $this->db->where( "email_id", $email_id )->get("email_tbl");
        if( $check_if_email_exist->num_rows() > 0 )
        {
            $this->db->where("email_id", $email_id);
            $this->db->delete("email_tbl");
            $msg["201"] = "Successfully deleted email!";
            $msg["code"] = 201;
        } else {
            $msg["203"] = "Email is not exist!";
            $msg["code"] = 201;
        }
        return $msg;
    }

    // UPDATE EMAIL
    public function updateEmail( $update_data )
    {
        $check_if_email_exist = $this->db->where( "email_id", $update_data["email_id"] )->get("email_tbl");
        if( $check_if_email_exist->num_rows() > 0 )
        {
            $this->db->where("email_id", $update_data["email_id"]);
            $this->db->update("email_tbl", $update_data);
            $msg["201"] = "Successfully updated email!";
            $msg["code"] = 201;
        } else {
            $msg["201"] = "Email is not exist!";
            $msg["code"] = 203;
        }
        return $msg;
    }

    // SEARCH EMAIL
    public function searchEmail( $search_data ){

        $s = "%".$search_data."%";
        $search = $this->db->query( "SELECT * FROM email_tbl WHERE account_name LIKE '".$s."' ");
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


}