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
				
				$this->load->view('admin/index',$data);
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

		public function Logout()
		{
			$this->session->unset_userdata('adminUserName');
			$this->session->unset_userdata('adminPassword');

			return redirect('Admin/Index');
		}

		public function Dashboard()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');
			if ($adminUserName == "" || $adminPassword == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Admin Dashboard - Media Source Ltd.',
					'result' => $this->am->GetAdminAllInfo($adminUserName,$adminPassword),
				);
				$this->load->view('admin/dashboard',$data);
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
					'title' => 'Client - Media Source Ltd.'
				);
				$this->load->view('admin/client',$data);
			}
		}

		public function CreateClient()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$this->load->view('admin/create-client.php');
			}
		}
	}
?>