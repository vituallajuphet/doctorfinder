<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers\module\userModule.php');
class UserController extends CI_Controller {

	private $userModule;
	// user contstructor
    public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
		$this->userModule = new userModule();
	}
	// login function
	public function login(){
		$data["title"] = "Login";
		$data["err"] ="";
		$this->load->view("users/login", $data);
	}
	public function validate_account(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required',
		array('required' => 'You must provide a %s.')
		);
		if ($this->form_validation->run() == FALSE)
		{
			$data["err"] = "Please check email / password!";
			redirect("user/login", $data);
		}
		else
		{
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$res = $this->UserModel->LOGIN_USER($email, $password);
			if($res)
			{
				$user_data = array( 'fname'  => $res["fname"], 'user_id' => $res["user_id"] );
				$this->session->set_userdata($user_data);
				redirect("/dashboard");
			}
			else
			{
				$data["err"] = "Incorrect Email / Password!";
				$this->load->view("users/login", $data);
			}
		}
	}

	public function dashboard(){
		if($this->userModule->isAuth())
		{
			echo "logged in  ".$this->session->fname;
			echo "<br> <a href='".base_url()."user/logout'>logout</a>";	
		}
		else
		{
			redirect("/user/login");
		}
	
	}

	public function logout()
	{
		unset(
			$_SESSION['fname'],
			$_SESSION['user_id']
		);
		redirect("/");
	}
}
