<?php
	/**
	 * 
	 */
	class Client extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('ClientModel');
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
					'title' => 'All Client - Media Source Ltd.'
				);
				$this->load->view('admin/client',$data);
			}
		}

		public function Client()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Client - Media Source Ltd.'
				);
				$this->load->view('admin/create-client.php',$data);
			}
		}
	}
?>