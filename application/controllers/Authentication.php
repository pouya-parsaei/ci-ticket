<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'احراز هویت';
		if (!$this->session->userdata('is_active')) {
			return $this->load->view('authentication/authentication', $data);

		}
		redirect('dashboard/index');
	}

	public function registerUser()
	{
		$title = 'احراز هویت';
		if (is_null($_POST['signUp']) && empty($_POST['signUp'])) {
			return redirect('Authentication/index');

		}

		$userInfo = array(
			'full_name' => $_POST['full_name'],
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'role' => $_POST['role'],
		);

		if ($this->form_validation->run('signup') === false) {
			$formErrors[] = array(
				form_error('full_name'),
				form_error('email'),
				form_error('password'),
				form_error('role')
			);
			return $this->load->view('authentication/authentication', $data, $formErrors);
		}

		$addedUserId = $this->User_Model->add($userInfo);
		$resultMessage = $addedUserId ? 'You have registered successfully' : 'Error registration user';
		$this->load->view('authentication/authentication', array('resultMessage' => $resultMessage, 'title' => $title));
	}

	public function login()
	{
		$title = 'احراز هویت';
		if (!isset($_POST['login'])) {
			return redirect('Authentication/index');

		}
		if ($this->form_validation->run('login') === false) {
			$formErrors[] = array(
				form_error('email'),
				form_error('password')
			);
			return $this->load->view('authentication/authentication', ['formErrors' => $formErrors, 'title' => $title]);

		}

		$userInfo = array(
			'email' => $_POST['email'],
			'password' => $_POST['password']
		);
		$returnedUser = $this->User_Model->find($userInfo);

		if (empty($returnedUser)) {
			$loginFailureMessage = 'Your inputs are invalid';
			return $this->load->view('authentication/authentication', array('loginFailureMessage' => $loginFailureMessage, 'title' => $title));

		}

		if (!$returnedUser->status) {
			$loginFailureMessage = 'حساب کاربری شما غیر فعال است.';
			return $this->load->view('authentication/authentication', array('loginFailureMessage' => $loginFailureMessage, 'title' => $title));

		}

		$sessionInfo = array(
			'id' => $returnedUser->id,
			'full_name' => $returnedUser->full_name,
			'email' => $returnedUser->email,
			'role' => $returnedUser->role,
			'is_active' => true
		);

		$this->session->set_userdata($sessionInfo);
		$data['userInfo'] = $this->session->userdata();
		redirect('dashboard/index');
	}

}
