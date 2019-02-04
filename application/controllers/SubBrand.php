<?php
	/**
	 * 
	 */
	class SubBrand extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('CompanyModel');
			$this->load->model('BrandModel');
			$this->load->model('DataTableModel');
			$this->load->model('SubBrandModel');
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
					'title' => 'Sub-Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/advertise/sub-brand',$data);
			}
		}

		public function SubBrand($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Sub-Brand - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/advertise/create-sub-brand',$data);				
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
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" disable style="width: 99%;">';
					$output .= '<option value="">Data Option Not Found</option>';
					$output .= '</select>';				
				}

				echo $output;
			}
		}

		public function GetDataForDependantSelectMenu()
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
				$fieldName = $this->input->post('fieldName');
				$id = $this->input->post('id');
				$idNameAttr = $this->input->post('idNameAttr');
				$selectHeader = $this->input->post('selectHeader');

				$result = $this->$modelName->$methodName($fieldName,$id);

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
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" disable style="width: 99%;">';
					$output .= '<option value="">Data Option Not Found</option>';
					$output .= '</select>';				
				}

				echo $output;
			}
		}
	}
?>