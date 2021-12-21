<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Profile_Controller
{
	public function edit()
	{
		$data['title'] = 'ویرایش پروفایل';
		$userId = $this->session->userdata('id');
		$conditions = ['id' => $userId];
		if (isset($_POST['edit_profile']) && !empty($_POST['edit_profile'])) {
			$title = 'ویرایش پروفایل';
			$data['formErrors'] = array();
			if ($this->form_validation->run('update') === false) {
				$formErrors[] = form_error('full_name');
				$formErrors[] = form_error('email');
				$formErrors[] = form_error('password');
				return $this->template->load('dashboard/profile', array('formErrors' => $formErrors, 'title' => $title));
			}
			$userInfo = [
				'full_name' => $_POST['full_name'],
				'email' => $_POST['email'],
				'password' => $_POST['password']
			];
			$updateResult = $this->User_Model->update($userInfo, $conditions);
			if ($updateResult)
				$data['updateMessageSuccessfull'] = 'ویرایش اطلاعات با موفقیت انجام شد.';
			$sessionNewInfos = [
				'full_name' => $_POST['full_name'],
				'email' => $_POST['email']
			];
			$this->session->set_userdata($sessionNewInfos);
		}

		$data['userInfo'] = $this->User_Model->find(array('id' => $userId));
		return $this->template->load('dashboard/profile', $data);
	}
}
