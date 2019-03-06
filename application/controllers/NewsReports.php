<?php
	/**
	 * 
	 */
	class NewsReports extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('MediaNameModel');
			$this->load->model('PublicationModel');
			$this->load->model('BrandModel');
			$this->load->model('ProductModel');
			$this->load->model('KeywordModel');
			$this->load->model('NewsReportsModel');
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
					'title' => 'News Reports - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'show' => '0'
				);

				$this->load->view('admin/news_reports/news-reports',$data);
			}
		}

		public function SearchNewsReports()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				if (empty($_POST['from-date']))
				{
					$fromDate = "";
				}
				else
				{
					$fromDate =  $this->input->post('from-date');
				}

				if (empty($_POST['to-date']))
				{
					$toDate = "";
				}
				else
				{
					$toDate = $this->input->post('to-date');
				}

				if (empty($_POST['media-name-id']))
				{
					$mediaName = "";
				}
				else
				{
					$mediaId = $this->input->post('media-name-id');
					$mediaName = $this->MediaNameModel->GetMediaNameById($mediaId)->Name;
				}

				if (empty($_POST['publication-id']))
				{
					$publicationName = "";
				}
				else
				{
					$publicationId = $this->input->post('publication-id');
					$publicationName = $this->PublicationModel->GetPublicationById($publicationId)->Name;
				}

				if (empty($_POST['brand-id']))
				{
					$brandName = "";
				}
				else
				{
					$brandId = $this->input->post('brand-id');
					$brandName = $this->BrandModel->GetBrandById($brandId)->Name;
				}

				if (empty($_POST['product-id']))
				{
					$productName = "";
				}
				else
				{
					$productId = $this->input->post('product-id');
					$productName = $this->ProductModel->GetProductById($productId)->Name;
				}

				if (empty($_POST['keyword-id']))
				{
					$keywordName = "";
				}
				else
				{
					$keywordId = $this->input->post('keyword-id');
					$keywordName = $this->KeywordModel->GetKeywordById($keywordId)->Name;
				}

				$result = $this->NewsReportsModel->SearchNewsReports($fromDate, $toDate, $mediaName, $publicationName, $brandName, $productName, $keywordName);

				if ($result)
				{
					$data = array(
						'title' => 'News Reports - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '1',
						'result' => $result
					);

					$this->load->view('admin/news_reports/news-reports',$data);
				}
				else
				{
					$data = array(
						'title' => 'News Reports - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '2',
					);

					$this->load->view('admin/news_reports/news-reports',$data);					
				}
			}			
		}

		public function CreateExcel()
		{
			echo "This Is Create Excel Function";
		}
	}
?>