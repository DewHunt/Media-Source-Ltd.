<?php
	/**
	 * 
	 */
	class MediaNameModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckMediaNameExsits($mediaName,$mediaId)
		{
			if ($mediaId == "")
			{
				$sql = "SELECT Name FROM media WHERE Name = '$mediaName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT Name FROM media WHERE Id != '$mediaId' AND Name = '$mediaName' AND State = '1'";
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

		public function CreateMediaName($mediaName,$mediaOwner,$mediaPhone,$mediaEmail,$mediaAddress,$dbImageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO media (Name, Owner, Phone, Email, Address, Image, EntryBy, EntryDateTime) VALUES ('$mediaName', '$mediaOwner', '$mediaPhone', '$mediaEmail', '$mediaAddress', '$dbImageName', '$entryId', '$entryDateTime')";

			$mediaQuery = $this->db->query($sql);

			if ($mediaQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetMediaNameById($mediaId)
		{
			$sql = "SELECT * FROM media WHERE Id = '$mediaId' AND State = '1'";

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

		public function UpdateMediaName($mediaId,$mediaName,$mediaOwner,$mediaPhone,$mediaEmail,$mediaAddress,$dbImageName,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE media SET Name = '".$mediaName."', Owner = '".$mediaOwner."', Phone = '".$mediaPhone."', Email = '".$mediaEmail."', Address = '".$mediaAddress."', Image = '".$dbImageName."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$mediaId."' AND State = '1'";

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

		public function DeleteMediaName($mediaId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE media SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$mediaId."'";

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

		public function GetAllMediaName()
		{
			$sql = "SELECT * FROM media WHERE State = '1' ORDER BY Name ASC";

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