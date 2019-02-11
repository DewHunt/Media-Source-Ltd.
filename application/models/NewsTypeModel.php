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

		public function CheckNewsTypeExists($newsTypeName,$newsTypeId)
		{
			if ($newsTypeId = "")
			{
				$sql = "SELECT * FROM newstype WHERE Name = '$newsTypeName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM newstype WHERE Id != '$newsTypeId' AND Name = '$newsTypeName' AND State = '1'";
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
			$sql = "SELECT * FROM newstype WHERE Id = '$newsTypeId' AND State = '1'";

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
			$sql = "UPDATE newstype SET Name = '$newsTypeName', Description = '$newsTypeDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$newsTypeId' AND State = '1'";

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

		public function DeleteNewsType($newsTypeId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE newstype SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$newsTypeId."'";

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

		public function GetAllPlacingType()
		{
			$sql = "SELECT * FROM newstype WHERE State = '1' ORDER BY Name ASC";

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