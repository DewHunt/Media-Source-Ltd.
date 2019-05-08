<?php
	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('AccountModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
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

			$result = $this->AdminModel->Login($userName,$password);

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

		public function Dashboard($msg = null)
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
					'adminInfo' => $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword),
					'active' => 0
				);
				$this->load->view('admin/dashboard',$data);
			}
		}

		public function EditProfile($id, $msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$accountId = $id;

				$data = array(
					'title' => 'Edit Profile - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 0,
					'accountInfo' => $this->AccountModel->GetAccountById($id)
				);

				$this->load->view('admin/edit-profile',$data);
			}
		}

		public function EditProfileAction()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$accountUserId = $this->input->post('account-user-id');
				$accountId = $this->input->post('account-id');

				$checkAccount = $this->AccountModel->CheckAccountExists($accountUserId,$accountId);

				if ($checkAccount)
				{
					return redirect('Admin/EditProfile/'.$accountId.'/1');
				}
				else
				{
					$accountName = $this->input->post('account-name');
					$accountPhone = $this->input->post('account-mobile');
					$accountEmail = $this->input->post('account-email');

					$result = $this->AccountModel->UpdateProfile($accountName,$accountPhone,$accountEmail,$accountUserId,$accountId);

					if ($result)
					{
						return redirect('Admin/Dashboard');
					}
					else
					{
						return redirect('Admin/EditProfile/'.$accountId.'/2');
					}
				}
			}
		}

		public function ChangePassword($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Change Password - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 0,
				);

				$this->load->view('admin/change-password',$data);
			}
		}

		public function ChangePasswordAction()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newPassword = $this->input->post('new-password');
				$accountId = $this->input->post('account-id');

				$result = $this->AccountModel->ChangePasswordAction($newPassword,$accountId);

				if ($result)
				{
					$this->session->unset_userdata('adminUserName');
					$this->session->unset_userdata('adminPassword');

					return redirect('Admin/Index/2');
				}
				else
				{
					return redirect('Admin/ChangePassword/2');
				}
			}			
		}
	}
?>