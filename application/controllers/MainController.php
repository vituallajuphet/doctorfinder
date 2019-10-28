<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/module/TemplateModule.php';

class MainController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("AdminModel");
        $this->load->model("UserModel");
    }


    // NEW LOGIN
    public static function login( )
    {
        TemplateModule::userTemplate( "login" );
    }

    // NEW PROCCESS LOGIN
    public function processLogin(){
        $result = array();
        $input_data = $this->input->post();
        $result = $this->UserModel->login($input_data);
        if( isset($result["user_data"])){
            $this->setSession( $result["user_data"][0] );
        }
        echo json_encode($result);
    }

    public static function setSession( $data )
    {
        $CI = get_instance();
        $CI->session->set_userdata($data);
    }

    //USER CHECK SESSION
    public static function checkSession()
    {
        $CI = get_instance();
        if(!$CI->session->has_userdata('full_name')){
            redirect( base_url('login') );
        }
    }

    // USER MEMBER TYPE
    public static function checkUsertype()
    {
        $CI = get_instance();
        if( $CI->session->userdata("user_type") != "member" ){
            redirect( base_url("access-denied") );
        }
    }

    public static function checkAdmintype()
    {
        $CI = get_instance();
        if( $CI->session->userdata("user_type") != "admin" ){
            redirect( base_url("access-denied") );
        }
    }

    // USER LOGIN
    public function logout()
    {
        session_destroy();
        redirect( base_url( "login" ) );
    }

    //ACCESS DENIED
    public function accessDenied()
    {
        TemplateModule::userTemplate( "access_denied" );
    }

    // RETURN DATA TO JSON
    public static function returnJson( $response )
    {
        $CI = get_instance();
        $data = null;
        if( $CI->session->has_userdata('full_name') )
        {
            $data = $response; 
        } else {
            $data["message"] = "You don't have access";
            $data["code"] = 404;
        }
        $CI->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
    }

}   