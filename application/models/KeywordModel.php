<?php
	/**
	 * 
	 */
	class KeywordModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckKeywordExists($keywordName,$keywordId)
		{
			if ($keywordId == "")
			{
				$sql = "SELECT * FROM keyword WHERE Name = '$keywordName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM keyword WHERE Id != '$keywordId' AND  Name = '$keywordName' AND State = '1'";
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

		public function CreateKeyword($keywordName,$keywordDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO keyword (Name, Description, EntryBy, EntryDateTime) VALUES ('$keywordName','$keywordDescription','$entryId','$entryDateTime')";

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

		public function GetKeywordById($keywordId)
		{
			$sql = "SELECT * FROM keyword WHERE Id = '$keywordId' AND State = '1'";

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

		public function UpdateKeyword($keywordId,$keywordName,$keywordDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE keyword SET Name = '".$keywordName."', Description = '".$keywordDescription."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$keywordId."' AND State = '1'";

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

		public function DeleteKeyword($keywordId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE keyword SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$keywordId."'";

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

		public function GetAllKeyword()
		{
			$sql = "SELECT * FROM keyword WHERE State = '1' ORDER BY Name ASC";

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