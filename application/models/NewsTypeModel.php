<?php
	/**
	 * 
	 */
	class NewsTypeModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckNewsTypeExists($newsTypeName)
		{
			$sql = "SELECT * FROM newstype WHERE Name = '$newsTypeName'";

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

		public function CreateNewsType($newsTypeName,$newsTypeDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO newstype (Name, Description, EntryBy, EntryDateTime) VALUES ('$newsTypeName','$newsTypeDescription','$entryId','$entryDateTime')";

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

		public function GetNewsTypeById($newsTypeId)
		{
			$sql = "SELECT * FROM newstype WHERE Id = '$newsTypeId'";

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

		public function UpdateNewsType($newsTypeId,$newsTypeName,$newsTypeDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE newstype SET Name = '$newsTypeName', Description = '$newsTypeDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$newsTypeId'";

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

		public function DeleteNewsType($newsTypeId)
		{
			$sql = "DELETE FROM newstype WHERE Id = '$newsTypeId'";

			$deleteQuery = $this->db->query($sql);

			if ($deleteQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetAllPlacingType()
		{
			$sql = "SELECT * FROM newstype ORDER BY Name ASC";

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