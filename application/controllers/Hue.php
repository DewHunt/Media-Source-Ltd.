<?php
	/**
	 * 
	 */
	class Hue extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('HueModel');
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
					'title' => 'Hue - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 2
				);

				$this->load->view('admin/system_setup/page/hue',$data);
			}
		}

		public function Hue($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Hue - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 2
				);

				$this->load->view('admin/system_setup/page/create-hue',$data);
			}
		}

		public function CreateHue()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$hueName = $this->input->post('hue-name');

				$checkHue = $this->HueModel->CheckHueExists($hueName,"");

				if ($checkHue)
				{
					return redirect('Hue/Hue/3');
				}
				else
				{
					$hueDescription = $this->input->post('hue-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->HueModel->CreateHue($hueName,$hueDescription,$entryId);

					if ($result)
					{
						return redirect('Hue/Hue/1');
					}
					else
					{
						return redirect('Hue/Hue/2');
					}
				}
			}
		}

		public function GetHueAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "hue";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$hueInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($hueInfo as $value)
				{
					$hue = array();
					$hue[] = $sl;

					if ($value->Name == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $value->Description;
					}

					$hue[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $hue;
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

		public function GetHueById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$hueId = $this->input->post('hueId');

				$data = $this->HueModel->GetHueById($hueId);

				$output['hueId'] = $data->Id;
				$output['hueName'] = $data->Name;
				$output['hueDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdateHue()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$hueId = $this->input->post('hue-id');
				$hueName = $this->input->post('hue-name');

				$checkHue = $this->HueModel->CheckHueExists($hueName,$hueId);

				if ($checkHue)
				{
					echo "Oops! Sorry, This Hue Alredy Created.";
				}
				else
				{
					$hueDescription = $this->input->post('hue-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->HueModel->UpdateHue($hueId,$hueName,$hueDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Hue Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Hue Can't Be Updated";
					}
				}
			}
		}

		public function DeleteHue()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$hueId = $this->input->post('hueId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->HueModel->DeleteHue($hueId,$deleteId);

				if ($result)
				{
					echo "Hue Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Hue";
				}
			}
		}

		public function RetrieveHue()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$data = array(
					'title' => 'Retrieve Hue - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 2
				);

				$this->load->view('admin/system_setup/page/retrieve-hue',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function GetDeletedHueAllInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$option = "dt-dr-common";
				$table = "hue";
				$selectColumn = array("Id","Name","Description","DeleteBy","DeleteDateTime");
				$orderColumn = array("Id","Name",null,null);

				$hueInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($hueInfo as $value)
				{
					$hue = array();
					$hue[] = $sl;

					if ($value->Name == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $value->Description;
					}

					if ($value->DeleteBy == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $this->AdminModel->GetAdminById($value->DeleteBy)->Name;
					}

					if ($value->DeleteDateTime == "")
					{
						$hue[] = "Data Not Found";
					}
					else
					{
						$hue[] = $value->DeleteDateTime;
					}

					$hue[] = '<button type="button" name="retrieve" id="'.$value->Id.'" class="btn btn-primary btn-xs retrieve">Retrieve</button>';
					$sl++;
					$data[] = $hue;
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

		public function RetrieveHueData()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$hueId = $this->input->post('hueId');

				$result = $this->HueModel->RetrieveHueData($hueId);

				if ($result)
				{
					echo "Retrieve Hue Successfully!";
				}
				else
				{
					echo "Oops, Something Wrong With Retrieving Hue";
				}
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>