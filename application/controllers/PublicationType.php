<?php
	/**
	 * 
	 */
	class Publicationtype extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PublicationTypeModel');
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
					'title' => 'Publication Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/publication-type',$data);
			}
		}

		public function PublicationType($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-publication-type',$data);
			}
		}

		public function CreatePublicationType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationTypeName = $this->input->post('publication-type-name');

				$checkPublicationTypeName = $this->PublicationTypeModel->CheckPublicationTypeExists($publicationTypeName);

				if ($checkPublicationTypeName)
				{
					return redirect('PublicationType/PublicationType/3');
				}
				else
				{
					$publicationTypeDescription = $this->input->post('publication-type-description');

					$entryId = $this->GetAdminAllInfo()->Id;
					
					$result = $this->PublicationTypeModel->CreatePublicationType($publicationTypeName,$publicationTypeDescription,$entryId);

					if ($result)
					{
						return redirect('PublicationType/PublicationType/1');
					}
					else
					{
						return redirect('PublicationType/PublicationType/2');
					}
				}
			}
		}

		public function GetPublicationTypeAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "pubtype";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id",null,null,null);

				$publicationTypeInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($publicationTypeInfo as $value)
				{
					$publicationType = array();
					$publicationType[] = $sl;
					$publicationType[] = $value->Name;
					$publicationType[] = $value->Description;
					$publicationType[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $publicationType;
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

		public function GetPublicationTypeById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$publicationTypeId = $this->input->post('publicationTypeId');

				$data = $this->PublicationTypeModel->GetPublicationTypeById($publicationTypeId);

				$output['publicationTypeId'] = $data->Id;
				$output['publicationTypeName'] = $data->Name;
				$output['publicationTypeDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdatePublicationType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationTypeId = $this->input->post('publication-type-id');
				$publicationTypeName = $this->input->post('publication-type-name');
				$publicationTypeDescription = $this->input->post('publication-type-description');
				$updateId = $this->GetAdminAllInfo()->Id;

				$result = $this->PublicationTypeModel->UpdatePublicationType($publicationTypeId,$publicationTypeName,$publicationTypeDescription,$updateId);

				if ($result)
				{
					echo "Great! You Updated Your Publication Type Successfully";
				}
				else
				{
					echo "Oops! Sorry, Your Publication Type Can't Be Updated";
				}
			}
		}

		public function DeletePublicationType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationTypeId = $this->input->post('publicationTypeId');

				$result = $this->PublicationTypeModel->DeletePublicationType($publicationTypeId);

				if ($result)
				{
					echo "Publication Type Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Publication Type";
				}
			}
		}
	}
?>