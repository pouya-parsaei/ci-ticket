<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function showAll()
	{
		$data['title']='لیست کاربران';
		$data['users'] = $this->User_Model->getAllWhere(['role'=>'user']);
		$this->template->load('admin/users/users_list',$data);
	}

	public function toggleStatus($userId)
	{
		$conditions = array('id' => $userId);
		$user = $this->User_Model->find($conditions);
		$currentUserStatus = $user->status;
		$data = array(
			'status' => 1 - $currentUserStatus
		);
		$this->User_Model->update($data, $conditions);
		redirect('admin/users-list');
	}
}
