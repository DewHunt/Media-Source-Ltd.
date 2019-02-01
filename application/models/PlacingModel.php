<?php
	/**
	 * 
	 */
	class PlacingModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPlacingExists($placingName)
		{
			$sql = "SELECT * FROM placing WHERE Name = '$placingName'";

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

		public function CreatePlacing($placingName,$placingDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO placing (Name, Description, EntryBy, EntryDateTime) VALUES ('$placingName','$placingDescription','$entryId','$entryDateTime')";

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

		public function GetPlacingById($placingId)
		{
			$sql = "SELECT * FROM placing WHERE Id = '$placingId'";

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

		public function UpdatePlacing($placingId,$placingName,$placingDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE placing SET Name = '$placingName', Description = '$placingDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$placingId'";

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

		public function DeletePlacing($placingId)
		{
			$sql = "DELETE FROM placing WHERE Id = '$placingId'";

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

		public function GetAllPlacing()
		{
			$sql = "SELECT * FROM placing ORDER BY Name ASC";

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