<?php
	/**
	 * 
	 */
	class NewsCategory extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('NewsCategoryModel');
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
					'title' => 'News Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 3
				);

				$this->load->view('admin/system_setup/news/news-category',$data);
			}
		}

		public function NewsCategory($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create News Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 3
				);

				$this->load->view('admin/system_setup/news/create-news-category',$data);				
			}
		}

		public function CreateNewsCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsCategoryName = $this->input->post('news-category-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkNewsCategory = $this->NewsCategoryModel->CheckNewsCategoryExists($newsCategoryName,"");

				if($checkNewsCategory)
				{
					return redirect('NewsCategory/NewsCategory/3');
				}
				else
				{
					$newsCategoryDescription = $this->input->post('news-category-description');

					$result = $this->NewsCategoryModel->CreateNewsCategory($newsCategoryName,$newsCategoryDescription,$entryId);

					if ($result)
					{
						return redirect('NewsCategory/NewsCategory/1');
					}
					else
					{
						return redirect('NewsCategory/NewsCategory/2');
					}
				}
			}
		}

		public function GetNewsCategoryAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";			
				$table = "newscategory";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$newsCategoryInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($newsCategoryInfo as $value)
				{
					$newsCategory = array();
					$newsCategory[] = $sl;

					if ($value->Name == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $value->Description;
					}
					
					$newsCategory[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $newsCategory;
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

		public function GetNewsCategoryById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$newsCategoryId = $this->input->post('newsCategoryId');

				$data = $this->NewsCategoryModel->GetNewsCategoryById($newsCategoryId);

				$output['newsCategoryId'] = $data->Id;
				$output['newsCategoryName'] = $data->Name;
				$output['newsCategoryDescription'] = $data->Description;

				echo json_encode($output);
			}			
		}

		public function UpdateNewsCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsCategoryId = $this->input->post('news-category-id');
				$newsCategoryName = $this->input->post('news-category-name');

				$checkNewsCategory = $this->NewsCategoryModel->CheckNewsCategoryExists($newsCategoryName,$newsCategoryId);

				if ($checkNewsCategory)
				{
					echo "Oops! Sorry, This News Category Alredy Created.";
				}
				else
				{
					$newsCategoryDescription = $this->input->post('news-category-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->NewsCategoryModel->UpdateNewsCategory($newsCategoryId,$newsCategoryName,$newsCategoryDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your News Category Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your News Category Can't Be Updated";
					}
				}
			}
		}

		public function DeleteNewsCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$newsCategoryId = $this->input->post('newsCategoryId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->NewsCategoryModel->DeleteNewsCategory($newsCategoryId,$deleteId);

				if ($result)
				{
					echo "News Category Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting News Category";
				}
			}
		}

		public function RetrieveNewsCategory()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$data = array(
					'title' => 'Retrieve News Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 3
				);

				$this->load->view('admin/system_setup/news/retrieve-news-category',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function GetDeletedNewsCategoryAllInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$option = "dt-dr-common";			
				$table = "newscategory";
				$selectColumn = array("Id","Name","Description","DeleteBy","DeleteDateTime");
				$orderColumn = array("Id","Name",null,null);

				$newsCategoryInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($newsCategoryInfo as $value)
				{
					$newsCategory = array();
					$newsCategory[] = $sl;

					if ($value->Name == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $value->Description;
					}

					if ($value->DeleteBy == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $this->AdminModel->GetAdminById($value->DeleteBy)->Name;
					}

					if ($value->DeleteDateTime == "")
					{
						$newsCategory[] = "Data Not Found";
					}
					else
					{
						$newsCategory[] = $value->DeleteDateTime;
					}
					
					$newsCategory[] = '<button type="button" name="retrieve" id="'.$value->Id.'" class="btn btn-primary retrieve">Retrieve</button>';
					$sl++;
					$data[] = $newsCategory;
				}

				$output = array(
					'draw' => intval($_POST['draw']),
					'recordsTotal' => $this->DataTableModel->GetAllData($table),
					'recordsFiltered' => $this->DataTableModel->GetFilteredData($option,$table,$selectColumn,$orderColumn),
					'data' => $data
				);

				echo json_encode($output);
			}
			else
			{
				return redirect('Admin/Index');
			}			
		}

		public function RetrieveNewsCategoryData()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$newsCategoryId = $this->input->post('newsCategoryId');

				$result = $this->NewsCategoryModel->RetrieveNewsCategoryData($newsCategoryId);

				if ($result)
				{
					echo "News Category Retrieved Successfully!";
				}
				else
				{
					echo "Oops, Something Wrong With Retrieving News Category";
				}
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>