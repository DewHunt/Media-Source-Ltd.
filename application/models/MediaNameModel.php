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

		public function CheckMediaNameExsits($mediaName)
		{
			$sql = "SELECT Name FROM media WHERE Name = '".$mediaName."'";

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

		public function CreateMediaName($mediaName,$imageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO media (Name, Image, EntryBy, EntryDateTime) VALUES ('$mediaName', '$imageName', '$entryId', '$entryDateTime')";

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
			$sql = "SELECT * FROM media WHERE Id = ".$mediaId;

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

		public function UpdateMediaName($mediaId, $mediaName, $dbImageName, $updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE media SET Name = '".$mediaName."', Image = '".$dbImageName."', UpdateBy = '".$updateId."', UpdateDateTime = '".$updateDateTime."' WHERE Id = '".$mediaId."'";

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

		public function DeleteMediaName($mediaId)
		{
			$sql = "DELETE FROM media WHERE Id = '".$mediaId."'";

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
			$sql = "SELECT * FROM media ORDER BY Name ASC";

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