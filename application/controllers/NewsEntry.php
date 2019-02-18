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

			echo "<br><br>Media Name = ".$publicationInfo->MediaName;
			echo "<br>Publication Name = ".$publicationInfo->PublicationName;
			echo "<br>Publication Language = ".$publicationInfo->PublicationLanguage;
			echo "<br>Publication Type = ".$publicationInfo->TypeName;
			echo "<br>Publication Frequency = ".$publicationInfo->FrequencyName;
			echo "<br>Publication Place = ".$publicationInfo->PlaceName;

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

				$caption = $this->input->post($captionNameAttr);
				$newsTypeId = $this->input->post($newsTypeIdNameAttr);
				$newsCategoryId = $this->input->post($newsCategoryIdNameAttr);
				$pageId = $this->input->post($pageIdNameAttr);
				$pageNo = $this->input->post($pageNoNameAttr);
				$position = $this->input->post($positionNameAttr);
				$hueId = $this->input->post($hueIdNameAttr);
				$productId = $this->input->post($productIdNameAttr);
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

				$subBrandInfo = $this->NewsEntryModel->GetSubBrandInfo($subBrandId);

				echo "<br><br>Company Name = ".$subBrandInfo->CompanyName;
				echo "<br>Brand Name = ".$subBrandInfo->BrandName;
				echo "<br>Sub Brand Name = ".$subBrandInfo->SubBrandName;

				$productInfo = $this->NewsEntryModel->GetProductInfo($productId);

				echo "<br><br>Product Name = ".$productInfo->ProductName;
				echo "<br>Product Category Name = ".$productInfo->ProductCategoryName;

				$priceInfo = $this->NewsEntryModel->GetPriceInfo($mediaId,$publicationId,$col,$inch,$hueId,$pageId);

				echo "<br><br>Price = ".$priceInfo->Price;
				echo "<br><br>Hue = ".$priceInfo->HueName;
				echo "<br><br>Page Name = ".$priceInfo->PageName;
				echo "<br><br>----------------------------------------------------------";
			}
		}
	}
?>