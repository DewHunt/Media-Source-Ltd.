<?php
	/**
	 * 
	 */
	class Account extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AccountModel');
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'All Account - Media Source Ltd.'
				);

				$this->load->view('admin/account',$data);
			}
		}

		public function Account()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Account - Media Source Ltd.'
				);
				$this->load->view('admin/create-account',$data);
			}
		}
	}
?>