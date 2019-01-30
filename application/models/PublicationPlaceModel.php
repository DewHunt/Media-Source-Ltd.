<?php
	/**
	 * 
	 */
	class PublicationPlaceModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPublicationPlaceExists($publicationPlaceName)
		{
			$sql = "SELECT * FROM pubplace WHERE Name = '$publicationPlaceName'";

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

		public function CreatePublicationPlace($publicationPlaceName,$publicationPlaceDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO pubplace (Name, Description, EntryBy, EntryDateTime) VALUES ('$publicationPlaceName', '$publicationPlaceDescription', '$entryId', '$entryDateTime')";

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

		public function GetPublicationPlaceById($publicationPlaceId)
		{
			$sql = "SELECT * FROM pubplace WHERE Id = '$publicationPlaceId'";

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

		public function UpdatePublicationPlace($publicationPlaceId,$publicationPlaceName,$publicationPlaceDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE pubplace SET Name = '$publicationPlaceName', Description = '$publicationPlaceDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$publicationPlaceId'";

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

		public function DeletePublicationPlace($publicationPlaceId)
		{
			$sql = "DELETE FROM pubplace WHERE Id = '$publicationPlaceId'";

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

		public function GetAllPublicationPlace()
		{
			$sql = "SELECT * FROM pubplace ORDER BY Name ASC";

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