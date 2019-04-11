<?php
	/**
	 * 
	 */
	class PublicationFrequency extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PublicationFrequencyModel');
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
					'title' => 'Publication Frequency - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/publication-frequency',$data);
			}
		}

		public function PublicationFrequency($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication Frequency - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/create-publication-frequency',$data);				
			}
		}

		public function CreatePublicationFrequency()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationFrequencyName = $this->input->post('publication-frequency-name');
				$publicationFrequencyDescription = $this->input->post('publication-frequency-description');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkPublicationFrequency = $this->PublicationFrequencyModel->CheckPublicationFrequencyExists($publicationFrequencyName,"");

				if($checkPublicationFrequency)
				{
					return redirect('PublicationFrequency/PublicationFrequency/3');
				}
				else
				{
					$result = $this->PublicationFrequencyModel->CreatePublicationFrequency($publicationFrequencyName,$publicationFrequencyDescription,$entryId);

					if ($result)
					{
						return redirect('PublicationFrequency/PublicationFrequency/1');
					}
					else
					{
						return redirect('PublicationFrequency/PublicationFrequency/2');
					}
				}
			}
		}

		public function GetPublicationFrequencyAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "pubfrequency";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$publicationFrequencyInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($publicationFrequencyInfo as $value)
				{
					$publicationFrequency = array();
					$publicationFrequency[] = $sl;

					if ($value->Name == "")
					{
						$publicationFrequency[] = "Data Not Found";
					}
					else
					{
						$publicationFrequency[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$publicationFrequency[] = "Data Not Found";
					}
					else
					{
						$publicationFrequency[] = $value->Description;
					}
					
					$publicationFrequency[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $publicationFrequency;
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

		public function GetPublicationFrequencyById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$publicationFrequencyId = $this->input->post('publicationFrequencyId');

				$data = $this->PublicationFrequencyModel->GetPublicationFrequencyById($publicationFrequencyId);

				$output['publicationFrequencyId'] = $data->Id;
				$output['publicationFrequencyName'] = $data->Name;
				$output['publicationFrequencyDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdatePublicationFrequency()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationFrequencyId = $this->input->post('publication-frequency-id');
				$publicationFrequencyName = $this->input->post('publication-frequency-name');

				$checkPublicationFrequency = $this->PublicationFrequencyModel->CheckPublicationFrequencyExists($publicationFrequencyName,$publicationFrequencyId);

				if ($checkPublicationFrequency)
				{
					echo "Oops! Sorry, This Publication Frequency Alredy Created.";
				}
				else
				{
					$publicationFrequencyDescription = $this->input->post('publication-frequency-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->PublicationFrequencyModel->UpdatePublicationFrequency($publicationFrequencyId,$publicationFrequencyName,$publicationFrequencyDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Publication Frequency Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Publication Frequency Can't Be Updated";
					}
				}
			}
		}

		public function DeletePublicationFrequency()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationFrequencyId = $this->input->post('publicationFrequencyId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->PublicationFrequencyModel->DeletePublicationFrequency($publicationFrequencyId,$deleteId);

				if ($result)
				{
					echo "Publication Place Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Publication Place";
				}
			}
		}
	}
?>