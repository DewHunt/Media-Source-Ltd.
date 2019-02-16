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

			$dataEntryId = $this->NewsEntryModel->CreateDataEntry($dbDate,$batchId,$mediaId,$publicationId,$entryId);

			for ($i=1; $i <= $totalRow; $i++)
			{ 
				$captionNameAttr = "caption-".$i;
				$newsTypeIdNameAttr = "news-type-id-".$i;
				$newsCategoryIdNameAttr = "news-category-id-".$i;
				$pageIdNameAttr = "page-id-".$i;
				$pageNoNameAttr = "page-no-".$i;
				$positionNameAttr = "position-".$i;
				$hueIdNameAttr = "huw-id-".$i;
				$productIdNameAttr = "product-id-".$i;
				$colNameAttr = "col-".$i;
				$inchNameAttr = "inch-".$i;
				$subBrandIdNameAttr = "sub-brand-id-".$i;
				$keywordNameAttr = "keyword-id-".$i;
				$imageNameAttr = "image-".$i;

				$caption = $this->input->post($);
				$newsTypeId = $this->input->post($);
				$newsCategoryId = $this->input->post($);
				$pageId = $this->input->post($);
				$pageNo = $this->input->post($);
				$position = $this->input->post($);
				$hueId = $this->input->post($);
				$productId = $this->input->post($);
				$col = $this->input->post($);
				$inch = $this->input->post($);
				$subBrandId = $this->input->post($);
				$keywordId = $this->input->post($);

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
					$extention = pathinfo($dataEntryImage, PATHINFO_EXTENSION);

					$dbImageName = $mediaId.'_PN_'.$pageId.'_PNO_'.$pageNo.'_POS_'. $position.'_SZ_'. $col * $inch.'_DT_'.date('d-m-Y_').time().'.'.$extension;
					$copyImageName = $config['upload_path'].$dbImageName;

					copy($_FILES[$imageNameAttr]['tmp_name'],$copyImageName);
				}
			}
		}
	}
?>