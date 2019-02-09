<?php
	/**
	 * 
	 */
	class HueModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckHueExists($hueName,$hueId)
		{
			if ($hueId == "")
			{
				$sql = "SELECT * FROM hue WHERE Name = '$hueName'";
			}
			else
			{
				$sql = "SELECT * FROM hue WHERE Id != '$hueId' AND Name = '$hueName'";
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

		public function CreateHue($hueName,$hueDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO hue (Name, Description, EntryBy, EntryDateTime) VALUES ('$hueName','$hueDescription','$entryId','$entryDateTime')";

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

		public function GetHueById($hueId)
		{
			$sql = "SELECT * FROM hue WHERE Id = '$hueId'";

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

		public function UpdateHue($hueId,$hueName,$hueDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE hue SET Name = '$hueName', Description = '$hueDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$hueId'";

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

		public function DeleteHue($hueId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE hue SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$hueId."'";

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

		public function GetAllHue()
		{
			$sql = "SELECT * FROM hue ORDER BY Name ASC";

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