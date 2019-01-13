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
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/media-name',$data);
			}
		}

		public function MediaName()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Media Name - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
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
				$imageName = array();

				$config['upload_path'] = "images/media_logo";
				$config['allowed_types'] = "jpg|jpeg|png|gif";

				$this->load->library('upload',$config);

				if (!$this->upload->do_upload('media-mage'))
				{
					$error = $this->upload->display_errors();
				}
				else
				{
					$imageData = $this->upload->data();
					$data = $config['upload_path'].$imageData['file_name'];
					$imageName = $image_data['file_name'];
				}

				print_r($data);
				// echo $imageName;
				exit();
				$result = $this->MediaNameModel->CreateMediaName();

				if ($result)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
?>