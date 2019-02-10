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

		public function CheckPublicationPlaceExists($publicationPlaceName,$publicationPlaceId)
		{
			if ($publicationPlaceId == "")
			{
				$sql = "SELECT * FROM pubplace WHERE Name = '$publicationPlaceName'";
			}
			else
			{
				$sql = "SELECT * FROM pubplace WHERE Id != '$publicationPlaceId' AND Name = '$publicationPlaceName'";
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

		public function DeletePublicationPlace($publicationPlaceId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE pubplace SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$publicationPlaceId."'";

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