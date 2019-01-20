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

		public function PublicationPlace()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication Place- Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/create-publication-place',$data);				
			}
		}
	}
?>