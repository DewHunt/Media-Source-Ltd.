<?php
	/**
	 * 
	 */
	class AdvertiseInfoModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckAdvertiseInfoExists($adinfoADID,$adinfoId)
		{
			if ($adinfoId == "")
			{
				$sql = "SELECT * FROM adinfo WHERE AD_ID = '$adinfoADID' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM adinfo WHERE Id != '$adinfoId' AND AD_ID = '$adinfoADID' AND State = '1'";
			}

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function CreateAdvertiseInfo($adinfoADID,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO adinfo (AD_ID, Title, BrandId, SubBrandId, CompanyId, Notes, Image, ProductId, AtypeId, AdTheme, EntryBy, EntryDateTime) VALUES ('$adinfoADID', '$adinfoTitle', '$brandId', '$subBrandId', '$companyId', '$adinfoNote', '$dbImageName', '$productId', '$advertiseTypeId', '$adinfoTheme', '$entryId', '$entryDateTime')";

			$adinfoQuery = $this->db->query($sql);

			if ($adinfoQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetAdvertiseInfoById($adinfoId)
		{
			$sql = "SELECT * FROM adinfo WHERE Id = '$adinfoId' AND State = '1'";

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

		public function UpdateAdvertiseInfo($adinfoId,$adinfoADID,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE adinfo SET AD_ID = '".$adinfoADID."', Title = '".$adinfoTitle."', BrandId = '".$brandId."', SubBrandId = '".$subBrandId."', CompanyId = '".$companyId."', Notes = '".$adinfoNote."', Image = '".$dbImageName."', ProductId = '".$productId."', AtypeId = '".$advertiseTypeId."', AdTheme = '".$adinfoTheme."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$adinfoId."' AND State = '1'";

			$query = $this->db->query($sql);

			if ($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function DeleteAdvertiseInfo($advertiseInfoId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE adinfo SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$advertiseInfoId."'";

			$query = $this->db->query($sql);

			if ($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function RetireveAdvertiseInfoData($advertiseInfoId)
		{
			$sql = "UPDATE adinfo SET State = '1' WHERE Id = '".$advertiseInfoId."'";

			$query = $this->db->query($sql);

			if ($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>