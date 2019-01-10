<?php
	/**
	 * 
	 */
	class SystemSetup extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function SystemSetup()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'System Setup - Media Source Ltd.'
				);

				$this->load->view('admin/system_setup/system-setup',$data);
			}
		}
	}
?>