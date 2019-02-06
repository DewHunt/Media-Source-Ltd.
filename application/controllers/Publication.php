<?php
	/**
	 * 
	 */
	class Publication extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('MediaNameModel');
			$this->load->model('PublicationTypeModel');
			$this->load->model('PublicationPlaceModel');
			$this->load->model('PublicationFrequencyModel');
			$this->load->model('DataTableModel');
			$this->load->model('PublicationModel');
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
					'title' => 'Publication - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/publication',$data);
			}
		}

		public function Publication($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-publication',$data);				
			}
		}

		public function GetDataForSelectMenu()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = '';
				$modelName = $this->input->post('modelName');
				$methodName = $this->input->post('methodName');
				$idNameAttr = $this->input->post('idNameAttr');
				$selectHeader = $this->input->post('selectHeader');

				$result = $this->$modelName->$methodName();

				if ($result)
				{
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
					$output .= '<option value="">'.$selectHeader.'</option>';
					foreach ($result as $value)
					{
						$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
					}
					$output .= '</select>';
				}
				else
				{
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" disable>';
					$output .= '<option value="">Data Option Not Found</option>';
					$output .= '</select>';				
				}

				echo $output;
			}
		}

		public function CreatePublication()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationName = $this->input->post('publication-name');
				$mediaNameId = $this->input->post('media-name-id');

				$checkPublicationName = $this->PublicationModel->checkPublicationExists($publicationName,$mediaNameId);

				if ($checkPublicationName)
				{
					return redirect('Publication/Publication/3');
				}
				else
				{
					$publicationTypeId = $this->input->post('publication-type-id');
					$publicationPlaceId = $this->input->post('publication-place-id');
					$publicationFrequencyId = $this->input->post('publication-frequency-id');
					$publicationLanguage = $this->input->post('publication-language');
					$publicationDescription = $this->input->post('publication-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/publication_logo/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					$publicationImage = $_FILES['publication-image']['name'];

					if ($publicationImage == "")
					{
						$dbImageName = "";
					}
					else
					{
						$extention = pathinfo($publicationImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $publicationName));
						$dbImageName = $slug."_".$mediaNameId."_".date('ymds').".".$extention;
						$copyImageName = $config['upload_path'].$dbImageName;

						copy($_FILES['publication-image']['tmp_name'],$copyImageName);
					}

					$result = $this->PublicationModel->CreatePublication($publicationName,$mediaNameId,$publicationTypeId,$publicationPlaceId,$publicationFrequencyId,$publicationLanguage,$publicationDescription,$dbImageName,$entryId);

					if ($result)
					{
						return redirect('Publication/Publication/1');
					}
					else
					{
						return redirect('Publication/Publication/2');
					}
				}
			}
		}

		public function GetPublicationAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-publication";
				$table = "publication";
				$selectColumn = array("Id","Name","MediaId","PublicationType","PubPlaceId","PubFreQuencyId","PublicationLan","Description","Logo");
				$orderColumn = array("Id","Name","MediaId",null,null,null,null,null,null,null,null);

				$publicationInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($publicationInfo as $value)
				{
					$publication = array();
					$publication[] = $sl;
					$publication[] = $value->Name;
					$publication[] = $this->MediaNameModel->GetMediaNameById($value->MediaId)->Name;
					$publication[] = $this->PublicationTypeModel->GetPublicationTypeById($value->PublicationType)->Name;
					$publication[] = $this->PublicationFrequencyModel->GetPublicationFrequencyById($value->PubFreQuencyId)->Name;
					$publication[] = $value->Description;
					$publication[] = '<img src="'.base_url("images/publication_logo/").$value->Logo.'" width="80px" height="80px">';
					$publication[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $publication;
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

		public function GetPublicationById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$publicationId = $this->input->post('publicationId');

				$data = $this->PublicationModel->GetPublicationById($publicationId);

				$output['publicationId'] = $data->Id;
				$output['publicationName'] = $data->Name;
				$output['publicationLanguage'] = $data->PublicationLan;
				$output['publicationDescription'] = $data->Description;
				$output['previousPublicationImage'] = $data->Logo;
				$output['mediaId'] = $data->MediaId;
				$output['publicationTypeId'] = $data->PublicationType;
				$output['publicationPlaceId'] = $data->PubPlaceId;
				$output['publicationFrequencyId'] = $data->PubFreQuencyId;

				if ($data->Logo == "")
				{
					$output['publicationImage'] = '<input type="hidden" name="previous-publication-image" id="previous-publication-image" value="">';
				}
				else
				{
					$output['publicationImage'] = '<img src="'.base_url("images/publication_logo/").$data->Logo.'" class="img-thumbnail" width="80px" height="80px"> <input type="hidden" name="previous-publication-image" id="previous-publication-image" value="'.$data->Logo.'">';
				}

				echo json_encode($output);
			}
		}

		public function UpdatePublication()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationName = $this->input->post('publication-name');
				$mediaNameId = $this->input->post('media-name-id');
				$publicationTypeId = $this->input->post('publication-type-id');
				$publicationPlaceId = $this->input->post('publication-place-id');
				$publicationFrequencyId = $this->input->post('publication-frequency-id');
				$publicationLanguage = $this->input->post('publication-language');
				$publicationDescription = $this->input->post('publication-description');

				$publicationId = $this->input->post('publication-id');
				$updateId = $this->GetAdminAllInfo()->Id;
				$newPublicationImage = "";

				if ($_FILES["new-publication-image"]["name"] == "")
				{
					$dbImageName = $this->input->post("previous-publication-image");
				}
				else
				{
					$publicationImage = $_FILES['new-publication-image']['name'];
					$previousImage = $this->input->post('previous-publication-image');

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/publication_logo/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					$extention = pathinfo($publicationImage, PATHINFO_EXTENSION);
					$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $publicationName));
					$dbImageName = $slug."_".$mediaNameId."_".date('ymds').".".$extention;
					$copyImageName = $config['upload_path'].$dbImageName;

					if ($previousImage != "")
					{					
						$deleteImage = $config['upload_path'].$previousImage;

						if (file_exists($deleteImage))
						{
							chown($deleteImage, 666);
							unlink($deleteImage);
						}
					}

					copy($_FILES['new-publication-image']['tmp_name'],$copyImageName);
				}

				$result = $this->PublicationModel->UpdatePublication($publicationId,$publicationName,$mediaNameId,$publicationTypeId,$publicationPlaceId,$publicationFrequencyId,$publicationLanguage,$publicationDescription,$dbImageName,$updateId);

				if ($result)
				{
					echo "Greate! You Updated Your Publication Successfully";
				}
				else
				{
					echo "Oops! Sorry, Your Publication Can't Be Updated";
				}				
			}
		}

		public function DeletePublication()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$publicationId = $this->input->post('publicationId');

				$publicationImageName = $this->PublicationModel->GetPublicationById($publicationId)->Logo;

				// Delete Image and Get Image New Name Start
				$config['upload_path'] = "images/publication_logo/";
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$this->load->library('upload',$config);

				if ($publicationImageName != "")
				{					
					$deleteImage = $config['upload_path'].$publicationImageName;

					if (file_exists($deleteImage))
					{
						chown($deleteImage, 666);
						unlink($deleteImage);
					}
				}
				// Delete Image and Get Image New Name End

				$result = $this->PublicationModel->DeletePublication($publicationId);
				
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