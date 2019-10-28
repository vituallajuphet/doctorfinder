<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'controllers\module\userModule.php');

class DoctorController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $userModule = new UserModule();
        if(!$userModule->isAuth())
        {
            redirect("user/login");
        }
    }

	public function index(){
        redirect("/dashboard");
	}
}
