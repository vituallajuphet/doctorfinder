<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH.'controllers/module/TemplateController.php';
require_once APPPATH.'controllers/module/TemplateModule.php';
require_once APPPATH.'controllers/module/EmailModule.php';
require_once APPPATH.'controllers/module/UserModule.php';
require_once APPPATH.'controllers/MainController.php';

class AdminController extends CI_Controller {

    public function __construct(  )
    {
        parent::__construct();
        $this->load->model("AdminModel");
        MainController::checkSession();
        MainController::checkAdmintype();

    }

    public function index()
    {
        TemplateModule::adminTemplate( "dashboard" );
    }

    // ADMIN LOGIN
    public function login()
    {
        if(!$this->session->has_userdata('admin')){
            TemplateModule::adminTemplate( "login" );
        } else {
            redirect( base_url('admin') );
        }
    }

    //VIEW PROFILE
    public function viewProfile()
    {
        TemplateModule::adminTemplate( "profile" );

    }

    //UPDATE PROFILE
    public function updateProfile()
    {
        $user_data = $this->input->post();
        $response = UserModule::updateProfile( $user_data );
        MainController::returnJson( $response );
    }

    //CREATE EMAIL
    public function createEmail()
    {
        $data_input = $this->input->post();
        $response = EmailModule::createEmail( $data_input );
        MainController::returnJson( $response );
    }


    //GET EMAIL
    public function getEmail()
    {
        $data = EmailModule::getEmail();
        MainController::returnJson( $data );
    }

    //DELETE EMAIL
    public function deleteEmail( $email_id )
    {
        $response = EmailModule::deleteEmail( $email_id );
        MainController::returnJson( $response );
    }

    //SEARCH EMAIL
    public function searchEmail()
    {
        $search_data = $this->input->post( "search_account_name" );
        $response = EmailModule::searchEmail( $search_data );
        MainController::returnJson( $response );
    }

    // UPDATED EMAIL
    public function updateEmail()
    {
        $update_data = $this->input->post();
        $response = EmailModule::updateEmail( $update_data );
        MainController::returnJson( $response );
    }


    //USERS AREA
    public function user()
    {
        $input_data = $this->input->post();
        $response = UserModule::index($input_data);
        TemplateModule::adminTemplate("user");
    }

    // CREATE USER
    public function createUser()
    {
        $user_data = $this->input->post();
        $response = UserModule::createUser( $user_data );
        MainController::returnJson( $response );
    }

    //DELETE USER
    public function deleteUser( $user_id )
    {
        $response = UserModule::deleteUser( $user_id );
        MainController::returnJson( $response );
    }

    //UPDATE USER
    public function updateUser()
    {
        $user_data = $this->input->post();
        $response = UserModule::updateUser( $user_data );
        MainController::returnJson( $response );
    }

    //USER LIST
    public function userList()
    {
        $response = UserModule::userList();
        MainController::returnJson( $response );
    }


    //SEARCH USER
    public function searchUser()
    {
        $search_data = $this->input->post( "search_full_name" );
        $response = UserModule::searchUser( $search_data );
        MainController::returnJson( $response );
    }

    // SMTP
    public function smtp()
    {
        TemplateModule::adminTemplate( "smtp" );
    }

    public function sample()
    {
        TemplateModule::sampleTemplate( "form" );
    }
}