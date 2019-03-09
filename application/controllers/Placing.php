<?php
	/**
	 * 
	 */
	class Placing extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PlacingModel');
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
					'title' => 'Placing - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/page/placing',$data);
			}
		}

		public function Placing($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Placing - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/page/create-placing',$data);				
			}
		}

		public function CreatePlacing()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingName = $this->input->post('placing-name');

				$checkPlacing = $this->PlacingModel->CheckPlacingExists($placingName,"");

				if ($checkPlacing)
				{
					return redirect('Placing/Placing/3');
				}
				else
				{
					$placingDescription = $this->input->post('placing-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->PlacingModel->CreatePlacing($placingName,$placingDescription,$entryId);

					if ($result)
					{
						return redirect('Placing/Placing/1');
					}
					else
					{
						return redirect('Placing/Placing/2');
					}
				}
			}
		}

		public function GetPlacingAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "placing";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$placingInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($placingInfo as $value)
				{
					$placing = array();
					$placing[] = $sl;

					if ($value->Name == "")
					{
						$placing[] = "Data Not Found";
					}
					else
					{
						$placing[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$placing[] = "Data Not Found";
					}
					else
					{
						$placing[] = $value->Description;
					}

					$placing[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $placing;
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

		public function GetPlacingById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$placingId = $this->input->post('placingId');

				$data = $this->PlacingModel->GetPlacingById($placingId);

				$output['placingId'] = $data->Id;
				$output['placingName'] = $data->Name;
				$output['placingDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdatePlacing()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingId = $this->input->post('placing-id');
				$placingName = $this->input->post('placing-name');

				$checkPlacing = $this->PlacingModel->CheckPlacingExists($placingName,$placingId);

				if ($checkPlacing)
				{
					echo "Oops! Sorry, This Placing Alredy Created.";
				}
				else
				{
					$placingDescription = $this->input->post('placing-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->PlacingModel->UpdatePlacing($placingId,$placingName,$placingDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Placing Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Placing Can't Be Updated";
					}
				}
			}
		}

		public function DeletePlacing()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$placingId = $this->input->post('placingId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->PlacingModel->DeletePlacing($placingId,$deleteId);

				if ($result)
				{
					echo "Placing Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Placing";
				}
			}
		}
	}
?>