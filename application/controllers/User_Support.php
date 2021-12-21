<?php

class User_Support extends User_Support_Controller
{
	public function index()
	{
		echo "welcome dear supporter";
	}

	public function showUnreadTickets()
	{
		$userId = $this->session->userdata('id');
		$departmentId = $this->Department_User_Model->get(['department_id'], ['user_id' => $userId]);
		$departmentId = $departmentId[0]->department_id;
		$data['tickets'] = $this->Ticket_Model->getColumnsWithMultipleWhereAndJoin(
			'tickets.*,users.full_name AS owner',
			'users',
			"tickets.user_id = users.id",
			(object)[
				'firstCondition' => "tickets.department_id={$departmentId}",
				'secondCondition' => 'tickets.status=0',
			],
		);
		$data['showUsernameColumn'] = true;
		$this->template->load('ticket/tickets_list', $data);
	}
	public function showRedTickets()
	{
		$userId = $this->session->userdata('id');
		$departmentId = $this->Department_User_Model->get(['department_id'], ['user_id' => $userId]);
		$departmentId = $departmentId[0]->department_id;
		$data['tickets'] = $this->Ticket_Model->getColumnsWithMultipleWhereAndJoin(
			'tickets.*,users.full_name AS owner',
			'users',
			"tickets.user_id = users.id",
			(object)[
				'firstCondition' => "tickets.department_id={$departmentId}",
				'secondCondition' => 'tickets.status=1',
			],
		);
		$data['showUsernameColumn'] = true;
		$this->template->load('ticket/tickets_list', $data);
	}
}
