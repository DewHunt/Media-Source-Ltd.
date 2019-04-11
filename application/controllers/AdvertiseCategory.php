<?php
	/**
	 * 
	 */
	class AdvertiseCategory extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('AdvertiseCategoryModel');
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
					'title' => 'Advertise Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/advertise-category',$data);
			}
		}

		public function AdvertiseCategory($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Advertise Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/create-advertise-category',$data);				
			}
		}

		public function CreateAdvertiseCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$advertiseCategoryName = $this->input->post('advertise-category-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkAdvertiseCategory = $this->AdvertiseCategoryModel->CheckAdvertiseCategoryExists($advertiseCategoryName,"");

				if($checkAdvertiseCategoryName)
				{
					return redirect('AdvertiseCategory/AdvertiseCategory/3');
				}
				else
				{
					$advertiseCategoryDescription = $this->input->post('advertise-category-description');

					$result = $this->AdvertiseCategoryModel->CreateAdvertiseCategory($advertiseCategoryName,$advertiseCategoryDescription,$entryId);

					if ($result)
					{
						return redirect('AdvertiseCategory/AdvertiseCategory/1');
					}
					else
					{
						return redirect('AdvertiseCategory/AdvertiseCategory/2');
					}
				}
			}
		}

		public function GetAdvertiseCategoryAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";			
				$table = "adcategory";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$advertiseCategoryInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($advertiseCategoryInfo as $value)
				{
					$advertiseCategory = array();
					$advertiseCategory[] = $sl;

					if ($value->Name == "")
					{
						$advertiseCategory[] = "Data Not Found";
					}
					else
					{
						$advertiseCategory[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$advertiseCategory[] = "Data Not Found";
					}
					else
					{
						$advertiseCategory[] = $value->Description;
					}
					
					$advertiseCategory[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $advertiseCategory;
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

		public function GetAdvertiseCategoryById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$advertiseCategoryId = $this->input->post('advertiseCategoryId');

				$data = $this->AdvertiseCategoryModel->GetAdvertiseCategoryById($advertiseCategoryId);

				$output['advertiseCategoryId'] = $data->Id;
				$output['advertiseCategoryName'] = $data->Name;
				$output['advertiseCategoryDescription'] = $data->Description;

				echo json_encode($output);
			}			
		}

		public function UpdateAdvertiseCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$advertiseCategoryId = $this->input->post('advertise-category-id');
				$advertiseCategoryName = $this->input->post('advertise-category-name');

				$checkAdvertiseCategory = $this->AdvertiseCategoryModel->CheckAdvertiseCategoryExists($advertiseCategoryName,$advertiseCategoryId);

				if ($checkAdvertiseCategory)
				{
					echo "Oops! Sorry, This Advertise Category Alredy Created.";
				}
				else
				{
					$advertiseCategoryDescription = $this->input->post('advertise-category-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->AdvertiseCategoryModel->UpdateAdvertiseCategory($advertiseCategoryId,$advertiseCategoryName,$advertiseCategoryDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Advertise Category Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Advertise Category Can't Be Updated";
					}
				}
			}
		}

		public function DeleteAdvertiseCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$advertiseCategoryId = $this->input->post('advertiseCategoryId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->AdvertiseCategoryModel->DeleteAdvertiseCategory($advertiseCategoryId,$deleteId);

				if ($result)
				{
					echo "Advertise Category Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Advertise Category";
				}
			}
		}
	}
?>