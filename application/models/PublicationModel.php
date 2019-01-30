<?php
	/**
	 * 
	 */
	class PublicationModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function checkPublicationExists($publicationName,$mediaNameId)
		{
			$sql = "SELECT * FROM publication WHERE Name = '".$publicationName."' AND MediaId = '".$mediaNameId."'";

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

		public function CreatePublication($publicationName,$mediaNameId,$publicationTypeId,$publicationPlaceId,$publicationFrequencyId,$publicationLanguage,$publicationDescription,$dbImageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO publication (Name, MediaId, PublicationType, PubPlaceId, PubFreQuencyId, PublicationLan, Description, Logo, EntryBy, EntryDateTime) VALUES ('$publicationName','$mediaNameId','$publicationTypeId','$publicationPlaceId','$publicationFrequencyId','$publicationLanguage','$publicationDescription','$dbImageName','$entryId','$entryDateTime')";

			$publicationQuery = $this->db->query($sql);

			if ($publicationQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetPublicationById($publicationId)
		{
			$sql = "SELECT * FROM publication WHERE Id = ".$publicationId;

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

		public function UpdatePublication($publicationId,$publicationName,$mediaNameId,$publicationTypeId,$publicationPlaceId,$publicationFrequencyId,$publicationLanguage,$publicationDescription,$dbImageName,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE publication SET Name = '".$publicationName."', MediaId = '".$mediaNameId."', PublicationType = '".$publicationTypeId."', PubPlaceId = '".$publicationPlaceId."', PubFreQuencyId = '".$publicationFrequencyId."', PublicationLan = '".$publicationLanguage."', Description = '".$publicationDescription."', Logo = '".$dbImageName."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$publicationId."'";

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

		public function DeletePublication($publicationId)
		{
			$sql = "DELETE FROM publication WHERE Id = '".$publicationId."'";

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

		public function GetAllPublication()
		{
			$sql = "SELECT * FROM publication ORDER BY Name ASC";

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

		public function GetPublicationByForignKey($fieldName,$id)
		{
			$sql = "SELECT * FROM publication WHERE $fieldName = $id ORDER BY Name ASC";

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