<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message.php');
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}
	public function login()
	{
		$this->load->view('admin/login_page.php');
	}
}
