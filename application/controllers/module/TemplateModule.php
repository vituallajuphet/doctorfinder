<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class TemplateModule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public static function adminTemplate( $template, $data = null )
    {

        // echo "awdwad"; exit;
        $CI = get_instance();
        if( $template == "login" )
        {
            $CI->load->view("admin/includes/head");
            $CI->load->view("admin/".$template."");
            $CI->load->view("admin/includes/footer");
        } else {
            $CI->load->view("admin/includes/head");
            $CI->load->view("admin/includes/header");
            $CI->load->view("admin/includes/sidebar");
            $CI->load->view("admin/".$template."");
            $CI->load->view("admin/includes/modal");
            $CI->load->view("admin/includes/footer_top");
            if($template == "user"){
                $CI->load->view("admin/includes/ufooter"); 
            }
            else{
                $CI->load->view("admin/includes/footer"); 
            }
        }
    }


    public static function userTemplate( $template, $data = null )
    {
        $CI = get_instance();
        if( $template == "login" || $template == "access_denied" )
        {
            $CI->load->view("user/includes/head");
            $CI->load->view("".$template."");
            $CI->load->view("user/includes/footer");
        } else { 
            $CI->load->view("user/includes/head");
            $CI->load->view("user/includes/header");
            $CI->load->view("user/".$template."");
            $CI->load->view("user/includes/modal");
            $CI->load->view("user/includes/bottom");
           
            $CI->load->view("user/includes/footer");
        }
    }


    public static function sampleTemplate( $template, $data = null )
    {
        $CI = get_instance();
        if( $template == "login" )
        {
            $CI->load->view("admin/includes/head");
            $CI->load->view("admin/".$template."");
            $CI->load->view("admin/includes/footer");
        } else {
            $CI->load->view("admin/includes/head");
            // $CI->load->view("admin/includes/header");
            // $CI->load->view("admin/includes/sidebar");
            $CI->load->view("sample/".$template."");
            // $CI->load->view("admin/includes/modal");
            // $CI->load->view("admin/includes/footer_top");
            $CI->load->view("admin/includes/footer");
        }
    }

}