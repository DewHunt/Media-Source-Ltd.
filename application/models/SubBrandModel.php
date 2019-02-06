<?php
	/**
	 * 
	 */
	class SubBrandModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function checkSubBrandExists($subBrandName,$companyId,$brandId)
		{
			$sql = "SELECT * FROM subbrand WHERE Name = '$subBrandName' AND CompanyId = '$companyId' AND BrandId = '$brandId' AND State = 1";

			$checkQuery = $this->db->query($sql);

			if ($checkQuery->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function CreateSubBrand($subBrandName,$companyId,$brandId,$subBrandDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO subbrand (Name, CompanyId, Description, BrandId, EntryBy, EntryDateTime) VALUES ('$subBrandName','$companyId','$subBrandDescription','$brandId','$entryId','$entryDateTime')";

			$subBrandQuery = $this->db->query($sql);

			if ($subBrandQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetSubBrandById($subBrandId)
		{
			$sql = "SELECT * FROM subbrand WHERE Id = '$subBrandId'";

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

		public function UpdateSubBrand($subBrandId,$subBrandName,$companyId,$subBrandDescription,$brandId,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE subbrand SET Name = '".$subBrandName."', CompanyId = '".$companyId."', Description = '".$subBrandDescription."', BrandId = '".$brandId."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$subBrandId."'";

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

		public function DeleteSubBrand($subBrandId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE subbrand SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$subBrandId."'";

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