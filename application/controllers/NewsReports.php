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
						'fromDate' => $fromDate,
						'toDate' => $toDate,
						'mediaName' => $mediaName,
						'publicationName' => $publicationName,
						'brandName' => $brandName,
						'productName' => $productName,
						'keywordName' => $keywordName,
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
			$fromDate = $this->input->post('from-date');
			$toDate = $this->input->post('to-date');
			$mediaName = $this->input->post('media-name');
			$publicationName = $this->input->post('publication-name');
			$brandName = $this->input->post('brand-name');
			$productName = $this->input->post('product-name');
			$keywordName = $this->input->post('kyeword-name');

			$result = $this->NewsReportsModel->SearchNewsReports($fromDate, $toDate, $mediaName, $publicationName, $brandName, $productName, $keywordName);
			
			$this->load->library('excel');

			// Generate Excel Report Start Here

			$object = new PHPExcel();

			$object->setActiveSheetIndex(0);

			$table_columns = array('Date','Media Name','Publication Name','Publication Type','Publication Place','Publication Frequency','Publication Language','Brand','subBrand','Company','Product Category','Product','Caption','News Type','News Category','Page Number','Page','Position','Hue','Column','Inche','Column X Inch','Cost(BDT)','PR Values (BDT)','Keywords');
			$column = 0;

			foreach ($table_columns as $field)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
				$column++;
			}

			// $Date =$this->common_model->dateformat($Date);
			// $Date1=$this->common_model->dateformat($Date1) ;
			// $data['all_info'] = $this->newsreport_model->get_all_query_row($Date,$Date1,$MediaId,$PublicationId,$BrandName,$ProductName,$Keyword);

			// print_r($data['all_info']);
			// exit();

			$excel_row = 2;

			foreach ($result as $element)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$element->Date);
				$object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$element->MediaId);
				$object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$element->PublicationName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$element->PublicationType);
				$object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$element->PublicationPlace);
				$object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$element->PublicationFreq);
				$object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$element->PublicationLan);
				$object->getActiveSheet()->setCellValueByColumnAndRow(7,$excel_row,$element->BrandName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(8,$excel_row,$element->subBrand);
				$object->getActiveSheet()->setCellValueByColumnAndRow(9,$excel_row,$element->Company);
				$object->getActiveSheet()->setCellValueByColumnAndRow(10,$excel_row,$element->ProductName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(11,$excel_row,$element->ProductCatName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(12,$excel_row,$element->Caption);
				$object->getActiveSheet()->setCellValueByColumnAndRow(13,$excel_row,$element->NewstypeName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(14,$excel_row,$element->outlook);
				$object->getActiveSheet()->setCellValueByColumnAndRow(15,$excel_row,$element->PageNo);
				$object->getActiveSheet()->setCellValueByColumnAndRow(16,$excel_row,$element->PageId);
				$object->getActiveSheet()->setCellValueByColumnAndRow(17,$excel_row,$element->PositionName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(18,$excel_row,$element->HueName);
				$object->getActiveSheet()->setCellValueByColumnAndRow(19,$excel_row,$element->Cols);
				$object->getActiveSheet()->setCellValueByColumnAndRow(20,$excel_row,$element->Inchs);
				$object->getActiveSheet()->setCellValueByColumnAndRow(21,$excel_row,$element->Cols * $element->Inchs);
				$object->getActiveSheet()->setCellValueByColumnAndRow(22,$excel_row,$element->Price * $element->Cols * $element->Inchs);
				$object->getActiveSheet()->setCellValueByColumnAndRow(23,$excel_row,$element->Price * $element->Cols * $element->Inchs * 3);
				$object->getActiveSheet()->setCellValueByColumnAndRow(24,$excel_row,$element->Keyword);

				$excel_row++;
			}

			$object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
			header('Content-type: application/vnd.ms-excel');

			$file_names = 'expoert_'.date("d/m/Y/H/i/s");
			header('content-disposition: attachment;filename='.$file_names.'.xls');

        // header('Cache-Control: max-age=0');
			$object_writer->save('php://output');


		}
	}
?>
