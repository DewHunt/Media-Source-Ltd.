<?php
	/**
	 * 
	 */
	class DataRecovery extends CI_Controller
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

		public function Index()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 && $this->GetAdminAllInfo()->State == 1)
			{
				$data = array(
					'title' => 'Data Recovery System - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 0
				);

				$this->load->view('admin/system_setup/system-setup',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>