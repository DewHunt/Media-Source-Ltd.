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
			$this->load->model('SynopsisModel');
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

				$designation = $this->GetAdminAllInfo()->DesignationId;

				if ($designation == "Operator") 
				{
					return redirect('Synopsis/OperatorSynopsis');
				}

				if ($designation == "Editor")
				{
					$this->load->view('admin/synopsis/synopsis',$data);
				}
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

		public function SearchNews($msg = NULL)
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

				$referenceId = $this->SynopsisModel->GetReferenceId()->maxReferenceId;

				if ($referenceId == "")
				{
					$referenceId = 1;
				}

				if ($result)
				{
					$data = array(
						'title' => 'Synopsis - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '1',
						'fromDate' => $fromDate,
						'toDate' => $toDate,
						'mediaName' => $mediaName,
						'publicationName' => $publicationName,
						'brandName' => $brandName,
						'productName' => $productName,
						'keywordName' => $keywordName,
						'referenceId' => $referenceId,
						'result' => $result,
						'message' => $msg,
						'active' => 2
					);

					$this->load->view('admin/synopsis/operator-synopsis',$data);
				}
				else
				{
					$data = array(
						'title' => 'Synopsis - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '2',
						'message' => $msg,
						'active' => 2
					);

					$this->load->view('admin/synopsis/operator-synopsis',$data);					
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
		 					$dataEntryReportId = $_POST['chk_'.$i];
		 					$synopsisTitle = $this->input->Post('synopsis-title');
		 					$synopsisContent = $this->input->post('synopsis-content');
		 					$synopsisReferenceId = $this->input->post('synopsis-reference-id');

		 					$entryId = $this->GetAdminAllInfo()->Id;

		 					// echo "Data Entry Id = ".$dataEntryReportId."<br>Title = ".$synopsisTitle."<br>Content = ".$synopsisContent."<br>Reference Id = ".$synopsisReferenceId."<br>------------------------------------------------------<br>";

		 					$result = $this->SynopsisModel->SendSynopsis($dataEntryReportId,$synopsisTitle,$synopsisContent,$synopsisReferenceId,$entryId);
		 				}
		 			}

		 			if ($result)
		 			{
		 				return redirect('Synopsis/OperatorSynopsis/1');
		 			}
		 			else
		 			{
		 				return redirect('Synopsi/OperatorSynopsis/2');
		 			}
		 		}
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