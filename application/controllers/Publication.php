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
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 1
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
					'message' => $msg,
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/create-publication',$data);				
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

				$checkPublication = $this->PublicationModel->CheckPublicationExists($publicationName,$mediaNameId,"");

				if ($checkPublication)
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
					$config['upload_path'] = "images/";
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
						$dbImageName = "pub_".$slug."_".$mediaNameId."_".date('ymds').".".$extention;
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

					if ($value->Name == "")
					{
						$publication[] = "Data Not Found";
					}
					else
					{
						$publication[] = $value->Name;
					}

					if ($value->MediaId == "" || $value->MediaId == 0)
					{
						$publication[] = "Data Not Found";
					}
					else
					{
						$mediaName = $this->MediaNameModel->GetMediaNameById($value->MediaId);
						if ($mediaName)
						{
							$publication[] = $mediaName->Name;
						}
						else
						{
							$publication[] = "Data Not Found";
						}
					}

					if ($value->PublicationType == "" || $value->PublicationType == 0)
					{
						$publication[] = "Data Not Found";
					}
					else
					{
						$publicationTypeName = $this->PublicationTypeModel->GetPublicationTypeById($value->PublicationType);
						if ($publicationTypeName)
						{
							$publication[] = $publicationTypeName->Name;
						}
						else
						{
							$publication[] = "Data Not Found";
						}
					}

					if ($value->PubFreQuencyId == "" || $value->PubFreQuencyId == 0)
					{
						$publication[] = "Data Not Found";
					}
					else
					{
						$publicationName = $this->PublicationFrequencyModel->GetPublicationFrequencyById($value->PubFreQuencyId);
						if ($publicationName)
						{
							$publication[] = $publicationName->Name;
						}
						else
						{
							$publication[] = "Data Not Found";
						}
					}

					if ($value->Description == "")
					{
						$publication[] = "Data Not Found";
					}
					else
					{
						$publication[] = $value->Description;
					}

					if ($value->Logo == "")
					{
						$publication[] = "Image Not Found";
					}
					else
					{
						$publication[] = '<img src="'.base_url("images/").$value->Logo.'" width="80px" height="80px">';
					}

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
					$output['publicationImage'] = '<img src="'.base_url("images/").$data->Logo.'" class="img-thumbnail" width="80px" height="80px"> <input type="hidden" name="previous-publication-image" id="previous-publication-image" value="'.$data->Logo.'">';
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
				$publicationId = $this->input->post('publication-id');

				$checkPublication = $this->PublicationModel->CheckPublicationExists($publicationName,$mediaNameId,$publicationId);

				if ($checkPublication)
				{
					echo "Oops! Sorry, This Publication Alredy Created.";
				}
				else
				{
					$publicationTypeId = $this->input->post('publication-type-id');
					$publicationPlaceId = $this->input->post('publication-place-id');
					$publicationFrequencyId = $this->input->post('publication-frequency-id');
					$publicationLanguage = $this->input->post('publication-language');
					$publicationDescription = $this->input->post('publication-description');
					$updateId = $this->GetAdminAllInfo()->Id;
					$newPublicationImage = "";

					if (!empty($_FILES["new-publication-image"]["name"]))
					{
						$publicationImage = $_FILES['new-publication-image']['name'];
						$previousImage = $this->input->post('previous-publication-image');

						// Copy Image and Get Image New Name
						$config['upload_path'] = "images/";
						$config['allowed_types'] = "jpg|jpeg|png|gif";
						$this->load->library('upload',$config);

						$extention = pathinfo($publicationImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $publicationName));
						$dbImageName = "pub_".$slug."_".$mediaNameId."_".date('ymds').".".$extention;
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
					else
					{
						$dbImageName = $this->input->post("previous-publication-image");
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
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->PublicationModel->DeletePublication($publicationId,$deleteId);
				
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