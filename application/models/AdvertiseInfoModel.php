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

		public function CheckAdvertiseInfoExists($adinfoAdvertiseId,$adinfoId)
		{
			if ($adinfoId == "")
			{
				$sql = "SELECT * FROM adinfo WHERE AD_ID = '$adinfoAdvertiseId' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM adinfo WHERE Id != '$adinfoId' AND AD_ID = '$adinfoAdvertiseId' AND State = '1'";
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

		public function CreateAdvertiseInfo($adinfoAdvertiseId,$adinfoTitle,$brandId,$subBrandId,$companyId,$adinfoNote,$dbImageName,$productId,$advertiseTypeId,$adinfoTheme,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO adinfo (AD_ID, Title, BrandId, SubBrandId, CompanyId, Notes, Image, ProductId, AtypeId, AdTheme, EntryBy, EntryDateTime) VALUES ('$adinfoAdvertiseId', '$adinfoTitle', '$brandId', '$subBrandId', '$companyId', '$adinfoNote', '$dbImageName', '$productId', '$advertiseTypeId', '$adinfoTheme', '$entryId', '$entryDateTime')";

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
	}
?>