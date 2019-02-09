<?php
	/**
	 * 
	 */
	class NewsType extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('NewsTypeModel');
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
					'title' => 'News Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/news/news-type',$data);
			}
		}

		public function NewsType($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create News Type - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/news/create-news-type',$data);				
			}
		}

		public function CreateNewsType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsTypeName = $this->input->post('news-type-name');

				$checkNewsType = $this->NewsTypeModel->CheckNewsTypeExists($newsTypeName,"");

				if ($checkNewsType)
				{
					return redirect('NewsType/NewsType/3');
				}
				else
				{
					$newsTypeDescription = $this->input->post('news-type-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->NewsTypeModel->CreateNewsType($newsTypeName,$newsTypeDescription,$entryId);

					if ($result)
					{
						return redirect('NewsType/NewsType/1');
					}
					else
					{
						return redirect('NewsType/NewsType/2');
					}
				}
			}
		}

		public function GetNewsTypeAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "newstype";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$newsTypeInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($newsTypeInfo as $value)
				{
					$newsType = array();
					$newsType[] = $sl;
					$newsType[] = $value->Name;
					$newsType[] = $value->Description;
					$newsType[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $newsType;
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

		public function GetNewsTypeById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$newsTypeId = $this->input->post('newsTypeId');

				$data = $this->NewsTypeModel->GetNewsTypeById($newsTypeId);

				$output['newsTypeId'] = $data->Id;
				$output['newsTypeName'] = $data->Name;
				$output['newsTypeDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdateNewsType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsTypeId = $this->input->post('news-type-id');
				$newsTypeName = $this->input->post('news-type-name');

				$checkNewsType = $this->NewsTypeModel->CheckNewsTypeExists($newsTypeName,$newsTypeId);

				if ($checkNewsType)
				{
					echo "Oops! Sorry, This News Type Alredy Created.";
				}
				else
				{
					$newsTypeDescription = $this->input->post('news-type-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->NewsTypeModel->UpdateNewsType($newsTypeId,$newsTypeName,$newsTypeDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your News Type Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your News Type Can't Be Updated";
					}
				}
			}
		}

		public function DeleteNewsType()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsTypeId = $this->input->post('newsTypeId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->NewsTypeModel->DeleteNewsType($newsTypeId,$deleteId);

				if ($result)
				{
					echo "News Type Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting News Type";
				}
			}
		}
	}
?>