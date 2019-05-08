<?php
	/**
	 * 
	 */
	class Synopsis extends CI_Controller
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

		public function Index($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Synopsis - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 6
				);

				$this->load->view('admin/synopsis/synopsis',$data);
			}
		}

		public function OperatorSynopsis($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Synopsis - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 6,
					'show' => 0
				);

				$this->load->view('admin/synopsis/operator-synopsis',$data);
			}

		}

		public function SearchNews()
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
						'fromDate' => $fromDate,
						'toDate' => $toDate,
						'mediaName' => $mediaName,
						'publicationName' => $publicationName,
						'brandName' => $brandName,
						'productName' => $productName,
						'keywordName' => $keywordName,
						'result' => $result,
						'active' => 2
					);

					$this->load->view('admin/synopsis/operator-synopsis',$data);
				}
				else
				{
					$data = array(
						'title' => 'News Reports - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '2',
						'active' => 2
					);

					$this->load->view('admin/reports/news_reports/news-reports',$data);					
				}
			}			
		}

		public function SendSynopsis()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{ 
		 		if(isset($_POST['allvalue']) )
		 		{ 
		 			for($i=0;$i<$_POST['allvalue'];$i++)
		 			{
		 				if(isset($_POST['chk_'.$i]))
		 				{
		 					echo "Loop No = ".$i.";".$_POST['chk_'.$i]."<br>";
		 					// $this->company_model->deleteInfo($_POST['chk_'.$i]);
		 				}
		 			}
		 		} 
				// $allValue = $this->input->post('allvalue'); 
				// for($i=0;$i<$allValue;$i++)
				// {
	 		// 			// echo $_POST['chk_'.$i];
	 		// 		if(isset($_POST['chk_'.$i]))
	 		// 		{
	 		// 			echo $_POST['chk_'.$i]."<br>";
	 		// 			// $this->company_model->deleteInfo($_POST['chk_'.$i]);
	 		// 		}
				// }
			}			
		}

		public function CreateSynopsis()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				echo "This is Create Synopsis Function";
			}
		}
	}
?>