<?php
	/**
	 * 
	 */
	class Page extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('PageModel');
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
					'title' => 'Page - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 2
				);

				$this->load->view('admin/system_setup/page/page',$data);
			}
		}

		public function Page($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Page - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 2
				);

				$this->load->view('admin/system_setup/page/create-page',$data);
			}
		}

		public function CreatePage()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$pageName = $this->input->post('page-name');

				$checkPage = $this->PageModel->CheckPageExists($pageName,"");

				if ($checkPage)
				{
					return redirect('Page/Page/3');
				}
				else
				{
					$pageDescription = $this->input->post('page-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->PageModel->CreatePage($pageName,$pageDescription,$entryId);

					if ($result)
					{
						return redirect('Page/Page/1');
					}
					else
					{
						return redirect('Page/Page/2');
					}
				}
			}
		}

		public function GetPageAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";
				$table = "page";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$pageInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($pageInfo as $value)
				{
					$page = array();
					$page[] = $sl;

					if ($value->Name == "")
					{
						$page[] = "Data Not Found";
					}
					else
					{
						$page[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$page[] = "Data Not Found";
					}
					else
					{
						$page[] = $value->Description;
					}

					$page[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $page;
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

		public function GetPageById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$pageId = $this->input->post('pageId');

				$data = $this->PageModel->GetPageById($pageId);

				$output['pageId'] = $data->Id;
				$output['pageName'] = $data->Name;
				$output['pageDescription'] = $data->Description;

				echo json_encode($output);
			}
		}

		public function UpdatePage()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$pageId = $this->input->post('page-id');
				$pageName = $this->input->post('page-name');

				$checkPage = $this->PageModel->CheckPageExists($pageName,$pageId);

				if ($checkPage)
				{
					echo "Oops! Sorry, This Page Alredy Created.";
				}
				else
				{
					$pageDescription = $this->input->post('page-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->PageModel->UpdatePage($pageId,$pageName,$pageDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Page Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Page Can't Be Updated";
					}
				}
			}
		}

		public function DeletePage()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$pageId = $this->input->post('pageId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->PageModel->DeletePage($pageId,$deleteId);

				if ($result)
				{
					echo "Page Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Page";
				}
			}
		}
	}
?>