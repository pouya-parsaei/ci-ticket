<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends Department_Controller
{
	public function index()
	{
		$this->template->load('dashboard/users_index');
	}

	public function create_department()
	{
		$data['title']='ایجاد دپارتمان';
		if (!isset($_POST['create_department'])) {
			return $this->template->load('admin/dep/create_dep',$data);
		}

		if (!$this->form_validation->run('createDepartment')) {
			$data['createDepartmentFormError'] = form_error('department_name');
			return $this->template->load('admin/dep/create_dep', $data);
		}

		$departmentInfo = ['name' => $_POST['department_name']];
		$addedDepartmentResult = $this->Department_Model->add($departmentInfo);
		$data['addDepartmentResultMessage'] = $addedDepartmentResult ? 'دپارتمان با موفقیت ثبت شد.' : 'خطا در ثبت دپارتمان';
		return $this->template->load('admin/dep/create_dep', $data);
	}

	public function departmentsList()
	{
		$data['title']='لیست دپارتمان ها';
		$data['departments'] = $this->Department_Model->getAll();
		$this->template->load('admin/dep/departments_list', $data);
	}

	public function deleteDepartment($departmentId)
	{
		$conditions = ['id' => $departmentId];
		$this->Department_Model->delete($conditions);
		redirect('admin/department/list');
	}

	public function toggleDepartmentStatus($departmentId)
	{
		$conditions = ['id' => $departmentId];
		$department = $this->Department_Model->find($conditions);
		$currentDepartmentStatus = $department->status;
		$data = ['status' => 1 - $currentDepartmentStatus];
		$this->Department_Model->update($data, $conditions);
		redirect('admin/department/list');
	}

	public function renameDepartment($departmentId)
	{
		$data['title']= 'تغییر نام دپارتمان';
		if (!isset($_POST['rename_department'])) {
			$conditions = array('id' => $departmentId);
			$data['currentDepartmentName'] = $this->Department_Model->get('name', $conditions);
			$data['currentDepartmentName'] = $data['currentDepartmentName'][0];
			return $this->template->load('admin/dep/rename_department', $data);
		}

		if (!$this->form_validation->run('createDepartment')) {
			$conditions = array('id' => $departmentId);
			$data['currentDepartmentName'] = $this->Department_Model->get('name', $conditions);
			$data['currentDepartmentName'] = $data['currentDepartmentName'][0];
			$data['createDepartmentFormError'] = form_error('department_name');
			return $this->template->load('admin/dep/rename_department', $data);

		}

		$departmentData = array(
			'name' => $_POST['department_name']
		);
		$conditions = array('id' => $departmentId);
		$updateDepartmentResult = $this->Department_Model->update($departmentData, $conditions);
		$data['updateDepartmentResult'] = $updateDepartmentResult ? 'نام دپارتمان با موفقیت ویرایش گردید.' : 'خطا در تغییر نام دپارتمان';
		$data['currentDepartmentName'] = $this->Department_Model->get('name', $conditions);
		$data['currentDepartmentName'] = $data['currentDepartmentName'][0];
		return $this->template->load('admin/dep/rename_department', $data);
	}
}


