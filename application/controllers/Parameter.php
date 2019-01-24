<?php
	/**
	 * 
	 */
	class Parameter extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('ParameterModel');
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
					'title' => 'Parameter - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/parameter',$data);
			}
		}

		public function Parameter($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Parameter - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-parameter',$data);				
			}
		}

		public function CreateParameter()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$parameterName = $this->input->post('parameter-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkParameterName = $this->ParameterModel->CheckParameterNameExists($parameterName);

				if($checkParameterName)
				{
					return redirect('Parameter/Parameter/3');
				}
				else
				{
					$parameterDescription = $this->input->post('parameter-description');

					$result = $this->ParameterModel->CreateParameter($parameterName,$parameterDescription,$entryId);

					if ($result)
					{
						return redirect('Parameter/Parameter/1');
					}
					else
					{
						return redirect('Parameter/Parameter/2');
					}
				}
			}
		}
	}
?>