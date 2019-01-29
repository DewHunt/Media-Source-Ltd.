<?php
	/**
	 * 
	 */
	class PublicationTypeModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPublicationTypeExists($publicationTypeName)
		{
			$sql = "SELECT * FROM pubtype WHERE Name = '$publicationTypeName'";

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

		public function CreatePublicationType($publicationTypeName,$publicationTypeDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO pubtype (Name, Description, EntryBy, EntryDateTime) VALUES ('$publicationTypeName','$publicationTypeDescription','$entryId','$entryDateTime')";

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

		public function GetPublicationTypeById($publicationTypeId)
		{
			$sql = "SELECT * FROM pubtype WHERE Id = '$publicationTypeId'";

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

		public function UpdatePublicationType($publicationTypeId,$publicationTypeName,$publicationTypeDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE pubtype SET Name = '$publicationTypeName', Description = '$publicationTypeDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$publicationTypeId'";

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

		public function DeletePublicationType($publicationTypeId)
		{
			$sql = "DELETE FROM pubtype WHERE Id = '$publicationTypeId'";

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

		public function GetAllPublicationType()
		{
			$sql = "SELECT * FROM pubtype ORDER BY Name ASC";

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