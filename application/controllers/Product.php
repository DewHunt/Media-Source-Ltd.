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

				$checkProduct = $this->ProductModel->CheckProductExists($productName,$productCategoryId,"");

				if ($checkProduct)
				{
					return redirect('Product/Product/3');
				}
				else
				{
					$productDescription = $this->input->post('product-description');

					$entryId = $this->GetAdminAllInfo()->Id;

					$result = $this->ProductModel->CreateProduct($productCategoryId,$productName,$productDescription,$entryId);

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
				$table = "product_cat";
				$selectColumn = array("Id","ProductId","Name","Description");
				$orderColumn = array("Id","ProductId","Name",null,null);

				$productInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($productInfo as $value)
				{
					$product = array();
					$product[] = $sl;
					$product[] = $value->Name;
					$product[] = $this->ProductCategoryModel->GetProductCategoryById($value->ProductId)->Name;
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

		public function GetProductById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$productId = $this->input->post('productId');

				$data = $this->ProductModel->GetProductById($productId);

				$output['productId'] = $data->Id;
				$output['productName'] = $data->Name;
				$output['productDescription'] = $data->Description;
				$output['productCategoryId'] = $data->ProductId;

				echo json_encode($output);
			}
		}

		public function UpdateProduct()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productName = $this->input->post('product-name');
				$productCategoryId = $this->input->post('product-category-id');
				$productId = $this->input->post('product-id');

				$checkProduct = $this->ProductModel->CheckProductExists($productName,$productCategoryId,$productId);

				if ($checkProduct)
				{
					echo "Oops! Sorry, This Product Alredy Created.";
				}
				else
				{
					$productDescription = $this->input->post('product-description');
					$updateId = $this->GetAdminAllInfo()->Id;

					$result = $this->ProductModel->UpdateProduct($productId,$productCategoryId,$productName,$productDescription,$updateId);

					if ($result)
					{
						echo "Greate! You Updated Your Product Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Product Can't Be Updated";
					}
				}				
			}
		}

		public function DeleteProduct()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$productId = $this->input->post('productId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->ProductModel->DeleteProduct($productId,$deleteId);
				
				if ($result)
				{
					echo "Product Dleted From Database!";
				}
				else
				{
					echo "Oops! Something Wrong With Deleting Product";
				}
			}
		}
	}
?>