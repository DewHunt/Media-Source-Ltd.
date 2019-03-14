<?php
	/**
	 * 
	 */
	class SelectMenu extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdvertiseCategoryModel');
			$this->load->model('BrandModel');
			$this->load->model('CompanyModel');
			$this->load->model('HueModel');
			$this->load->model('KeywordModel');
			$this->load->model('SubBrandModel');
			$this->load->model('MediaNameModel');
			$this->load->model('NewsTypeModel');
			$this->load->model('NewsCategoryModel');
			$this->load->model('PageModel');
			$this->load->model('ProductModel');
			$this->load->model('ProductCategoryModel');
			$this->load->model('PublicationModel');
			$this->load->model('PublicationTypeModel');
			$this->load->model('PublicationPlaceModel');
			$this->load->model('PublicationFrequencyModel');
			$this->load->model('PriceModel');
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
				$selectId = $this->input->post('selectId');

				$result = $this->$modelName->$methodName();

				if ($result)
				{
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
					$output .= '<option value="0">'.$selectHeader.'</option>';
					foreach ($result as $value)
					{
						if ($selectId == $value->Id)
						{
							$output .= '<option value="'.$value->Id.'" selected>'.$value->Name.'</option>';
						}
						else
						{
							$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
						}
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
				$selectId = $this->input->post('selectId');

				if ($id == 0)
				{
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
					$output .= '<option value="0">'.$selectHeader.'</option>';
					$output .= '</select>';
				}
				else
				{
					$result = $this->$modelName->$methodName($fieldName,$id);

					if ($result)
					{
						$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
						$output .= '<option value="0">'.$selectHeader.'</option>';
						foreach ($result as $value)
						{
							if ($selectId == $value->Id)
							{
								$output .= '<option value="'.$value->Id.'" selected>'.$value->Name.'</option>';
							}
							else
							{
								$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
							}
						}
						$output .= '</select>';
					}
					else
					{
						$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" disable style="width: 99%;">';
						$output .= '<option value="">Data Option Not Found</option>';
						$output .= '</select>';				
					}
				}

				echo $output;
			}
		}

		public function GetDataForDoubleDependantSelectMenu()
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
				$fieldName1 = $this->input->post('fieldName1');
				$id1 = $this->input->post('id1');
				$fieldName2 = $this->input->post('fieldName2');
				$id2 = $this->input->post('id2');
				$idNameAttr = $this->input->post('idNameAttr');
				$selectHeader = $this->input->post('selectHeader');
				$selectId = $this->input->post('selectId');

				if ($id1 == 0 && $id2 == 0)
				{
					$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
					$output .= '<option value="0">'.$selectHeader.'</option>';
					$output .= '</select>';
				}
				else
				{
					$result = $this->$modelName->$methodName($fieldName1,$id1,$fieldName2,$id2);

					if ($result)
					{
						$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" style="width: 99%;">';
						$output .= '<option value="0">'.$selectHeader.'</option>';
						foreach ($result as $value)
						{
							if ($selectId == $value->Id)
							{
								$output .= '<option value="'.$value->Id.'" selected>'.$value->Name.'</option>';
							}
							else
							{
								$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
							}
						}
						$output .= '</select>';
					}
					else
					{
						$output .= '<select class="dropdown" name="'.$idNameAttr.'" id="'.$idNameAttr.'" disable style="width: 99%;">';
						$output .= '<option value="">Data Option Not Found</option>';
						$output .= '</select>';				
					}
				}

				echo $output;
			}
		}
	}
?>