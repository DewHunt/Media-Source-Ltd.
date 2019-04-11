<?php
	/**
	 * 
	 */
	class NewsCategoryModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckNewsCategoryExists($newsCategoryName,$newsCategoryId)
		{
			if ($newsCategoryId == "")
			{
				$sql = "SELECT * FROM newscategory WHERE Name = '$newsCategoryName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM newscategory WHERE Id != $newsCategoryId AND Name = '$newsCategoryName' AND State = '1'";
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

		public function CreateNewsCategory($newsCategoryName,$newsCategoryDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO newscategory (Name, Description, EntryBy, EntryDateTime) VALUES ('$newsCategoryName', '$newsCategoryDescription', '$entryId', '$entryDateTime')";

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

		public function GetNewsCategoryById($newsCategoryId)
		{
			$sql = "SELECT * FROM newscategory WHERE Id = '$newsCategoryId' AND State = '1'";

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

		public function UpdateNewsCategory($newsCategoryId,$newsCategoryName,$newsCategoryDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE newscategory SET Name = '$newsCategoryName', Description = '$newsCategoryDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$newsCategoryId' AND State = '1'";

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

		public function DeleteNewsCategory($newsCategoryId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE newscategory SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$newsCategoryId."'";

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

		public function RetrieveNewsCategoryData($newsCategoryId)
		{
			$sql = "UPDATE newscategory SET State = '1' WHERE Id = '".$newsCategoryId."'";

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

		public function GetAllNewsCategory()
		{
			$sql = "SELECT * FROM newscategory WHERE State = '1' ORDER BY Name ASC";

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