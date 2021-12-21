<?php

class Support extends Support_Controller
{
	public function add($data = [])
	{
		$data['title'] = 'ایجاد پشتیبان';
		$data['departments'] = $this->Department_Model->get('id,name', array('status' => 1));
		$this->template->load('support/add_support', $data);
	}

	public function store()
	{
		if (!$this->form_validation->run('createSupport')) {
			$data['supportFormErrors'] = array(
				form_error('email'),
				form_error('password'),
				form_error('full-name'),
				form_error('department'),
			);
			return $this->add($data);
		}

		$supportData = [
			'full_name' => $_POST['full-name'],
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'role' => 'support'
		];
		$userTableInsertionResult = $this->User_Model->add($supportData);
		if (!$userTableInsertionResult) {
			$data['userCreationErrorMessage'] = 'خطا در ایجاد کاربر جدید !!!';
			return $this->add($data);
		}
		$departmentsUsersData = [
			'department_id' => $_POST['department'],
			'user_id' => $userTableInsertionResult
		];

		$supportInsertionResult = $this->Department_User_Model->add($departmentsUsersData);
		if (!$supportInsertionResult) {
			$data['supportCreationErrorMessage'] = 'خطا در ایجاد پشتیبان جدید !!!';
			return $this->add($data);
		}

		$data['supportCreationSuccessMessage'] = 'پشتیبان با موفقیت ایجاد شد.';
		return $this->add($data);
	}

	public function showSupportsList()
	{
		$data['title'] = 'لیست تیکت ها';
		$columns = 'users.id,users.full_name,users.status,departments.name as department';
		$mainTable = 'departments_users';
		$joinTablesAndConditions = (object)[
			'firstJoinTable' => 'users',
			'firstJoinConditions' => 'departments_users.user_id = users.id',
			'secondJoinTable' => 'departments',
			'secondJoinConditions' => 'departments_users.department_id = departments.id',
		];
		$data['supports'] = $this->Support_Model->getColumnsWithMultipleJoin($columns, $mainTable, $joinTablesAndConditions);
		$this->template->load('support/supports_list.php', $data);
	}

	public function toggleSupportStatus($supportId)
	{
		$conditions = ['id' => $supportId];
		$support = $this->User_Model->find($conditions);
		$currentSupportStatus = $support->status;
		$data = array(
			'status' => 1 - $currentSupportStatus
		);
		$this->User_Model->update($data, $conditions);
		redirect('admin/support/all');
	}

	public function edit($supportId, $data = [])
	{
		$data['title'] = 'ویرایش پشتیبان';
		$data['support'] = $this->Support_Model->getColumnsWithWhereAndMultipleJoin(
			'users.*,departments.id AS selectedDepartment', 'departments_users',
			(object)[
				'firstJoinTable' => 'departments',
				'firstJoinConditions' => 'departments_users.department_id = departments.id',
				'secondJoinTable' => 'users',
				'secondJoinConditions' => 'departments_users.user_id = users.id',
			],
			"departments_users.user_id={$supportId}",
		);
		$data['support'] = $data['support'][0];
		$data['departments'] = $this->Department_Model->get('id,name', array('status' => 1));
		$this->template->load('support/edit', $data);
	}

	public function update($supportId)
	{

		if (!$this->form_validation->run('createSupport')) {
			$data['supportFormErrors'] = [
				form_error('email'),
				form_error('password'),
				form_error('full-name'),
				form_error('department'),
			];
			return $this->edit($supportId, $data);
		}

		$supportUsername = [
			'email' => $_POST['email'],
			'id!=' => $supportId,
		];
		$emailExistence = $this->User_Model->getRow($supportUsername);

		if ($emailExistence) {
			$data['emailError'] = 'ایمیل تکراری است.';
			return $this->edit($supportId, $data);
		}

		$conditions = ['id' => $supportId];
		$supportData = [
			'full_name' => $_POST['full-name'],
			'email' => $_POST['email'],
			'password' => $_POST['password'],
		];
		$departmentUserConditions = ['user_id' => $supportId];
		$departmentsUsersData = ['department_id' => $_POST['department'],];
		$this->User_Model->update($supportData, $conditions);
		$this->db->update('departments_users', $departmentsUsersData, $departmentUserConditions);
		$data['supportUpdateSuccessMessage'] = 'اطلاعات پشتیبان با موفقیت ویرایش گردید.';
		return $this->edit($supportId, $data);
	}
}
