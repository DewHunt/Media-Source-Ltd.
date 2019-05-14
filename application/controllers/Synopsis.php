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
			$this->load->model('DataTableModel');
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
					return redirect('Synopsis/ShowSynopsis');
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

		public function GetSynopsisByOperatorAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-synopsis-by-operator";
				$table = "synopsisbyoperator";
				$selectColumn = array("Id","Title","Content","Reference");
				$orderColumn = array("Id","Title",null,null);

				$synopsisInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($synopsisInfo as $value)
				{
					$synopsisByOperator = array();
					$synopsisByOperator[] = $sl;

					if ($value->Title == "")
					{
						$synopsisByOperator[] = "Data Not Found";
					}
					else
					{
						$synopsisByOperator[] = $value->Title;
					}

					if ($value->Content == "")
					{
						$synopsisByOperator[] = "Data Not Found";
					}
					else
					{
						$synopsisByOperator[] = $value->Content;
					}

					if ($value->Reference == "")
					{
						$synopsisByOperator[] = "Data Not Found";
					}
					else
					{
						$synopsisByOperator[] = $value->Reference;
					}

					$link = base_url('index.php/Synopsis/ViewSynopsisByOperator/_/'.$value->Id);
					
					$synopsisByOperator[] = '<a type="button" name="view" id="view" class="btn btn-warning btn-xs" href="'.$link.'">View</a> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $synopsisByOperator;
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

		public function ViewSynopsisByOperator($msg = NULL, $id = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$synopsisByOperatorInfo = $this->SynopsisModel->SynopsisByOperatorInfoById($id);
				$synopsisInfo = $this->SynopsisModel->SynopsisInfoByForeignId($synopsisByOperatorInfo->Id);
				$data = array(
					'title' => 'Synopsis - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'synopsisByOperatorInfo' => $synopsisByOperatorInfo,
					'synopsisInfo' => $synopsisInfo,
					'message' => $msg,
					'active' => 2
				);

				$this->load->view('admin/synopsis/view-synopsis-by-operator',$data);
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
		 			$synopsisTitle = $this->input->Post('synopsis-title');
		 			$synopsisContent = $this->input->post('synopsis-content');
		 			$synopsisReference = $this->input->post('synopsis-reference');

		 			$entryId = $this->GetAdminAllInfo()->Id;

		 			$synopsisByOperatorId = $this->SynopsisModel->SendSynopsisByOperator($synopsisTitle,$synopsisContent,$synopsisReference,$entryId);

		 			for($i=0;$i<$_POST['allvalue'];$i++)
		 			{
		 				if(isset($_POST['chk_'.$i]))
		 				{
		 					$dataEntryReportId = $_POST['chk_'.$i];

		 					$result = $this->SynopsisModel->SendSynopsis($synopsisByOperatorId,$dataEntryReportId,$entryId);
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

		public function ShowSynopsis($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$result = $this->SynopsisModel->ShowSynopsis();

				if ($result)
				{
					$data = array(
						'title' => 'Synopsis - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '1',
						'result' => $result,
						'message' => $msg,
						'active' => 6
					);

					$this->load->view('admin/synopsis/synopsis',$data);
				}
				else
				{
					$data = array(
						'title' => 'Synopsis - Media Source Ltd.',
						'adminInfo' => $this->GetAdminAllInfo(),
						'show' => '2',
						'message' => $msg,
						'active' => 6
					);

					$this->load->view('admin/synopsis/synopsis',$data);					
				}
			}
		}

		public function CreateSynopsis($msg = NULL, $id = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$synopsisByOperatorInfo = $this->SynopsisModel->SynopsisByOperatorInfoById($id);
				$synopsisInfo = $this->SynopsisModel->SynopsisInfoByForeignId($id);

				$data = array(
					'title' => 'Create Synopsis - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'show' => '1',
					'synopsisByOperatorInfo' => $synopsisByOperatorInfo,
					'synopsisInfo' => $synopsisInfo,
					'message' => $msg,
					'synopsisByOperatorId' => $id,
					'active' => 6
				);
				$this->load->view('admin/synopsis/create-synopsis',$data);
			}
		}

		public function CreateSynopsisAction()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$synopsisTitle = $this->input->post('editor-synopsis-title');
				$synopsis = $this->input->post('editor-synopsis');
				$synopsisByOperatorId = $this->input->post('synopsis-by-operator-id');

				$entryId = $this->GetAdminAllInfo()->Id;

				$result = $this->SynopsisModel->CreateSynopsis($synopsisTitle,$synopsis,$synopsisByOperatorId,$entryId);

				if ($result)
				{
					return redirect('Synopsis/AllCompletedSynopsis/1');
				}
				else
				{
					return redirect('Synopsis/CreateSynopsis/2/',$synopsisByOperatorId);
				}
			}			
		}

		public function AllCompletedSynopsis($msg = NULL)
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
					'active' => 8
				);

				$this->load->view('admin/synopsis/all-completed-synopsis',$data);
			}			
		}

		public function GetSynopsisDetailsAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-synopsis-details";
				$table = "synopsisdetails";
				$selectColumn = array("Id","NewsTitle","ContentDetails");
				$orderColumn = array("Id","NewsTitle",null,null);

				$synopsisDetailsInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($synopsisDetailsInfo as $value)
				{
					$synopsisDetails = array();
					$synopsisDetails[] = $sl;

					if ($value->NewsTitle == "")
					{
						$synopsisDetails[] = "Data Not Found";
					}
					else
					{
						$synopsisDetails[] = $value->NewsTitle;
					}

					if ($value->ContentDetails == "")
					{
						$synopsisDetails[] = "Data Not Found";
					}
					else
					{
						$synopsisDetails[] = $value->ContentDetails;
					}
					
					$synopsisDetails[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $synopsisDetails;
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
	}
?>