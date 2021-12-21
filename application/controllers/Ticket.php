<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends MY_Controller
{
	public function createNewTicket($data = array())
	{
		$data['title'] = 'ارسال تیکت';
		$data['departments'] = $this->Department_Model->get('id,name', array('status' => 1));
		$data['script'] = "<script>CKEDITOR.replace('ticket-content');</script>";
		$this->template->load('ticket/create_new_ticket', $data);
	}

	public function store()
	{
		if (!$this->form_validation->run('createTicket')) {
			$data['ticketFormErrors'] = array(
				form_error('ticket-title'),
				form_error('department'),
				form_error('ticket-content'),
			);
			return $this->createNewTicket($data);
		}
		$ticketData = array(
			'title' => $_POST['ticket-title'],
			'content' => $_POST['ticket-content'],
			'department_id' => $_POST['department'],
			'user_id' => $this->session->userdata('id'),
		);

		$ticketInsertionResult = $this->Ticket_Model->add($ticketData);
		if ($ticketInsertionResult)
			$data['ticketInsertionSuccessMessage'] = 'تیکت شما با موفقیت ارسال شد.';
		$this->createNewTicket($data);

	}

	public function showTicketsList()
	{
		$userId = $this->session->userdata('id');
		$data['tickets'] = $this->Ticket_Model->getColumnsWithWhereAndJoin(
			'tickets.*,departments.name AS department',
			'departments',
			'tickets.department_id = departments.id',
			"tickets.user_id={$userId}",
		);

		$this->template->load('ticket/tickets_list', $data);
	}

	public function showTicket($ticketId, $data = [])
	{
		$userId = $this->session->userdata('id');
		$data['answers'] = $this->db->select('answers.*,users.full_name')
			->from('answers')
			->join('users', "answers.user_id = users.id")
			->where("answers.ticket_id={$ticketId}")
			->get()
			->result_object();

		$data['ticket'] = $this->Ticket_Model->find(array(
			'id' => $ticketId
		));
		$data['ticketAnswers'] = $this->Answer_Model->getAllWhere(array(
			'ticket_id' => $ticketId
		));

		$this->template->load('ticket/show_ticket', $data);
	}

	public function storeTicketAnswer($ticketId)
	{
		$userId = $this->session->userdata('id');
		$userRole = $this->session->userdata('role');
		$ticket = $this->Ticket_Model->find(array(
			'id' => $ticketId
		));

		if (!$this->form_validation->run('createAnswer')) {
			$data['ticketAnswerFormErrors'] = array(
				form_error('ticket-answer-content'),
			);
			return $this->showTicket($ticketId, $data);
		}

		$answerData = array(
			'ticket_id' => $ticketId,
			'user_id' => $userId,
			'answer_content' => $_POST['ticket-answer-content'],
			'user_role' => $userRole,
		);
		$ticketStatusData = ['status' => $userRole != 'user' ? 1 : 0];
		$updateTicketStatusResult = $this->Ticket_Model->update($ticketStatusData, ['id' => $ticketId]);

		if (!$updateTicketStatusResult) {
			$data['updateTicketStatusFailureMessage'] = 'خطا در بروزرسانی وضعیت تیکت.';
			return $this->showTicket($ticketId, $data);
		}

		$answerInsertionResult = $this->Answer_Model->add($answerData);
		if (!$answerInsertionResult) {
			$data['answerInsertionFailureMessage'] = 'خطا در ثبت پاسخ تیکت.';
			return $this->showTicket($ticketId, $data);
		}
		$data['answerInsertionResult'] = 'پاسخ شما با موفقیت ارسال شد.';
		return $this->showTicket($ticketId, $data);
	}

	public function closeTicket($ticketId)
	{
		$userId = $this->session->userdata('id');
		$userRole = $this->session->userdata('role');

		if ($userRole == 'user')
			$ticketStatusData = ['status' => 2];

		if ($userRole == 'support')
			$ticketStatusData = ['status' => 3];

		if ($userRole == 'admin')
			$ticketStatusData = ['status' => 4];

		$updateTicketStatusResult = $this->Ticket_Model->update($ticketStatusData, ['id' => $ticketId]);

		redirect($_SERVER['HTTP_REFERER']);

//		if ($userRole == 'user')


	}

	public function backTest()
	{
//		$this->load->library('user_agent');
//		if ($this->agent->is_referral()) {
//			echo $this->agent->referrer();
//		}
	}
}
