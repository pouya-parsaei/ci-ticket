<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Department_Model');
		$this->load->model('Ticket_Model');
		$this->load->model('Answer_Model');
		$this->load->model('Support_Model');
		$this->load->model('Department_User_Model');
	}
}

class Admin_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_active') || $this->session->userdata('role') != 'admin') {
			redirect('authentication/index');
		}
	}
}

class User_Support_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_active') || $this->session->userdata('role') != 'support') {
			redirect('authentication/index');
		}

	}
}

class User_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_active')) {
			redirect('authentication/index');
		}
	}
}

class Support_Controller extends User_controller
{
	public function __construct()
	{
		parent::__construct();

	}
}



class Dashboard_Controller extends User_controller
{
	public function __construct()
	{
		parent::__construct();
	}

}

class Profile_Controller extends User_controller
{
	public function __construct()
	{
		parent::__construct();

	}

}


class Department_Controller extends Admin_controller
{
	public function __construct()
	{
		parent::__construct();
	}
}


