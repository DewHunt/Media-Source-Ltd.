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
			$sql = "SELECT * FROM publication_frequency WHERE Name = '$publicationFrequencyName'";

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

			$sql = "INSERT INTO publication_frequency (Name, Description, EntryBy, EntryDateTime) VALUES ('$publicationFrequencyName', '$publicationFrequencyDescription', '$entryId', '$entryDateTime')";

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
			$sql = "SELECT * FROM publication_frequency WHERE Id = '$publicationFrequencyId'";

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
			$updateDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE publication_frequency SET Name = '$publicationFrequencyName', Description = '$publicationFrequencyDescription', UpdateBy = '$updateId', UpdateDateTime = '$updateDateTime' WHERE Id = '$publicationFrequencyId'";

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
			$sql = "DELETE FROM publication_frequency WHERE Id = '$publicationFrequencyId'";

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
	}
?>