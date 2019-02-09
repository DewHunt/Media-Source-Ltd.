<?php
	/**
	 * 
	 */
	class AdvertiseCategoryModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckAdvertiseCategoryExists($advertiseCategoryName,$advertiseCategoryId)
		{
			if ($advertiseCategoryId == "")
			{
				$sql = "SELECT * FROM adcategory WHERE Name = '$advertiseCategoryName'";
			}
			else
			{
				$sql = "SELECT * FROM adcategory WHERE Id != '$advertiseCategoryId' AND Name = '$advertiseCategoryName'";
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

		public function CreateAdvertiseCategory($advertiseCategoryName,$advertiseCategoryDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO adcategory (Name, Description, EntryBy, EntryDateTime) VALUES ('$advertiseCategoryName', '$advertiseCategoryDescription', '$entryId', '$entryDateTime')";

			$insertQuery = $this->db->query($sql);

			if ($insertQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetAdvertiseCategoryById($advertiseCategoryId)
		{
			$sql = "SELECT * FROM adcategory WHERE Id = '$advertiseCategoryId'";

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

		public function UpdateAdvertiseCategory($advertiseCategoryId,$advertiseCategoryName,$advertiseCategoryDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE adcategory SET Name = '$advertiseCategoryName', Description = '$advertiseCategoryDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$advertiseCategoryId'";

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

		public function DeleteAdvertiseCategory($advertiseCategoryId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE adcategory SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$advertiseCategoryId."'";

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

		public function GetAllProductCategory()
		{
			$sql = "SELECT * FROM adcategory ORDER BY Name ASC";

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