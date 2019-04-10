<?php
	/**
	 * 
	 */
	class DataEntry extends CI_Controller
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

		public function Index($msg = NULL, $active = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Data Entry - Media Source',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => $active
				);

				// print_r($data); exit();

				$this->load->view('admin/data_entry/data-entry',$data);
			}
		}
	}
?>