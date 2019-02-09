<?php
	/**
	 * 
	 */
	class PlacingType extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PlacingTypeModel');
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
					'title' => 'Placing Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/page/placing-type',$data);
			}
		}

		public function PlacingType($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Placing Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/page/create-placing-type',$data);				
			}
		}

		public function CreatePlacingType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingTypeName = $this->input->post('placing-type-name');

				$checkPlacingType = $this->PlacingTypeModel->CheckPlacingTypeExists($placingTypeName,"");

				if ($checkPlacingType)
				{
					return redirect('PlacingType/PlacingType/3');
				}
				else
				{
					$placingTypeDescription = $this->input->post('placing-type-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->PlacingTypeModel->CreatePlacingType($placingTypeName,$placingTypeDescription,$entryId);

					if ($result)
					{
						return redirect('PlacingType/PlacingType/1');
					}
					else
					{
						return redirect('PlacingType/PlacingType/2');
					}
				}
			}
		}

		public function GetPlacingTypeAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "placingtype";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$placingTypeInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($placingTypeInfo as $value)
				{
					$placingType = array();
					$placingType[] = $sl;
					$placingType[] = $value->Name;
					$placingType[] = $value->Description;
					$placingType[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $placingType;
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

		public function GetPlacingTypeById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$placingTypeId = $this->input->post('placingTypeId');

				$data = $this->PlacingTypeModel->GetPlacingTypeById($placingTypeId);

				$output['placingTypeId'] = $data->Id;
				$output['placingTypeName'] = $data->Name;
				$output['placingTypeDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdatePlacingType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingTypeId = $this->input->post('placing-type-id');
				$placingTypeName = $this->input->post('placing-type-name');

				$checkPlacingType = $this->PlacingTypeModel->CheckPlacingTypeExists($placingTypeName,$placingTypeId);

				if ($checkPlacingType)
				{
					echo "Oops! Sorry, This Placing Type Alredy Created.";
				}
				else
				{
					$placingTypeDescription = $this->input->post('placing-type-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->PlacingTypeModel->UpdatePlacingType($placingTypeId,$placingTypeName,$placingTypeDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Placing Type Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Placing Type Can't Be Updated";
					}
				}
			}
		}

		public function DeletePlacingType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingTypeId = $this->input->post('placingTypeId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->PlacingTypeModel->DeletePlacingType($placingTypeId,$deleteId);

				if ($result)
				{
					echo "Placing Type Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Placing Type";
				}
			}
		}
	}
?>