<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_controller
{
	public function showAllTickets($departmentId = null)
	{
		$data['title'] = 'لیست تیکت ها';
		$data['departments'] = $this->Department_Model->getAllWhere(['status' => 1]);
		$data['showUsernameColumn'] = true;

		$columns = 'tickets.*,departments.name AS department,users.full_name AS owner';
		$mainTable = 'tickets';
		$joinTablesAndConditions = (object)[
			'firstJoinTable' => 'departments',
			'firstJoinConditions' => 'tickets.department_id = departments.id',
			'secondJoinTable' => 'users',
			'secondJoinConditions' => 'tickets.user_id = users.id',
		];
		$data['tickets'] = $this->Ticket_Model->getColumnsWithMultipleJoin($columns, $mainTable, $joinTablesAndConditions);


		if (!is_null($departmentId)) {
			$columns = 'tickets.*,departments.name AS department,users.full_name AS owner';
			$mainTable = 'tickets';
			$joinTablesAndConditions = (object)[
				'firstJoinTable' => 'departments',
				'firstJoinConditions' => 'tickets.department_id = departments.id',
				'secondJoinTable' => 'users',
				'secondJoinConditions' => 'tickets.user_id = users.id',
			];
			$whereConditions = "tickets.department_id={$departmentId}";
			$data['tickets'] = $this->Ticket_Model->getColumnsWithWhereAndMultipleJoin(
				$columns,
				$mainTable,
				$joinTablesAndConditions,
				$whereConditions
			);


		}

		$this->template->load('ticket/tickets_list', $data);
	}

}
