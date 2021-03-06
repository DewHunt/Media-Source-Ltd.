<?php
	/**
	 * 
	 */
	class MediaName extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('MediaNameModel');
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
					'title' => 'Media Name - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					// 'mediaInfo' => $this->MediaNameModel->GetMediaNameAllInfo()
					'mediaInfo' => '',
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/media-name',$data);
			}
		}

		public function MediaName($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Media Name - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/create-media-name',$data);				
			}
		}

		public function CreateMediaName()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$mediaName = $this->input->post('media-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkMediaName = $this->MediaNameModel->CheckMediaNameExsits($mediaName,"");

				if ($checkMediaName)
				{
					return redirect('MediaName/MediaName/3');
				}
				else
				{
					$mediaOwner = $this->input->post('media-owner');
					$mediaPhone = $this->input->post('media-phone');
					$mediaEmail = $this->input->post('media-email');
					$mediaAddress = $this->input->post('media-address');

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					$mediaImage = $_FILES['media-image']['name'];

					if ($mediaImage == "")
					{
						$dbImageName = "";
					}
					else
					{
						$extension = pathinfo($mediaImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $mediaName));
						$dbImageName = "med_".$slug."_".date('ymds').".".$extension;
						$copyImageName = $config['upload_path'].$dbImageName;

						copy($_FILES['media-image']['tmp_name'],$copyImageName);
					}

					$result = $this->MediaNameModel->CreateMediaName($mediaName,$mediaOwner,$mediaPhone,$mediaEmail,$mediaAddress,$dbImageName,$entryId);

					if ($result)
					{
						return redirect('MediaName/MediaName/1');
					}
					else
					{
						return redirect('MediaName/MediaName/2');
					}
				}
			}
		}

		public function GetMediaNameAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "media";
				$selectColumn = array("Id","Name","Owner","Phone","Email","Address","Image");
				$orderColumn = array("Id","Name",null,null);

				$mediaInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($mediaInfo as $value)
				{
					$media = array();
					$media[] = $sl;

					if ($value->Name == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = $value->Name;
					}

					if ($value->Id == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = $value->Id;
					}

					if ($value->Owner == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = $value->Owner;
					}

					if ($value->Phone == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = $value->Phone;
					}

					if ($value->Email == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = $value->Email;
					}

					if ($value->Image == "")
					{
						$media[] = "Data Not Found";
					}
					else
					{
						$media[] = '<img src="'.base_url("images/").$value->Image.'" width="80px" height="80px">';
					}
					
					$media[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $media;
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

		public function GetMediaNameById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$mediaId = $this->input->post('mediaId');

				$data = $this->MediaNameModel->GetMediaNameById($mediaId);

				$output['mediaId'] = $data->Id;
				$output['mediaName'] = $data->Name;
				$output['mediaOwner'] = $data->Owner;
				$output['mediaPhone'] = $data->Phone;
				$output['mediaEmail'] = $data->Email;
				$output['mediaAddress'] = $data->Address;
				$output['previousMediaImage'] = $data->Image;

				if ($data->Image == "")
				{
					$output['mediaImage'] = '<input type="hidden" name="previous-media-image" id="previous-media-image" value="">';
				}
				else
				{
					$output['mediaImage'] = '<img src="'.base_url("images/media_logo/").$data->Image.'" class="img-thumbnail" width="80px" height="80px"> <input type="hidden" name="previous-media-image" id="previous-media-image" value="'.$data->Image.'">';
				}

				echo json_encode($output);
			}
		}

		public function UpdateMediaName()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$mediaName = $this->input->post('media-name');
				$mediaId = $this->input->post('media-id');

				$checkMediaName = $this->MediaNameModel->CheckMediaNameExsits($mediaName,$mediaId);

				if ($checkMediaName)
				{
					echo "Oops! Sorry, This Media Name Alredy Created.";
				}
				else
				{
					$mediaOwner = $this->input->post('media-owner');
					$mediaPhone = $this->input->post('media-phone');
					$mediaEmail = $this->input->post('media-email');
					$mediaAddress = $this->input->post('media-address');
					$updateId = $this->GetAdminAllInfo()->Id;
					$newMediaImage = "";

					if (!empty($_FILES["new-media-image"]["name"]))
					{
						$mediaImage = $_FILES['new-media-image']['name'];
						$previousImage = $this->input->post('previous-media-image');

						// Copy Image and Get Image New Name
						$config['upload_path'] = "images/";
						$config['allowed_types'] = "jpg|jpeg|png|gif";
						$this->load->library('upload',$config);

						$extention = pathinfo($mediaImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $mediaName));
						$dbImageName = "med_".$slug."_".date('ymds').".".$extention;
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

						copy($_FILES['new-media-image']['tmp_name'],$copyImageName);
					}
					else
					{
						$dbImageName = $this->input->post("previous-media-image");
					}

					$result = $this->MediaNameModel->UpdateMediaName($mediaId,$mediaName,$mediaOwner,$mediaPhone,$mediaEmail,$mediaAddress,$dbImageName,$updateId);

					if ($result)
					{
						echo "Greate! You Updated Your Media Name Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Media Name Can't Be Updated";
					}
				}
			}
		}

		public function DeleteMediaName()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$mediaId = $this->input->post('mediaId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->MediaNameModel->DeleteMediaName($mediaId,$deleteId);
				
				if ($result)
				{
					echo "Media Dleted From Database!";
				}
				else
				{
					echo "Oops! Something Wrong With Deleting Media Name";
				}
			}
		}
	}
?>