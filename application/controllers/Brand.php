<?php
	/**
	 * 
	 */
	class Brand extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('CompanyModel');
			$this->load->model('DataTableModel');
			$this->load->model('BrandModel');
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
					'title' => 'Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/advertise/brand',$data);
			}
		}

		public function Brand($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/advertise/create-brand',$data);				
			}
		}

		public function CreateBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$brandName = $this->input->post('brand-name');
				$companyId = $this->input->post('company-id');

				$checkBrand = $this->BrandModel->checkBrandExists($brandName,$companyId,"");

				if ($checkBrand)
				{
					return redirect('Brand/Brand/3');
				}
				else
				{
					$brandDescription = $this->input->post('brand-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->BrandModel->CreateBrand($brandName,$companyId,$brandDescription,$entryId);

					if ($result)
					{
						return redirect('Brand/Brand/1');
					}
					else
					{
						return redirect('Brand/Brand/2');
					}
				}
			}
		}

		public function GetBrandAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-brand";
				$table = "brand";
				$selectColumn = array("Id","Name","CompanyId","Description");
				$orderColumn = array("Id","Name","CompanyId",null,null);

				$brandInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($brandInfo as $value)
				{
					$brand = array();
					$brand[] = $sl;
					$brand[] = $value->Name;
					$brand[] = $this->CompanyModel->GetCompanyById($value->CompanyId)->Name;
					// $product[] = $value->ProductCategoryId;
					$brand[] = $value->Description;
					$brand[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $brand;
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
				$brandId = $this->input->post('brandId');

				$data = $this->BrandModel->GetBrandById($brandId);

				$output['brandId'] = $data->Id;
				$output['brandName'] = $data->Name;
				$output['brandDescription'] = $data->Description;
				$output['companyId'] = $data->CompanyId;

				echo json_encode($output);
			}
		}

		public function UpdateBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$brandName = $this->input->post('brand-name');
				$companyId = $this->input->post('company-id');
				$brandId = $this->input->post('brand-id');

				$checkBrand = $this->BrandModel->checkBrandExists($brandName,$companyId,$brandId);

				if ($checkBrand)
				{
					echo "Oops! Sorry, This Brand Alredy Created.";
				}
				else
				{
					$brandDescription = $this->input->post('brand-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->BrandModel->UpdateBrand($brandId,$brandName,$companyId,$brandDescription,$updateId);

					if ($result)
					{
						echo "Greate! You Updated Your Brand Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Brand Can't Be Updated";
					}
				}				
			}
		}

		public function DeleteBrand()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$brandId = $this->input->post('brandId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->BrandModel->DeleteBrand($brandId,$deleteId);
				
				if ($result)
				{
					echo "Brand Dleted From Database!";
				}
				else
				{
					echo "Oops! Something Wrong With Deleting Brand";
				}
			}
		}
	}
?>