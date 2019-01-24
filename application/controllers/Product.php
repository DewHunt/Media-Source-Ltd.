<?php
	/**
	 * 
	 */
	class Product extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('ProductCategoryModel');
			$this->load->model('DataTableModel');
			$this->load->model('ProductModel');
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
					'title' => 'Product - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/media/product',$data);
			}
		}

		public function Product($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Product - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-product',$data);				
			}
		}

		public function GetDataForSelectMenu()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = '';

				$result = $this->ProductCategoryModel->GetAllProductCategory();

				if ($result)
				{
					$output .= '<select class="dropdown" name="product-category-id" id="product-category-id" style="width: 99%;">';
					$output .= '<option value="">Select Product Category</option>';
					foreach ($result as $value)
					{
						$output .= '<option value="'.$value->Id.'">'.$value->Name.'</option>';
					}
					$output .= '</select>';
				}
				else
				{
					$output .= '<select class="dropdown span10" name="product-category-id" id="product-category-id" disable>';
					$output .= '<option value="">Product Category Not Found</option>';
					$output .= '</select>';				
				}

				echo $output;
			}
		}

		public function CreateProduct()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productName = $this->input->post('product-name');
				$productCategoryId = $this->input->post('product-category-id');

				$checkProductName = $this->ProductModel->checkProductNameExists($productName,$productCategoryId);

				if ($checkProductName)
				{
					return redirect('Product/Product/3');
				}
				else
				{
					$productDescription = $this->input->post('product-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->ProductModel->CreateProduct($productName,$productCategoryId,$productDescription,$entryId);

					if ($result)
					{
						return redirect('Product/Product/1');
					}
					else
					{
						return redirect('Product/Product/2');
					}
				}
			}
		}

		public function GetProductAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-product";
				$table = "product";
				$selectColumn = array("Id","Name","ProductCategoryId","Description");
				$orderColumn = array("Id","Name","ProductCategoryId",null,null);

				$productInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($productInfo as $value)
				{
					$product = array();
					$product[] = $sl;
					$product[] = $value->Name;
					$product[] = $this->ProductCategoryModel->GetProductCategoryById($value->ProductCategoryId)->Name;
					// $product[] = $value->ProductCategoryId;
					$product[] = $value->Description;
					$product[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $product;
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