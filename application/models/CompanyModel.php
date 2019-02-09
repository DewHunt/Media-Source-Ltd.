<?php
	/**
	 * 
	 */
	class CompanyModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckCompanyExists($companyName,$companyId)
		{
			if ($companyId == "")
			{
				$sql = "SELECT * FROM company WHERE Name = '$companyName'";
			}
			else
			{
				$sql = "SELECT * FROM company WHERE Id != '$companyId' AND  Name = '$companyName'";
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

		public function CreateCompany($companyName,$companyDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO company (Name, Description, EntryBy, EntryDateTime) VALUES ('$companyName','$companyDescription','$entryId','$entryDateTime')";

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

		public function GetCompanyById($companyId)
		{
			$sql = "SELECT * FROM company WHERE Id = '$companyId'";

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

		public function UpdateCompany($companyId,$companyName,$companyDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE company SET Name = '".$companyName."', Description = '".$companyDescription."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$companyId."' AND State = '1'";

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

		public function DeleteCompany($companyId)
		{
			$sql = "DELETE FROM company WHERE Id = '$companyId'";

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

		public function GetAllCompany()
		{
			$sql = "SELECT * FROM company ORDER BY Name ASC";

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