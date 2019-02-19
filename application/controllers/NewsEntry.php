<?php
	/**
	 * 
	 */
	class NewsEntry extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('HueModel');
			$this->load->model('PlacingModel');
			$this->load->model('PageModel');
			$this->load->model('NewsEntryModel');
			$this->load->model('NewsTypeModel');
			$this->load->model('KeywordModel');
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
					'title' => 'News Entry - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/data_entry/news_entry/news-entry',$data);
			}
		}

		public function NewsEntry($msg = null,$action = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$batchId = $this->NewsEntryModel->GetBatchId()->maxBatchId;

				if ($batchId == "")
				{
					$batchId = 1;
				}

				$data = array(
					'title' => 'Create News - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'batchId' => $batchId
				);

				$this->load->view('admin/data_entry/news_entry/create-news-entry',$data);				
			}
		}

		public function CreateNews()
		{
			$date = explode('/', $this->input->post('date'));

			$dbDate = $date[2]."-".$date[0]."-".$date[1];
			$batchId = $this->input->post('batch-id');
			$mediaId = $this->input->post('media-name-id');
			$publicationId = $this->input->post('publication-id');
			$entryId = $this->GetAdminAllInfo()->Id;

			$totalRow = $this->input->post('sl');

			// $dataEntryId = $this->NewsEntryModel->CreateDataEntry($dbDate,$batchId,$mediaId,$publicationId,$entryId);

			$publicationInfo = $this->NewsEntryModel->GetPublicationInfo($publicationId);

			for ($i=1; $i <= $totalRow; $i++)
			{ 
				$captionNameAttr = "caption-".$i;
				$newsTypeIdNameAttr = "news-type-id-".$i;
				$newsCategoryIdNameAttr = "news-category-id-".$i;
				$pageIdNameAttr = "page-id-".$i;
				$pageNoNameAttr = "page-no-".$i;
				$positionNameAttr = "position-".$i;
				$hueIdNameAttr = "hue-id-".$i;
				$productIdNameAttr = "product-id-".$i;
				$colNameAttr = "col-".$i;
				$inchNameAttr = "inch-".$i;
				$subBrandIdNameAttr = "sub-brand-id-".$i;
				$keywordNameAttr = "keyword-id-".$i;
				$imageNameAttr = "image-".$i;

				// ----------- Start Data Entry Details -----------
				$productId = $this->input->post($productIdNameAttr);
				$caption = $this->input->post($captionNameAttr);
				$newsTypeId = $this->input->post($newsTypeIdNameAttr);
				$newsCategoryId = $this->input->post($newsCategoryIdNameAttr);
				$pageId = $this->input->post($pageIdNameAttr);
				$pageNo = $this->input->post($pageNoNameAttr);
				$position = $this->input->post($positionNameAttr);
				$hueId = $this->input->post($hueIdNameAttr);
				$col = $this->input->post($colNameAttr);
				$inch = $this->input->post($inchNameAttr);
				$subBrandId = $this->input->post($subBrandIdNameAttr);
				$keywordId = $this->input->post($keywordNameAttr);

				// Copy Image and Get Image New Name
				$config['upload_path'] = "images/";
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$this->load->library('upload',$config);

				$dataEntryImage = $_FILES[$imageNameAttr]['name'];

				if ($dataEntryImage == "")
				{
					$dbImageName = "";
				}
				else
				{
					$extension = pathinfo($dataEntryImage, PATHINFO_EXTENSION);

					echo "<br>".$dbImageName = $mediaId.'_PN_'.$pageId.'_PNO_'.$pageNo.'_POS_'. $position.'_SZ_'. $col * $inch.'_DT_'.date('d-m-Y_').time().'.'.$extension;
					$copyImageName = $config['upload_path'].$dbImageName;

					copy($_FILES[$imageNameAttr]['tmp_name'],$copyImageName);
				}
				// ----------- End Data Entry Details -----------

				// ----------- Start Data Entry Report -----------
				$subBrandInfo = $this->NewsEntryModel->GetSubBrandInfo($subBrandId);
				$productInfo = $this->NewsEntryModel->GetProductInfo($productId);
				$priceInfo = $this->NewsEntryModel->GetPriceInfo($mediaId,$publicationId,$col,$inch,$hueId,$pageId);
				$newsTypeInfo = $this->NewsTypeModel->GetNewsTypeById($newsTypeId);
				$keywordInfo = $this->KeywordModel->GetKeywordById($keywordId);

				$mediaName = $publicationInfo->MediaName;
				$publicationName = $publicationInfo->PublicationName;
				$publicationLanguage = $publicationInfo->PublicationLanguage;
				$publicationTypeName = $publicationInfo->TypeName;
				$publicationFrequencyName = $publicationInfo->FrequencyName;
				$publicationPlaceName = $publicationInfo->PlaceName;

				$productName = $productInfo->ProductName;
				$productCategoryName = $productInfo->ProductCategoryName;

				$brandName = $subBrandInfo->BrandName;
				$subBrandName = $subBrandInfo->SubBrandName;				
				$companyName = $subBrandInfo->CompanyName;

				$hueName = $priceInfo->HueName;
				$pageName = $priceInfo->PageName;
				$price = $priceInfo->Price;
				$newsTypeName = $newsTypeInfo->Name;
				$keywordName = $keywordInfo->Name;

				$dataEntryReportResult = $this->NewsEntryModel->CreateDataEntryReport(0,$batchId,$mediaName,$publicationName,$publicationLanguage,$publicationTypeName,$publicationFrequencyName,$publicationPlaceName,$productName,$productCategoryName,$brandName,$subBrandName,$companyName,$caption,$dbDate,$hueName,$position,$pageName,$col,$inch,$price,$pageNo,$newsTypeName,$dbImageName,$keywordName);
				// ----------- End Data Entry Report -----------
			}
		}
	}
?>