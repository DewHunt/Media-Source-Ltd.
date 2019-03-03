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
					'message' => $msg
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
				$fromDate = explode('/', $this->input->post('fromDate'));
				$toDate = explode('/', $this->input->post('toDate'));
				$searchFromDate = $fromDate[2]."-".$fromDate[0]."-".$fromDate[1];
				$searchToDate = $toDate[2]."-".$toDate[0]."-".$toDate[1];

				$mediaId = $this->input->post('media-name-id');
				$publicationId = $this->input->post('publication-id');

				$mediaName = $this->MediaNameModel->GetMediaNameById($mediaId)->Name;
				$publicationName = $this->PublicationModel->GetPublicationById($publicationId)->Name;
			}			
		}
	}
?>