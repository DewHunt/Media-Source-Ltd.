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

		public function checkPublicationNameExists($publicationName)
		{
			$sql = "SELECT * FROM publication WHERE Name = '".$publicationName."'";

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

			$sql = "INSERT INTO publication (Name, MediaId, PublicationTypeID, PublicationPlaceId, PublicationFrequencyId, Language, Description, Image, EntryBy, EntryDateTime) VALUES ('$publicationName','$mediaNameId','$publicationTypeId','$publicationPlaceId','$publicationFrequencyId','$publicationLanguage','$publicationDescription','$dbImageName','$entryId','$entryDateTime')";

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
	}
?>