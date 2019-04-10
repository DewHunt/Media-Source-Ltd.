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
			$this->load->model('ProductModel');
			$this->load->model('SubBrandModel');
			$this->load->model('PageModel');
			$this->load->model('NewsTypeModel');
			$this->load->model('NewsCategoryModel');
			$this->load->model('KeywordModel');
			$this->load->model('DataTableModel');
			$this->load->model('MediaNameModel');
			$this->load->model('NewsEntryModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
		}

		public function Index($msg = null, $active = null)
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
					'message' => $msg,
					'active' => 2
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

			$dataEntryId = $this->NewsEntryModel->CreateDataEntry($dbDate,$batchId,$mediaId,$publicationId,$entryId);

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
				$hueId = $this->input->post($hueIdNameAttr);
				$keywordId = $this->input->post($keywordNameAttr);
				$subBrandId = $this->input->post($subBrandIdNameAttr);
				$positionName = $this->input->post($positionNameAttr);
				$pageId = $this->input->post($pageIdNameAttr);
				$col = $this->input->post($colNameAttr);
				$inch = $this->input->post($inchNameAttr);
				$pageNo = $this->input->post($pageNoNameAttr);
				$newsTypeId = $this->input->post($newsTypeIdNameAttr);
				$newsCategoryId = $this->input->post($newsCategoryIdNameAttr);

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

					$dbImageName = $mediaId.'_PN_'.$pageId.'_PNO_'.$pageNo.'_POS_'. $positionName.'_SZ_'. $col * $inch.'_DT_'.date('d-m-Y_').time().'.'.$extension;
					$copyImageName = $config['upload_path'].$dbImageName;

					copy($_FILES[$imageNameAttr]['tmp_name'],$copyImageName);
				}

				$dataEntryDetailsResult = $this->NewsEntryModel->CreateDataEntryDetails($dataEntryId,$productId,$caption,$hueId,$keywordId,$subBrandId,$positionName,$pageId,$col,$inch,$pageNo,$newsTypeId,$dbImageName,$entryId,$newsCategoryId);
				// ----------- End Data Entry Details -----------

				// ----------- Start Data Entry Report -----------
				$subBrandInfo = $this->NewsEntryModel->GetSubBrandInfo($subBrandId);
				$productInfo = $this->NewsEntryModel->GetProductInfo($productId);
				$priceInfo = $this->NewsEntryModel->GetPriceInfo($mediaId,$publicationId,$col,$inch,$hueId,$pageId);
				$newsTypeInfo = $this->NewsTypeModel->GetNewsTypeById($newsTypeId);
				$newsCategoryInfo = $this->NewsCategoryModel->GetNewsCategoryById($newsCategoryId);
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
				$newsCategoryName = $newsCategoryInfo->Name;

				$dataEntryReportResult = $this->NewsEntryModel->CreateDataEntryReport($dataEntryId,$batchId,$mediaName,$publicationName,$publicationLanguage,$publicationTypeName,$publicationFrequencyName,$publicationPlaceName,$productName,$productCategoryName,$brandName,$subBrandName,$companyName,$caption,$dbDate,$hueName,$positionName,$pageName,$col,$inch,$price,$pageNo,$newsTypeName,$dbImageName,$keywordName,$entryId,$newsCategoryName);
				// ----------- End Data Entry Report -----------
			}

			if ($dataEntryReportResult)
			{
				return redirect('NewsEntry/NewsEntry/1');
			}
			else
			{
				return redirect('NewsEntry/NewsEntry/2');
			}
		}

		public function GetNewsEntryAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-news-entry";
				$table = "dataentrydetails";
				$selectColumn = array("Id","DataentryId","Caption","Image");
				$orderColumn = array("Id","DataentryId","Caption","Image",null);

				$priceInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();
				$previousDataEntryId = 0;

				foreach ($priceInfo as $value)
				{
					if ($previousDataEntryId != $value->DataentryId)
					{
						$dataEntryInfo = $this->NewsEntryModel->GetDataEntryById($value->DataentryId);
						$previousDataEntryId = $value->DataentryId;
					}

					$newsEntry = array();
					$newsEntry[] = $sl;

					if ($dataEntryInfo->BatchId == "")
					{
						$newsEntry[] = 'Data Not Found';
					}
					else
					{
						$newsEntry[] = $dataEntryInfo->BatchId;
					}

					if ($dataEntryInfo->Date == "" )
					{
						$newsEntry[] = 'Data Not Found';
					}
					else
					{
						$newsEntry[] = $dataEntryInfo->Date;
					}

					if ($dataEntryInfo->MediaId == "" || $dataEntryInfo->MediaId == 0)
					{
						$newsEntry[] = 'Data Not Found';
					}
					else
					{
						$mediaName = $this->MediaNameModel->GetMediaNameById($dataEntryInfo->MediaId);

						if ($mediaName)
						{
							$newsEntry[] = $mediaName->Name;
						}
						else
						{
							$newsEntry[] = 'Data Not Found';
						}
					}

					if ($value->Caption == "" )
					{
						$newsEntry[] = 'Data Not Found';
					}
					else
					{
						$newsEntry[] = $value->Caption;
					}

					if ($value->Image == "")
					{
						$newsEntry[] = 'Image Not Found';
					}
					else
					{
						$newsEntry[] = '<img src="'.base_url("images/").$value->Image.'" width="50px" height="50px">';
					}

					$newsEntry[] = '<a href="'.base_url('index.php/NewsEntry/Update/_/'.$value->DataentryId).'"><button class="btn btn-warning btn-xs">Update</button></a> <button type="button" name="delete" id="'.$value->DataentryId.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $newsEntry;
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
				$dataEntryId = $id;

				$data = array(
					'title' => 'Update News Entry - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'dataEntryInfo' => $this->NewsEntryModel->GetDataEntryById($dataEntryId),
					'dataEntryDetailsInfo' => $this->NewsEntryModel->GetDataEntryDetailsById($dataEntryId)
				);

				$this->load->view('admin/data_entry/news_entry/update-news-entry',$data);				
			}
		}

		public function UpdateNews()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$dataEntryId = $this->input->post('date-entry-id');

				$date = explode('/', $this->input->post('date'));

				$dbDate = $date[2]."-".$date[0]."-".$date[1];
				$batchId = $this->input->post('batch-id');
				$mediaId = $this->input->post('media-name-id');
				$publicationId = $this->input->post('publication-id');
				$updateId = $this->GetAdminAllInfo()->Id;

				$totalRow = $this->input->post('sl');

				$updateDataEntry = $this->NewsEntryModel->UpdateDataEntry($dataEntryId,$batchId,$mediaId,$publicationId,$dbDate,$updateId);

				$deleteDataEntryDetails = $this->NewsEntryModel->DeleteDataEntryDetails($dataEntryId);
				$deleteDataEntryReports = $this->NewsEntryModel->DeleteDataEntryReports($dataEntryId);

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
					$hueId = $this->input->post($hueIdNameAttr);
					$keywordId = $this->input->post($keywordNameAttr);
					$subBrandId = $this->input->post($subBrandIdNameAttr);
					$positionName = $this->input->post($positionNameAttr);
					$pageId = $this->input->post($pageIdNameAttr);
					$col = $this->input->post($colNameAttr);
					$inch = $this->input->post($inchNameAttr);
					$pageNo = $this->input->post($pageNoNameAttr);
					$newsTypeId = $this->input->post($newsTypeIdNameAttr);
					$newsCategoryId = $this->input->post($newsCategoryIdNameAttr);

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					$dataEntryImage = $_FILES[$imageNameAttr]['name'];

					if ($dataEntryImage == "")
					{
						$previousimageNameAttr = "previous-image-".$i;
						$dbImageName = $this->input->post($previousimageNameAttr);
					}
					else
					{
						$extension = pathinfo($dataEntryImage, PATHINFO_EXTENSION);

						$dbImageName = $mediaId.'_PN_'.$pageId.'_PNO_'.$pageNo.'_POS_'. $positionName.'_SZ_'. $col * $inch.'_DT_'.date('d-m-Y_').time().'.'.$extension;
						$copyImageName = $config['upload_path'].$dbImageName;

						copy($_FILES[$imageNameAttr]['tmp_name'],$copyImageName);
					}

					$dataEntryDetailsResult = $this->NewsEntryModel->UpdateDataEntryDetails($dataEntryId,$productId,$caption,$hueId,$keywordId,$subBrandId,$positionName,$pageId,$col,$inch,$pageNo,$newsTypeId,$dbImageName,$updateId,$newsCategoryId);
					// ----------- End Data Entry Details -----------

					// ----------- Start Data Entry Report -----------
					$subBrandInfo = $this->NewsEntryModel->GetSubBrandInfo($subBrandId);
					$productInfo = $this->NewsEntryModel->GetProductInfo($productId);
					$priceInfo = $this->NewsEntryModel->GetPriceInfo($mediaId,$publicationId,$col,$inch,$hueId,$pageId);
					$newsTypeInfo = $this->NewsTypeModel->GetNewsTypeById($newsTypeId);
					$newsCategoryInfo = $this->NewsCategoryModel->GetNewsCategoryById($newsCategoryId);
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
					$newsCategoryName = $newsCategoryInfo->Name;

					$dataEntryReportResult = $this->NewsEntryModel->UpdateDataEntryReport($dataEntryId,$batchId,$mediaName,$publicationName,$publicationLanguage,$publicationTypeName,$publicationFrequencyName,$publicationPlaceName,$productName,$productCategoryName,$brandName,$subBrandName,$companyName,$caption,$dbDate,$hueName,$positionName,$pageName,$col,$inch,$price,$pageNo,$newsTypeName,$dbImageName,$keywordName,$updateId,$newsCategoryName);
					// ----------- End Data Entry Report -----------
				}

				if ($dataEntryReportResult)
				{
					return redirect('NewsEntry/Index/1');
				}
				else
				{
					return redirect('NewsEntry/Update/2/'.$dataEntryId);
				}				
			}			
		}

		public function DeleteNewsEntry()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$dataEntryId = $this->input->post('dataEntryId');

				$deleteNewsEntry = $this->NewsEntryModel->DeleteDataEntry($dataEntryId);
				$deleteNewsEntryDetails = $this->NewsEntryModel->DeleteDataEntryDetails($dataEntryId);
				$deleteNewsEntryReport = $this->NewsEntryModel->DeleteDataEntryReports($dataEntryId);

				if ($deleteNewsEntryReport)
				{
					echo "News Entry Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting News Entry";
				}
			}
		}
	}
?>