<?php
	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel','am');
		}

		public function Index($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				$data = array(
					'title' => 'Login - Media Source Ltd',
					'message' => $msg
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
				return redirect('Admin/Index/1');
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
					'adminInfo' => $this->am->GetAdminAllInfo($adminUserName,$adminPassword),
				);
				$this->load->view('admin/dashboard',$data);
			}
		}
	}
?>