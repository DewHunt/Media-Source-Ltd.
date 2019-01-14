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

		public function CreateMediaName($mediaName,$imageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO media (Name,Image,EntryBy,EntryDateTime) VALUES ('$mediaName', '$imageName', '$entryId', '$entryDateTime')";

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

		public function GetMediaNameAllInfo()
		{
			$sql = "SELECT * FROM media";

			$mediaQuery = $this->db->query($sql);

			if ($mediaQuery->num_rows() > 0)
			{
				return $mediaQuery->result();
			}
			else
			{
				return false;
			}
		}
	}
?>