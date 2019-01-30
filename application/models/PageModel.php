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

		public function CheckPageExists($pageName)
		{
			$sql = "SELECT * FROM page WHERE Name = '$pageName'";

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
			$sql = "SELECT * FROM page WHERE Id = '$pageId'";

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
			$sql = "UPDATE page SET Name = '$pageName', Description = '$pageDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$pageId'";

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

		public function DeletePage($pageId)
		{
			$sql = "DELETE FROM page WHERE Id = '$pageId'";

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

		public function GetAllPage()
		{
			$sql = "SELECT * FROM page ORDER BY Name ASC";

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