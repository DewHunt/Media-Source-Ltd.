<?php
	/**
	 * 
	 */
	class ProductCategory extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('DataTableModel');
			$this->load->model('ProductCategoryModel');
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
					'title' => 'Product Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/product-category',$data);
			}
		}

		public function ProductCategory($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Product Category - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg,
					'active' => 1
				);

				$this->load->view('admin/system_setup/media/create-product-category',$data);				
			}
		}

		public function CreateProductCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productCategoryName = $this->input->post('product-category-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				$checkProductCategory = $this->ProductCategoryModel->CheckProductCategoryExists($productCategoryName,"");

				if($checkProductCategory)
				{
					return redirect('ProductCategory/ProductCategory/3');
				}
				else
				{
					$productCategoryDescription = $this->input->post('product-category-description');

					$result = $this->ProductCategoryModel->CreateProductCategory($productCategoryName,$productCategoryDescription,$entryId);

					if ($result)
					{
						return redirect('ProductCategory/ProductCategory/1');
					}
					else
					{
						return redirect('ProductCategory/ProductCategory/2');
					}
				}
			}
		}

		public function GetProductCategoryAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-common";			
				$table = "product";
				$selectColumn = array("Id","Name","Description");
				$orderColumn = array("Id","Name",null,null);

				$productCategoryInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($productCategoryInfo as $value)
				{
					$productCategory = array();
					$productCategory[] = $sl;

					if ($value->Name == "")
					{
						$productCategory[] = "Data Not Found";
					}
					else
					{
						$productCategory[] = $value->Name;
					}

					if ($value->Description == "")
					{
						$productCategory[] = "Data Not Found";
					}
					else
					{
						$productCategory[] = $value->Description;
					}

					$productCategory[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger delete">Delete</button>';
					$sl++;
					$data[] = $productCategory;
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

		public function GetProductCategoryById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$productCategoryId = $this->input->post('productCategoryId');

				$data = $this->ProductCategoryModel->GetProductCategoryById($productCategoryId);

				$output['productCategoryId'] = $data->Id;
				$output['productCategoryName'] = $data->Name;
				$output['productCategoryDescription'] = $data->Description;

				echo json_encode($output);
			}			
		}

		public function UpdateProductCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productCategoryId = $this->input->post('product-category-id');
				$productCategoryName = $this->input->post('product-category-name');

				$checkProductCategory = $this->ProductCategoryModel->CheckProductCategoryExists($productCategoryName,$productCategoryId);

				if ($checkProductCategory)
				{
					echo "Oops! Sorry, This Product Category Alredy Created.";
				}
				else
				{
					$productCategoryDescription = $this->input->post('product-category-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->ProductCategoryModel->UpdateProductCategory($productCategoryId,$productCategoryName,$productCategoryDescription,$updateId);

					if ($result)
					{
						echo "Great! You Updated Your Product Category Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Product Category Can't Be Updated";
					}
				}
			}
		}

		public function DeleteProductCategory()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productCategoryId = $this->input->post('productCategoryId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->ProductCategoryModel->DeleteProductCategory($productCategoryId,$deleteId);

				if ($result)
				{
					echo "Product Category Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Product Category";
				}
			}
		}
	}
?>