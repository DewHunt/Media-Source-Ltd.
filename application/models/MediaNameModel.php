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

		public function CountRows()
		{
			$sql = "SELECT * FROM media";

			$mediaQuery = $this->db->query($sql);

			return $mediaQuery->num_rows();
		}

		// public function GetMediaNameAllInfo($searchText)
		// {
		// 	// echo $searchText;
		// 	if ($searchText == "")
		// 	{
		// 		$sql = "SELECT * FROM media ORDER BY ID DESC";
		// 	}
		// 	else
		// 	{
		// 		$sql = "SELECT * FROM media WHERE Name LIKE '%".$searchText."%' ORDER BY ID DESC";
		// 	}

		// 	$mediaQuery = $this->db->query($sql);

		// 	if ($mediaQuery->num_rows() > 0)
		// 	{
		// 		return $mediaQuery->result();
		// 	}
		// 	else
		// 	{
		// 		return false;
		// 	}
		// }

		public function GetMediaNameAllInfo($limit,$start)
		{
			$sql = "SELECT * FROM media ORDER BY ID ASC LIMIT ".$start.", ".$limit;

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

		public function Edit($mediaNameId)
		{
			echo "AdminModle->Edit = ".$mediaNameId;
		}

		public function Delete($mediaNameId)
		{
			echo "AdminModle->Delete = ".$mediaNameId;
		}
	}
?>