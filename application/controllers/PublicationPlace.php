<?php
	/**
	 * 
	 */
	class PublicationPlace extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PublicationPlaceModel');
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
					'title' => 'Publication Place- Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/publication-place',$data);
			}
		}

		public function PublicationPlace($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication Place- Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-publication-place',$data);				
			}
		}

		public function CreatePublicationPlace()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationPlaceName = $this->input->post('publication-place-name');
				$publicationPlaceDescription = $this->input->post('publication-place-description');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkPublicationPlaceName = $this->PublicationPlaceModel->CheckPublicationPlaceExists($publicationPlaceName);

				if($checkPublicationPlaceName)
				{
					return redirect('PublicationPlace/PublicationPlace/3');
				}
				else
				{
					$result = $this->PublicationPlaceModel->CreatePublicationPlace($publicationPlaceName,$publicationPlaceDescription,$entryId);

					if ($result)
					{
						return redirect('PublicationPlace/PublicationPlace/1');
					}
					else
					{
						return redirect('PublicationPlace/PublicationPlace/2');
					}
				}
			}
		}

		public function GetPublicationPlaceAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";			
				$table = "pubplace";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$publicationPlaceInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($publicationPlaceInfo as $value)
				{
					$publicationPlace = array();
					$publicationPlace[] = $sl;
					$publicationPlace[] = $value->Name;
					$publicationPlace[] = $value->Description;
					$publicationPlace[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $publicationPlace;
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

		public function GetPublicationPlaceById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$publicationPlaceId = $this->input->post('publicationPlaceId');

				$data = $this->PublicationPlaceModel->GetPublicationPlaceById($publicationPlaceId);

				$output['publicationPlaceId'] = $data->Id;
				$output['publicationPlaceName'] = $data->Name;
				$output['publicationPlaceDescription'] = $data->Description;

				echo json_encode($output);
			}			
		}

		public function UpdatePublicationPlace()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationPlaceId = $this->input->post('publication-place-id');
				$publicationPlaceName = $this->input->post('publication-place-name');
				$publicationPlaceDescription = $this->input->post('publication-place-description');
				$updateId = $this->GetAdminAllInfo()->Id;

				$result = $this->PublicationPlaceModel->UpdatePublicationPlace($publicationPlaceId,$publicationPlaceName,$publicationPlaceDescription,$updateId);

				if ($result)
				{
					echo "Great! You Updated Your Publication Place Successfully";
				}
				else
				{
					echo "Oops! Sorry, Your Publication Place Can't Be Updated";
				}
			}
		}

		public function DeletePublicationPlace()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationPlaceId = $this->input->post('publicationPlaceId');

				$result = $this->PublicationPlaceModel->DeletePublicationPlace($publicationPlaceId);

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