<?php
	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin/AdminModel','am');
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				$data = array(
					'title' => 'Login - Media Source Ltd'
				);
				
				$this->load->view('Admin/index',$data);
			}
			else
			{
				return redirect('Admin/Dashboard');
			}
		}

		public function Login()
		{
			$userName = $this->input->post('user-name');
			$password = $this->input->post('password');

			$result = $this->am->Login($userName,$password);

			if ($result)
			{
				$adminSession = [
					'adminUserName' => $userName,
					'adminPassword' => $password
				];

				$this->session->set_userdata($adminSession);

				return redirect('Admin/Dashboard');
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function Dashboard()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Admin Dashboard - Media Source Ltd.'
				);
				$this->load->view('Admin/dashboard');
			}
		}
	}
?>