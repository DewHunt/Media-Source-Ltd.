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
			$this->load->model('MediaNameModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
		}

		public function GetAdminId()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminId($adminUserName,$adminPassword);
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
					'mediaInfo' => $this->MediaNameModel->GetMediaNameAllInfo()
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
					'message' => $msg
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

				// Copy Image and Get Image New Name
				$config['upload_path'] = "images/media_logo/";
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$this->load->library('upload',$config);

				$mediaImage = $_FILES['media-image']['name'];

				if ($mediaImage == "")
				{
					$msg = "Error! Image Uplod";
					return redirect('MediaName/MediaName',$msg);
				}
				else
				{
					$extention = pathinfo($mediaImage, PATHINFO_EXTENSION);
					$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $mediaName));
					$imageName = $config['upload_path'].$slug."_".date('ymds').".".$extention;

					copy($_FILES['media-image']['tmp_name'],$imageName);
				}

				$result = $this->MediaNameModel->CreateMediaName($mediaName,$imageName,$entryId);

				if ($result)
				{
					$msg = "Media Name Created Succesfully";
					return redirect('MediaName/MediaName/1');
				}
				else
				{
					return redirect('MediaName/MediaName/2');
				}
			}
		}
	}
?>