<?php
	/**
	 * 
	 */
	class Report extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
		}

		public function Index($msg = NULL, $active = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Report - Media Source',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => $active
				);

				$this->load->view('admin/reports/report',$data);
			}
		}
	}
?>