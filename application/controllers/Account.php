<?php
	/**
	 * 
	 */
	class Account extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('AccountModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
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
					'title' => 'All Account - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 2
				);

				$this->load->view('admin/account',$data);
			}
		}

		public function Account($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Account - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 2
				);
				$this->load->view('admin/create-account',$data);
			}
		}

		public function CreateAccount()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$accountUserId = $this->input->post('account-user-id');

				$checkAccount = $this->AccountModel->CheckAccountExists($accountUserId,"");

				if ($checkAccount)
				{
					return redirect('Account/Account/3');
				}
				else
				{
					$accountType = $this->input->post('account-type');
					$accountName = $this->input->post('account-name');
					$accountMobile = $this->input->post('account-mobile');
					$accountEmail = $this->input->post('account-email');
					$accountPassword = $this->input->post('account-password');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->AccountModel->CreateAccount($accountUserId,$accountPassword,$accountName,$accountType,$accountMobile,$accountEmail,$entryId);

					if ($result)
					{
						return redirect('Account/Account/1');
					}
					else
					{
						return redirect('Account/Account/2');
					}
				}
			}
		}

		public function GetAccountAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "users";
				$selectColumn = array("Id","UserId","Password","Name","DesignationId","Phone","Email","AdminStatus");
				$orderColumn = array("Id","Name",null,null);

				$accountInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($accountInfo as $value)
				{
					$account = array();
					$account[] = $sl;

					if ($value->Name == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Name;
					}

					if ($value->UserId == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->UserId;
					}

					if ($value->DesignationId == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->DesignationId;
					}

					if ($value->Phone == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Phone;
					}

					if ($value->Email == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Email;
					}

					if ($value->AdminStatus == 101)
					{
						$account[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning update" disabled>Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete" disabled>Delete</button>';
					}
					else
					{
						$account[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					}
					
					$sl++;
					$data[] = $account;
				}

				$output = array(
					'draw' => intval($_POST['draw']),
					'recordsTotal' => $this->DataTableModel->GetAllData($table),
					'recordsFiltered' => $this->DataTableModel->GetFilteredData($option,$table,$selectColumn,$orderColumn),
					'data' => $data
				);

				echo json_encode($output);
			}
		}

		public function GetAccountById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$accountId = $this->input->post('accountId');

				$data = $this->AccountModel->GetAccountById($accountId);

				$output['accountId'] = $data->Id;
				$output['accountUserId'] = $data->UserId;
				$output['accountPassword'] = $data->Password;
				$output['accountName'] = $data->Name;
				$output['accountDesignationId'] = $data->DesignationId;
				$output['accountPhone'] = $data->Phone;
				$output['accountEmail'] = $data->Email;

				echo json_encode($output);
			}
		}

		public function UpdateAccount()
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
					echo "Oops! Sorry, This User Id Alredy Created.";
				}
				else
				{
					$accountType = $this->input->post('account-type');
					$accountName = $this->input->post('account-name');
					$accountPhone = $this->input->post('account-mobile');
					$accountEmail = $this->input->post('account-email');

					$result = $this->AccountModel->UpdateAccount($accountName,$accountPhone,$accountEmail,$accountUserId,$accountType,$accountId);

					if ($result)
					{
						echo "Great! You Updated Your Account Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Account Can't Be Updated";
					}
				}
			}
		}

		public function DeleteAccount()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$accountId = $this->input->post('accountId');

				$result = $this->AccountModel->DeleteAccount($accountId);

				if ($result)
				{
					echo "Account Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Account";
				}
			}
		}

		public function RetrieveAccount()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$data = array(
					'title' => 'Retrieve Account - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 3
				);

				$this->load->view('admin/retrieve-account',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function GetDeletedAccountAllInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$option = "dt-dr-common";
				$table = "users";
				$selectColumn = array("Id","UserId","Password","Name","DesignationId","Phone","Email");
				$orderColumn = array("Id","Name",null,null);

				$accountInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($accountInfo as $value)
				{
					$account = array();
					$account[] = $sl;

					if ($value->Name == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Name;
					}

					if ($value->UserId == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->UserId;
					}

					if ($value->DesignationId == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->DesignationId;
					}

					if ($value->Phone == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Phone;
					}

					if ($value->Email == "")
					{
						$account[] = "Data Not Found";
					}
					else
					{
						$account[] = $value->Email;
					}
					
					$account[] = '<button type="button" name="retrieve" id="'.$value->Id.'" class="btn btn-warning retrieve">Retrieve</button>';
					$sl++;
					$data[] = $account;
				}

				$output = array(
					'draw' => intval($_POST['draw']),
					'recordsTotal' => $this->DataTableModel->GetAllData($table),
					'recordsFiltered' => $this->DataTableModel->GetFilteredData($option,$table,$selectColumn,$orderColumn),
					'data' => $data
				);

				echo json_encode($output);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function RetrieveAccountData()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$accountId = $this->input->post('accountId');

				$result = $this->AccountModel->RetrieveAccountData($accountId);

				if ($result)
				{
					echo "Account Retrieved Successfully!";
				}
				else
				{
					echo "Oops, Something Wrong With Retrieving Account";
				}
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>