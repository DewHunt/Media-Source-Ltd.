<?php
	/**
	 * 
	 */
	class AdvertiseInfo extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('CompanyModel');
			$this->load->model('BrandModel');
			$this->load->model('SubBrandModel');
			$this->load->model('ProductModel');
			$this->load->model('DataTableModel');
			$this->load->model('AdvertiseInfoModel');
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
					'title' => 'Advertise Info - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo()
				);

				$this->load->view('admin/system_setup/advertise/advertise-info',$data);
			}
		}

		public function AdvertiseInfo($msg = null)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Create Advertise Info - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/advertise/create-advertise-info',$data);				
			}
		}

		public function CreateAdvertiseInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$adinfoAdvertiseId = $this->input->post('adinfo-advertise-id');

				$checkAdvertiseInfo = $this->AdvertiseInfoModel->CheckAdvertiseInfoExists($adinfoAdvertiseId,"");

				if ($checkAdvertiseInfo)
				{
					return redirect('AdvertiseInfo/AdvertiseInfo/3');
				}
				else
				{
					$adinfoTitle = $this->input->post('adinfo-title');
					$companyId = $this->input->post('company-id');
					$brandId = $this->input->post('brand-id');
					$subBrandId = $this->input->post('sub-brand-id');
					$productId = $this->input->post('product-id');
					$advertiseTypeId = $this->input->post('advertise-type-id');
					$adinfoNote = $this->input->post('adinfo-notes');
					$adinfoTheme = $this->input->post('advertise-theme');
					$entryId = $this->GetAdminAllInfo()->Id;

					$adinfoImage = $this->input->post('');

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					if ($adinfoImage == "")
					{
						$dbImageName = "";
					}
					else
					{
						$extention = pathinfo($adinfoImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $adinfoTitle));
						$dbImageName = "adinfo_".$slug."_".date('ymds').".".$extention;
						$copyImageName = $config['upload_path'].$dbImageName;

						copy($_FILES['media-image']['tmp_name'],$copyImageName);
					}

					$result = $this->AdvertiseInfoModel->CreateAdvertiseInfo($adinfoAdvertiseId,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$entryId);

					if ($result)
					{
						return redirect('AdvertiseInfo/AdvertiseInfo/1');
					}
					else
					{
						return redirect('AdvertiseInfo/AdvertiseInfo/2');
					}
				}
			}
		}

		public function GetAdvertiseInfoAllInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$option = "dt-adinfo";
				$table = "adinfo";
				$selectColumn = array("Id","AD_ID","Title","BrandId","SubBrandId","CompanyId","Notes","Image","ProductId","AtypeId","AdTheme");
				$orderColumn = array("Id","Title",null,null,null,null,null,null,null,null,null,null);

				$adInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($adInfo as $value)
				{
					$info = array();
					$info[] = $sl;
					$info[] = $value->Title;
					$info[] = $this->CompanyModel->GetCompanyById($value->CompanyId)->Name;
					$info[] = $this->BrandModel->GetBrandById($value->BrandId)->Name;
					$info[] = $this->SubBrandModel->GetSubBrandById($value->SubBrandId)->Name;
					$info[] = $this->ProductModel->GetProductById($value->ProductId)->Name;
					$info[] = $value->AtypeId;
					$info[] = $value->Notes;
					$info[] = $value->Image;
					// $info[] = '<img src="'.base_url("images/").$value->Image.'" width="80px" height="80px">';
					$info[] = '<button type="button" name="update" id="'.$value->Id.'" class="btn btn-warning btn-xs update">Update</button> <button type="button" name="delete" id="'.$value->Id.'" class="btn btn-danger btn-xs delete">Delete</button>';
					$sl++;
					$data[] = $info;
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