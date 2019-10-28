<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'controllers\module\userModule.php');

class PageController extends CI_Controller {

    protected $appname = "Doctor Finder";
    protected $userModule;

    public function __construct()
    {
        parent::__construct();
        $this->userModule = new UserModule();
        
    }

    public function index()
    {
        $data = [
            "title" => $this->appname,
            "page_name" => "home",
            "needAuth" => false,
            "isLogged" => $this->userModule->isAuth()
        ];
        
		$this->load->view('guest/index', $data );
    }

    public function dashboard()
    {
        if(!$userModule->isAuth())
        {
            redirect("user/login");
        }
        else
        {
            $data = [
                "title" => $this->appname." | dashboard",
                "page_name" => "dashboard",
                "needAuth" => true,
                "isLogged" => $this->userModule->isAuth()
            ];
            $this->load->view('index', $data );
        }   
    }
    public function about()
    {
        $data = [
            "title" => $this->appname." | About Us",
            "page_name" => "about-us",
            "page_title" => "About Us",
            "needAuth" => false,
            "isLogged" => $this->userModule->isAuth()
        ];
		$this->load->view('guest/pages/about_us', $data );
    }

    public function question_and_answer()
    {
        $data = [
            "title" => $this->appname." | Question and Answer",
            "page_name" => "QA",
            "page_title" => "Questions and Answers",
            "needAuth" => false,
            "isLogged" => $this->userModule->isAuth()
        ];
		$this->load->view('guest/pages/question_and_answers', $data );
    }
    
    public function contact_us()
    {
        $data = [
            "title" => $this->appname." | Contact Us",
            "page_name" => "contact-us",
            "needAuth" => false,
            "isLogged" => $this->userModule->isAuth()
        ];
		$this->load->view('guest/pages/contact_us', $data );
    }



}
