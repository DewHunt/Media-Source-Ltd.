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

		public function Index($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Price - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/page/price',$data);
			}
		}

		public function Price($msg = null,$action = null)
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
					$price[] = '<a href="'.base_url('index.php/Price/Update/_/'.$value->PriceId).'"><button class="btn btn-warning btn-xs">Update</button></a> <button type="button" name="delete" id="'.$value->PriceId.'" class="btn btn-danger btn-xs delete">Delete</button>';
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

		public function Update($msg = null,$id = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$priceId = $id;

				$data = array(
					'title' => 'Update Price - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'priceInfo' => $this->PriceModel->GetPriceById($priceId),
					'priceDetailsInfo' => $this->PriceModel->GetPriceDetailsById($priceId)
				);

				$this->load->view('admin/system_setup/page/update-price',$data);				
			}
		}

		public function UpdatePrice()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$priceId = $this->input->post('price-id');

				$priceMediaName = $this->input->post('price-media-name');
				$mediaId = $this->input->post('media-name-id');
				$publicationId = $this->input->post('publication-id');
				$day = $this->input->post('day');
				$updateId = $this->GetAdminAllInfo()->Id;
				$totalRow = $this->input->post('sl');

				$updatePrice = $this->PriceModel->UpdatePrice($priceId,$priceMediaName,$mediaId,$publicationId,$day,$updateId);

				$deletePriceDetails = $this->PriceModel->DeletePriceDetails($priceId);

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

					$result = $this->PriceModel->UpdatePriceDetails($priceId,$priceTitle,$hueId,$pageId,$price,$col,$inch,$priceDescription,$updateId);
				}

				if ($result)
				{
					return redirect('Price/Index/1');
				}
				else
				{
					return redirect('Price/Update/2/$priceId');
				}
			}
		}

		public function DeletePriceDetails()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$priceId = $this->input->post('priceId');

				$deletePrice = $this->PriceModel->DeletePrice($priceId);
				$deletePriceDetails = $this->PriceModel->DeletePriceDetails($priceId);

				if ($deletePriceDetails)
				{
					echo "Price Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Price";
				}
			}
		}
	}
?>