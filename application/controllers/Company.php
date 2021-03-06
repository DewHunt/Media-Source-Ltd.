<?php
	/**
	 * 
	 */
	class Company extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('CompanyModel');
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
					'title' => 'Company - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/company',$data);
			}
		}

		public function Company($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Company - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/create-company',$data);				
			}
		}

		public function CreateCompany()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$companyName = $this->input->post('company-name');

				$checkCompany = $this->CompanyModel->CheckCompanyExists($companyName,"");

				if ($checkCompany)
				{
					return redirect('Company/Company/3');
				}
				else
				{
					$companyDescription = $this->input->post('company-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->CompanyModel->CreateCompany($companyName,$companyDescription,$entryId);

					if ($result)
					{
						return redirect('Company/Company/1');
					}
					else
					{
						return redirect('Company/Company/2');
					}
				}
			}
		}

		public function GetCompanyAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "company";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$companyInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($companyInfo as $value)
				{
					$company = array();
					$company[] = $sl;

					if ($value->Name == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $value->Description;
					}
					
					$company[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $company;
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

		public function GetCompanyById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$companyId = $this->input->post('companyId');

				$data = $this->CompanyModel->GetCompanyById($companyId);

				$output['companyId'] = $data->Id;
				$output['companyName'] = $data->Name;
				$output['companyDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdateCompany()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$companyId = $this->input->post('company-id');
				$companyName = $this->input->post('company-name');

				$checkCompany = $this->CompanyModel->CheckCompanyExists($companyName,$companyId);

				if ($checkCompany)
				{
					echo "Oops! Sorry, This Company Alredy Created.";
				}
				else
				{
					$companyDescription = $this->input->post('company-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->CompanyModel->UpdateCompany($companyId,$companyName,$companyDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Company Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Company Can't Be Updated";
					}
				}
			}
		}

		public function DeleteCompany()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$companyId = $this->input->post('companyId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->CompanyModel->DeleteCompany($companyId,$deleteId);

				if ($result)
				{
					echo "Company Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Company";
				}
			}
		}

		public function RetrieveCompany()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$data = array(
					'title' => 'Retrieve Company - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/retrieve-company',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function GetDeletedCompanyAllInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$option = "dt-dr-common";
				$table = "company";
				$selectColumn = array("Id","Name","Description","DeleteBy","DeleteDateTime");
				$orderColumn = array("Id","Name",null,null);

				$companyInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($companyInfo as $value)
				{
					$company = array();
					$company[] = $sl;

					if ($value->Name == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $value->Description;
					}

					if ($value->DeleteBy == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $this->AdminModel->GetAdminById($value->DeleteBy)->Name;
					}

					if ($value->DeleteDateTime == "")
					{
						$company[] = "Data Not Found";
					}
					else
					{
						$company[] = $value->DeleteDateTime;
					}
					
					$company[] = '<button type="button" name="retrieve" id="'.$value->Id.'" class="btn btn-primary btn-xs retrieve">Retrieve</button>';
					$sl++;
					$data[] = $company;
				}

				$output = array(
					'draw' => intval($_POST['draw']),
					'recordsTotal' => $this->DataTableModel->GetAllDeleteData($table),
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

		public function RetrieveCompanyData()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$companyId = $this->input->post('companyId');

				$result = $this->CompanyModel->RetrieveCompanyData($companyId);

				if ($result)
				{
					echo "Company Retrieve From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Retrieving Company";
				}
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>