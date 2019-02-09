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

		public function CheckPlacingExists($placingName,$placingId)
		{
			if ($placingId == "")
			{
				$sql = "SELECT * FROM placing WHERE Name = '$placingName'";
			}
			else
			{
				$sql = "SELECT * FROM placing WHERE Id != '$placingId' AND Name = '$placingName'";
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

		public function DeletePlacing($placingId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE placing SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$placingId."'";

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