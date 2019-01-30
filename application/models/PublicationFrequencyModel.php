<?php
	/**
	 * 
	 */
	class PublicationFrequencyModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPublicationFrequencyExists($publicationFrequencyName)
		{
			$sql = "SELECT * FROM pubfrequency WHERE Name = '$publicationFrequencyName'";

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

		public function CreatePublicationFrequency($publicationFrequencyName,$publicationFrequencyDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO pubfrequency (Name, Description, EntryBy, EntryDateTime) VALUES ('$publicationFrequencyName', '$publicationFrequencyDescription', '$entryId', '$entryDateTime')";

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

		public function GetPublicationFrequencyById($publicationFrequencyId)
		{
			$sql = "SELECT * FROM pubfrequency WHERE Id = '$publicationFrequencyId'";

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

		public function UpdatePublicationFrequency($publicationFrequencyId,$publicationFrequencyName,$publicationFrequencyDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE pubfrequency SET Name = '$publicationFrequencyName', Description = '$publicationFrequencyDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$publicationFrequencyId'";

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

		public function DeletePublicationFrequency($publicationFrequencyId)
		{
			$sql = "DELETE FROM pubfrequency WHERE Id = '$publicationFrequencyId'";

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

		public function GetAllPublicationFrequency()
		{
			$sql = "SELECT * FROM pubfrequency ORDER BY Name ASC";

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