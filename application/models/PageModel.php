<?php
	/**
	 * 
	 */
	class PageModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckPageExists($pageName,$pageId)
		{
			if ($pageId == "")
			{
				$sql = "SELECT * FROM page WHERE Name = '$pageName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM page WHERE Id != '$pageId' AND Name = '$pageName' AND State = '1'";
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

		public function CreatePage($pageName,$pageDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO page (Name, Description, EntryBy, EntryDateTime) VALUES ('$pageName','$pageDescription','$entryId','$entryDateTime')";

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

		public function GetPageById($pageId)
		{
			$sql = "SELECT * FROM page WHERE Id = '$pageId' AND State = '1'";

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

		public function UpdatePage($pageId,$pageName,$pageDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE page SET Name = '$pageName', Description = '$pageDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$pageId' AND State = '1'";

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

		public function DeletePage($pageId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE page SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$pageId."'";

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

		public function GetAllPage()
		{
			$sql = "SELECT * FROM page WHERE State = '1' ORDER BY Name ASC";

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