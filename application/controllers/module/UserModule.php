<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/module/TemplateModule.php';
require_once APPPATH.'controllers/MainController.php';

class UserModule extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

    }

    public static function index()
    {
        return "awdada";
    }

    //CREATE USER
    public static function createUser( $user_data )
    {
        $ci = get_instance();
        $ci->load->model("UserModel");
        $result = $ci->UserModel->createUser( $user_data );
        return $result;

    }

     //CREATE USER
    public static function deleteUser( $user_id )
    {
         $ci = get_instance();
         $ci->load->model("UserModel");
         $result = $ci->UserModel->deleteUser( $user_id );
         return $result;
 
    }

    //UPDATE USER
    public static function updateUser( $user_data )
    {
        $ci = get_instance();
        $ci->load->model("UserModel");
        $result = $ci->UserModel->updateUser( $user_data );
        return $result;
    }

    //USER LIST
    public static function userList()
    {
        $ci = get_instance();
        $ci->load->model("UserModel");
        $result = $ci->UserModel->userList();
        return $result;
    }

    //SEARCH EMAIL
    public static function searchUser( $search_data )
    {

        $ci = get_instance();
        $ci->load->model("UserModel");
        if( $search_data == "" ){
            $result = $ci->UserModel->userList();
        } else {
            $result = $ci->UserModel->searchEmail( $search_data );
        }
        return $result;
    }

    public static function updateProfile($user_data)
    {
        $ci = get_instance();
        $ci->load->model("UserModel");
        $result = $ci->UserModel->updateProfile( $user_data );
        return $result;
    }


}