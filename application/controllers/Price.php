<?php
	/**
	 * 
	 */
	class Price extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('MediaNameModel');
			$this->load->model('PublicationModel');
			$this->load->model('DayModel');
			$this->load->model('PageModel');
			$this->load->model('HueModel');
			$this->load->model('PriceModel');
			$this->load->model('DataTableModel');
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
					'title' => 'Price - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/page/Price',$data);
			}
		}

		public function Price($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Price - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/page/create-price',$data);				
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

		public function CreatePrice()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$priceMediaName = $this->input->post('price-media-name');
				$mediaId = $this->input->post('media-name-id');
				$publicationId = $this->input->post('publication-id');
				$day = $this->input->post('day');
				$entryId = $this->GetAdminAllInfo()->Id;
				$totalRow = $this->input->post('sl');

				$priceId = $this->PriceModel->CreatePrice($priceMediaName,$mediaId,$publicationId,$day,$entryId);

				for ($i=1; $i <= $totalRow; $i++)
				{ 
					$priceTitleNameAttr = "price-title-".$i;
					$pageIdNameAttr = "page-id-".$i;
					$hueIdNameAttr = "hue-id-".$i;
					$colNameAttr = "col-".$i;
					$inchNameAttr = "inch-".$i;
					$priceNameAttr = "price-".$i;
					$priceDescriptionNameAttr = "price-description-".$i;

					$priceTitle = $this->input->post($priceTitleNameAttr);
					$pageId = $this->input->post($pageIdNameAttr);
					$hueId = $this->input->post($hueIdNameAttr);
					$col = $this->input->post($colNameAttr);
					$inch = $this->input->post($inchNameAttr);
					$price = $this->input->post($priceNameAttr);
					$priceDescription = $this->input->post($priceDescriptionNameAttr);

					$result = $this->PriceModel->CreatePriceDetails($priceId,$priceTitle,$hueId,$pageId,$price,$col,$inch,$priceDescription,$entryId);
				}

				if ($result)
				{
					return redirect('Price/Price/1');
				}
				else
				{
					return redirect('Price/Price/2');
				}
			}
		}

		public function GetPriceAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-price";
				$table = "pricedetails";
				$selectColumn = array("Id","PriceId","Name","Hue","PageNoId","Price","Col","Inch","Description");
				$orderColumn = array("Id","Name","PriceId",null,null,null,null,null,null,null,null);

				$priceInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($priceInfo as $value)
				{
					$price = array();
					$price[] = $sl;
					$price[] = $value->Name;

					$priceInfo = $this->PriceModel->GetPriceById($value->PriceId);

					$price[] = $this->MediaNameModel->GetMediaNameById($priceInfo->MediaId)->Name;
					$price[] = $this->PublicationModel->GetPublicationById($priceInfo->PublicationId)->Name;
					// $price[] = $priceInfo->PublicationId;

					$price[] = $this->PageModel->GetPageById($value->PageNoId)->Name;
					$price[] = $this->HueModel->GetHueById($value->Hue)->Name;
					$price[] = $value->Price;
					$price[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $price;
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

		public function GetPriceDetailsById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$priceDetailsId = $this->input->post('priceDetailsId');

				$data = $this->PriceModel->GetPriceDetailsById($priceDetailsId);

				$output['priceDetailsId'] = $data->Id;
				$output['priceId'] = $data->PriceId;
				$output['priceTitle'] = $data->Name;
				$output['hueId'] = $data->Hue;
				$output['pageId'] = $data->PageNoId;
				$output['price'] = $data->Price;
				$output['col'] = $data->Col;
				$output['inch'] = $data->Inch;
				$output['priceDescription'] = $data->Description;

				// $priceDetailsInfo = $this->PriceModel->GetPriceDetailsById($data->PriceId);

				// $output['mediaId'] = $priceDetailsInfo->MediaId;
				// $output['publicationId'] = $data->PublicationId;
				// $output['dayId'] = $data->DayId;

				echo json_encode($output);
			}
		}
	}
?>