<?php
	/**
	 * 
	 */
	class PlacingTypeModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPlacingTypeExists($placingTypeName)
		{
			$sql = "SELECT * FROM placingtype WHERE Name = '$placingTypeName'";

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

		public function CreatePlacingType($placingTypeName,$placingTypeDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO placingtype (Name, Description, EntryBy, EntryDateTime) VALUES ('$placingTypeName','$placingTypeDescription','$entryId','$entryDateTime')";

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

		public function GetPlacingTypeById($placingTypeId)
		{
			$sql = "SELECT * FROM placingtype WHERE Id = '$placingTypeId'";

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

		public function UpdatePlacingType($placingTypeId,$placingTypeName,$placingTypeDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE placingtype SET Name = '$placingTypeName', Description = '$placingTypeDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$placingTypeId'";

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

		public function DeletePlacingType($placingTypeId)
		{
			$sql = "DELETE FROM placingtype WHERE Id = '$placingTypeId'";

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
			$sql = "SELECT * FROM placingtype ORDER BY Name ASC";

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