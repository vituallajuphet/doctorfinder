<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH.'controllers/module/TemplateController.php';
require_once APPPATH.'controllers/MainController.php';

class EmailModule extends CI_Controller {

    private $ci;


    public function __construct()
    {
        parent::__construct();
        // $this->$ci = "awdwad";
        // $this->$sample = "awdwad";
        $msg = array();
    }

    // CREATE EMAIL
    public static function createEmail( $input_data )
    {
        $msg = array();
        $ci = get_instance();
        $ci->load->model("EmailModel");
        if( $input_data ){
            $msg = $ci->EmailModel->createEmail( $input_data );
        }
        return $msg;
        
    }

    // GET EMAIL
    public static function getEmail()
    {
        $ci = get_instance();
        $ci->load->model("EmailModel");
        $data = $ci->EmailModel->getEmail();
        return $data;
    }

    // DELETE EMAIL
    public static function deleteEmail( $email_id )
    {
        $ci = get_instance();
        $ci->load->model("EmailModel");
        $result = $ci->EmailModel->deleteEmail($email_id);
        return $result;
    }

    // UPDATE EMAIL
    public static function updateEmail( $update_data )
    {
        $ci = get_instance();
        $ci->load->model("EmailModel");
        $result = $ci->EmailModel->updateEmail( $update_data );
        return $result;
    }

    //SEARCH EMAIL
    public static function searchEmail( $search_data )
    {

        $ci = get_instance();
        $ci->load->model("EmailModel");
        if( $search_data == "" ){
            $result = $ci->EmailModel->getEmail();
        } else {
            $result = $ci->EmailModel->searchEmail( $search_data );
        }
        return $result;
    }


    public function getSample(){

        $arr = array( "a"=>"aa", "b"=>"bb" );
        return $arr;
    }
    

    


}