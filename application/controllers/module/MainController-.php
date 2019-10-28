<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/module/TemplateController.php';

class MainController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public static function setSession( $data )
    {
        $CI = get_instance();
        $CI->session->set_userdata($data);
    }

    public static function adminCheckSession()
    {
        $CI = get_instance();
        if(!$CI->session->has_userdata('admin')){
            redirect( base_url('admin/login') );
        }
    }

    public static function destroySession()
    {
        session_destroy();
        redirect( base_url( "admin/login" ) );

    }

    //  // ADMIN LOGIN
    //  public function admin_login()
    //  {
    //     $CI = get_instance();
    //     if(!$CI->session->has_userdata('admin')){
    //         TemplateController::adminTemplate( "login" );
    //     } else {
    //         redirect( base_url('admin') );
    //     }
    //  }

}   