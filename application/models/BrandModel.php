<?php
	/**
	 * 
	 */
	class BrandModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function checkBrandExists($brandName,$companyId,$brandId)
		{
			if ($brandId == "")
			{
				$sql = "SELECT * FROM brand WHERE Name = '$brandName' AND CompanyId = '$companyId' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM brand WHERE Id != '$brandId' AND Name = '$brandName' AND CompanyId = '$companyId' AND State = '1'";
			}

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

		public function CreateBrand($brandName,$companyId,$brandDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO brand (Name, CompanyId, Description, EntryBy, EntryDateTime) VALUES ('$brandName','$companyId','$brandDescription','$entryId','$entryDateTime')";

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

		public function GetBrandById($brandId)
		{
			$sql = "SELECT * FROM brand WHERE Id = '$brandId' AND State = '1'";

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

		public function UpdateBrand($brandId,$brandName,$companyId,$brandDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE brand SET Name = '$brandName', CompanyId = '$companyId',  Description = '$brandDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$brandId' AND State = '1'";

			$updateQuery = $this->db->query($sql);

			if ($updateQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function DeleteBrand($brandId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE brand SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$brandId."'";

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

		public function RetrieveBrandData($brandId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE brand SET State = '1' WHERE Id = '".$brandId."'";

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

		public function GetAllBrand()
		{
			$sql = "SELECT * FROM brand WHERE State = '1' ORDER BY Name ASC";

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}

		public function GetBrandByForeignKey($fieldName,$id)
		{
			$sql = "SELECT * FROM brand WHERE $fieldName = $id AND State = '1' ORDER BY Name ASC";

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
	}
?>