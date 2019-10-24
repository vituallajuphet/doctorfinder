<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/module/TemplateModule.php';
require_once APPPATH.'controllers/module/EmailModule.php';
require_once APPPATH.'controllers/module/UserModule.php';
require_once APPPATH.'controllers/MainController.php';


class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        MainController::checkSession();
        MainController::checkUserType();
    }


    public function index()
    {
        TemplateModule::userTemplate( "dashboard" );
    }

    //GET EMAIL
    public function getEmail()
    {
        $data = EmailModule::getEmail();
        MainController::returnJson( $data );
    }

    // VIEW PROFILE
    public function viewProfile()
    {
        TemplateModule::userTemplate( "profile" );
    }

    // UPDATE PROFILE
    public function updateProfile()
    {
        $user_data = $this->input->post();
        $response = UserModule::updateProfile( $user_data );
        MainController::returnJson( $response );
    }

}