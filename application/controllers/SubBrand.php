<?php
	/**
	 * 
	 */
	class SubBrand extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('CompanyModel');
			$this->load->model('BrandModel');
			$this->load->model('DataTableModel');
			$this->load->model('SubBrandModel');
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
					'title' => 'Sub-Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/advertise/sub-brand',$data);
			}
		}

		public function SubBrand($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Sub-Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/advertise/create-sub-brand',$data);				
			}
		}

		public function CreateSubBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$subBrandName = $this->input->post('sub-brand-name');
				$companyId = $this->input->post('company-id');
				$brandId = $this->input->post('brand-id');

				$checkSubBrand = $this->SubBrandModel->checkSubBrandExists($subBrandName,$companyId,$brandId,"");

				if ($checkSubBrand)
				{
					return redirect('SubBrand/SubBrand/3');
				}
				else
				{
					$subBrandDescription = $this->input->post('sub-brand-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->SubBrandModel->CreateSubBrand($subBrandName,$companyId,$brandId,$subBrandDescription,$entryId);

					if ($result)
					{
						return redirect('SubBrand/SubBrand/1');
					}
					else
					{
						return redirect('SubBrand/SubBrand/2');
					}
				}
			}

		}

		public function GetSubBrandAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-sub-brand";
				$table = "subbrand";
				$selectColumn = array("Id","Name","CompanyId","Description","BrandId");
				$orderColumn = array("Id","Name",null,null,null);

				$subBrandInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($subBrandInfo as $value)
				{
					$subBrand = array();
					$subBrand[] = $sl;
					$subBrand[] = $value->Name;
					$subBrand[] = $this->CompanyModel->GetCompanyById($value->CompanyId)->Name;
					$subBrand[] = $this->BrandModel->GetBrandById($value->BrandId)->Name;
					$subBrand[] = $value->Description;
					$subBrand[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $subBrand;
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

		public function GetBrandById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$subBrandId = $this->input->post('subBrandId');

				$data = $this->SubBrandModel->GetSubBrandById($subBrandId);

				$output['subBrandId'] = $data->Id;
				$output['subBrandName'] = $data->Name;
				$output['companyId'] = $data->CompanyId;
				$output['subBrandDescription'] = $data->Description;
				$output['brandId'] = $data->BrandId;

				echo json_encode($output);
			}
		}

		public function UpdateSubBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$subBrandName = $this->input->post('sub-brand-name');
				$companyId = $this->input->post('company-id');
				$brandId = $this->input->post('brand-id');
				$subBrandId = $this->input->post('sub-brand-id');

				$checkSubBrand = $this->SubBrandModel->checkSubBrandExists($subBrandName,$companyId,$brandId,$subBrandId);

				if ($checkSubBrand)
				{
					echo "Oops! Sorry, This Sub Brand Alredy Created.";
				}
				else
				{
					$subBrandDescription = $this->input->post('sub-brand-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->SubBrandModel->UpdateSubBrand($subBrandId,$subBrandName,$companyId,$subBrandDescription,$brandId,$updateId);

					if ($result)
					{
						echo "Greate! You Updated Your Sub Brand Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Sub Brand Can't Be Updated";
					}
				}				
			}
		}

		public function DeleteSubBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$subBrandId = $this->input->post('subBrandId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->SubBrandModel->DeleteSubBrand($subBrandId,$deleteId);
				
				if ($result)
				{
					echo "Publication Dleted From Database!";
				}
				else
				{
					echo "Oops! Something Wrong With Deleting Publication";
				}
			}
		}
	}
?>