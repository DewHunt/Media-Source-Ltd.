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
			$this->load->model('AdvertiseCategoryModel');
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
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 4
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
					'message' => $msg,
					'active' => 4
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
				$adinfoADID = $this->input->post('adinfo-ad-id');

				$checkAdvertiseInfo = $this->AdvertiseInfoModel->CheckAdvertiseInfoExists($adinfoADID,"");

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
					$adinfoTheme = $this->input->post('adinfo-theme');
					$entryId = $this->GetAdminAllInfo()->Id;

					// Copy Image and Get Image New Name
					$config['upload_path'] = "images/";
					$config['allowed_types'] = "jpg|jpeg|png|gif";
					$this->load->library('upload',$config);

					$adinfoImage = $_FILES['adinfo-image']['name'];

					if ($adinfoImage == "")
					{
						$dbImageName = "";
					}
					else
					{
						$extention = pathinfo($adinfoImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $adinfoADID));
						$dbImageName = "adinfo_".$slug."_".date('ymds').".".$extention;
						$copyImageName = $config['upload_path'].$dbImageName;

						copy($_FILES['adinfo-image']['tmp_name'],$copyImageName);
					}

					$result = $this->AdvertiseInfoModel->CreateAdvertiseInfo($adinfoADID,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$entryId);

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

					if ($value->Title == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $value->Title;
					}

					if ($value->CompanyId == "" || $value->CompanyId == 0)
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$companyName = $this->CompanyModel->GetCompanyById($value->CompanyId);
						if ($companyName)
						{
							$info[] = $companyName->Name;						}
						else
						{
							$info[] = "Data Not Found";
						}
					}

					if ($value->BrandId == "" || $value->BrandId == 0)
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$brandName = $this->BrandModel->GetBrandById($value->BrandId);
						if ($brandName)
						{
							$info[] = $brandName->Name;
						}
						else
						{
							$info[] = "Data Not Found";
						}
					}

					if ($value->SubBrandId == "" || $value->SubBrandId == 0)
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$subBrandName = $this->SubBrandModel->GetSubBrandById($value->SubBrandId);
						if ($subBrandName)
						{
							$info[] = $subBrandName->Name;
						}
						else
						{
							$info[] = "Data Not Found";
						}
					}

					if ($value->ProductId == "" || $value->ProductId == 0)
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$productName = $this->ProductModel->GetProductById($value->ProductId);
						if ($productName)
						{
							$info[] = $productName->Name;
						}
						else
						{
							$info[] = "Data Not Found";
						}
					}

					if ($value->AtypeId == "" || $value->AtypeId == 0)
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$adTypeName = $this->AdvertiseCategoryModel->GetAdvertiseCategoryById($value->AtypeId);
						if ($adTypeName)
						{
							$info[] = $adTypeName->Name;
						}
						else
						{
							$info[] = "Data Not Found";
						}
					}

					if ($value->Notes == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $value->Notes;
					}

					if ($value->Image == "")
					{
						$info[] = "Image Not Found";
					}
					else
					{
						$info[] = '<img src="'.base_url("images/").$value->Image.'" width="50px" height="50px">';
					}

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

		public function GetAdvertiseInfoById()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$output = array();
				$adinfoId = $this->input->post('adinfoId');

				$data = $this->AdvertiseInfoModel->GetAdvertiseInfoById($adinfoId);

				$output['adinfoId'] = $data->Id;
				$output['adinfoADID'] = $data->AD_ID;
				$output['adinfoTitle'] = $data->Title;
				$output['brandId'] = $data->BrandId;
				$output['subBrandId'] = $data->SubBrandId;
				$output['companyId'] = $data->CompanyId;
				$output['adinfoNotes'] = $data->Notes;
				$output['previousMediaImage'] = $data->Image;
				$output['productId'] = $data->ProductId;
				$output['advertiseTypeId'] = $data->AtypeId;
				$output['adinfoTheme'] = $data->AdTheme;

				if ($data->Image == "")
				{
					$output['adinfoImage'] = '<input type="hidden" name="previous-adinfo-image" id="previous-adinfo-image" value="">';
				}
				else
				{
					$output['adinfoImage'] = '<img src="'.base_url("images/").$data->Image.'" class="img-thumbnail" width="80px" height="80px"> <input type="hidden" name="previous-adinfo-image" id="previous-adinfo-image" value="'.$data->Image.'">';
				}

				echo json_encode($output);
			}
		}

		public function UpdateAdvertiseInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$adinfoADID = $this->input->post('adinfo-ad-id');
				$adinfoId = $this->input->post('adinfo-id');

				$checkAdvertiseInfo = $this->AdvertiseInfoModel->CheckAdvertiseInfoExists($adinfoADID,$adinfoId);

				if ($checkAdvertiseInfo)
				{
					echo "Oops! Sorry, This Advertise Info Alredy Created.";
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
					$adinfoTheme = $this->input->post('adinfo-theme');

					$updateId = $this->GetAdminAllInfo()->Id;
					$newAdinfoImage = "";

					if (!empty($_FILES["new-adinfo-image"]["name"]))
					{
						$adinfoImage = $_FILES['new-adinfo-image']['name'];
						$previousImage = $this->input->post('previous-adinfo-image');

						// Copy Image and Get Image New Name
						$config['upload_path'] = "images/";
						$config['allowed_types'] = "jpg|jpeg|png|gif";
						$this->load->library('upload',$config);

						$extention = pathinfo($adinfoImage, PATHINFO_EXTENSION);
						$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $adinfoADID));
						$dbImageName = "adinfo_".$slug."_".date('ymds').".".$extention;
						$copyImageName = $config['upload_path'].$dbImageName;

						if ($previousImage != "")
						{					
							$deleteImage = $config['upload_path'].$previousImage;

							if (file_exists($deleteImage))
							{
								chown($deleteImage, 666);
								unlink($deleteImage);
							}
						}

						copy($_FILES['new-adinfo-image']['tmp_name'],$copyImageName);
					}
					else
					{
						$dbImageName = $this->input->post("previous-adinfo-image");
					}

					$result = $this->AdvertiseInfoModel->UpdateAdvertiseInfo($adinfoId,$adinfoADID,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$updateId);

					if ($result)
					{
						echo "Greate! You Updated Your Advertise Info Successfully";
					}
					else
					{
						echo "Oops! Sorry, Your Advertise Info Can't Be Updated";
					}
				}
			}
		}

		public function DeleteAdvertiseInfo()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$advertiseInfoId = $this->input->post('advertiseInfoId');
				$deleteId = $this->GetAdminAllInfo()->Id;

				$result = $this->AdvertiseInfoModel->DeleteAdvertiseInfo($advertiseInfoId,$deleteId);

				if ($result)
				{
					echo "Advertise Info Deleted From Database!";
				}
				else
				{
					echo "Oops, Something Wrong With Deleting Advertise Info";
				}
			}
		}

		public function RetrieveAdvertiseInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$data = array(
					'title' => 'Retrieve Advertise Info - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'active' => 4
				);

				$this->load->view('admin/system_setup/advertise/retrieve-advertise-info',$data);
			}
			else
			{
				return redirect('Admin/Index');
			}
		}

		public function GetDeletedAdvertiseInfoAllInfo()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$option = "dt-dr-adinfo";
				$table = "adinfo";
				$selectColumn = array("Id","AD_ID","Title","Notes","DeleteBy","DeleteDateTime");
				$orderColumn = array("Id","Title",null,null,null,null,null,null,null,null,null,null);

				$adInfo = $this->DataTableModel->MakeDataTables($option,$table,$selectColumn,$orderColumn);
				$sl = 1;
				$data = array();

				foreach ($adInfo as $value)
				{
					$info = array();
					$info[] = $sl;

					if ($value->Title == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $value->Title;
					}

					if ($value->Notes == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $value->Notes;
					}

					if ($value->DeleteBy == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $this->AdminModel->GetAdminById($value->DeleteBy)->Name;
					}

					if ($value->DeleteDateTime == "")
					{
						$info[] = "Data Not Found";
					}
					else
					{
						$info[] = $value->DeleteDateTime;
					}

					$info[] = '<button type="button" name="retrieve" id="'.$value->Id.'" class="btn btn-warning btn-xs retrieve">Retrieve</button>';
					$sl++;
					$data[] = $info;
				}

				$output = array(
					'draw' => intval($_POST['draw']),
					'recordsTotal' => $this->DataTableModel->GetAllDeleteData($table),
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

		public function RetrieveAdvertiseInfoData()
		{
			if ($this->GetAdminAllInfo()->AdminStatus == 101 || $this->GetAdminAllInfo()->Status == 1)
			{
				$advertiseInfoId = $this->input->post('advertiseInfoId');

				$result = $this->AdvertiseInfoModel->RetireveAdvertiseInfoData($advertiseInfoId);

				if ($result)
				{
					echo "Advertise Info Retireve Successfully!";
				}
				else
				{
					echo "Oops, Something Wrong With Retrieving Advertise Info";
				}
			}
			else
			{
				return redirect('Admin/Index');
			}
		}
	}
?>