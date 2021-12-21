<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Dashboard_Controller
{
	public function index()
	{
		$data['title']='صفحه اصلی';

		$data['sumActiveUsers'] = $this->User_Model->countWithWhere(['status'=>1,'role'=>'user']);
		$data['sumActiveSupports'] = $this->User_Model->countWithWhere(['status'=>1,'role'=>'support']);
		$data['sumActiveDepartments'] = $this->Department_Model->countWithWhere(['status'=>1]);

		$sumTickets = $this->Ticket_Model->countAll();
		$sumAnsweredTickets = $this->User_Model->countWithWhere(['status'=>1]);
		$data['answeredTicketsPercentage'] = round(($sumAnsweredTickets * 100)/$sumTickets);

		$this->template->load('dashboard/index',$data);
	}

	public function logout()
	{
		session_destroy();
		redirect('authentication/index');
	}

}
