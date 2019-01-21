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

		public function Publication()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Publication - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
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

				$result = $this->$modelName->$methodName();

				if ($result)
				{
					$output .= '<select class="dropdown span10" name="media-name-id" id="media-name-id">';
					$output .= '<option value="">Select Media Name</option>';
					foreach ($result as $value)
					{
						$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
					}
					$output .= '</select>';
				}
				else
				{
					$output .= '<select class="dropdown span10" name="media-name-id" id="media-name-id" disable>';
					$output .= '<option value="">Media Name Not Found</option>';
					$output .= '</select>';				
				}

				echo $output;
			}
		}
	}
?>