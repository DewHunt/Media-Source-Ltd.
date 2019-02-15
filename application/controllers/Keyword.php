<?php
	/**
	 * 
	 */
	class Keyword extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('KeywordModel');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Keyword - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/advertise/keyword',$data);
			}
		}

		public function Keyword($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Keyword - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/advertise/create-keyword',$data);				
			}
		}

		public function CreateKeyword()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$keywordName = $this->input->post('keyword-name');

				$checkKeyword = $this->KeywordModel->CheckKeywordExists($keywordName,"");

				if ($checkKeyword)
				{
					return redirect('Keyword/Keyword/3');
				}
				else
				{
					$keywordDescription = $this->input->post('keyword-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->KeywordModel->CreateKeyword($keywordName,$keywordDescription,$entryId);

					if ($result)
					{
						return redirect('Keyword/Keyword/1');
					}
					else
					{
						return redirect('Keyword/Keyword/2');
					}
				}
			}
		}

		public function GetKeywordAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "keyword";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$keywordInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($keywordInfo as $value)
				{
					$keyword = array();
					$keyword[] = $sl;
					$keyword[] = $value->Name;
					$keyword[] = $value->Description;
					$keyword[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $keyword;
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

		public function GetKeywordById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$keywordId = $this->input->post('keywordId');

				$data = $this->KeywordModel->GetKeywordById($keywordId);

				$output['keywordId'] = $data->Id;
				$output['keywordName'] = $data->Name;
				$output['keywordDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdateKeyword()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$keywordId = $this->input->post('keyword-id');
				$keywordName = $this->input->post('keyword-name');

				$checkKeyword = $this->KeywordModel->CheckKeywordExists($keywordName,$keywordId);

				if ($checkKeyword)
				{
					echo "Oops! Sorry, This Keyword Alredy Created.";
				}
				else
				{
					$keywordDescription = $this->input->post('keyword-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->KeywordModel->UpdateKeyword($keywordId,$keywordName,$keywordDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Keyword Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Keyword Can't Be Updated";
					}
				}
			}
		}

		public function DeleteKeyword()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$keywordId = $this->input->post('keywordId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->KeywordModel->DeleteKeyword($keywordId,$deleteId);

				if ($result)
				{
					echo "Keyword Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Keyword";
				}
			}
		}
	}
?>