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
				$sql = "SELECT * FROM company WHERE Name = '$companyName' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM company WHERE Id != '$companyId' AND  Name = '$companyName' AND State = '1'";
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
			$sql = "SELECT * FROM company WHERE Id = '$companyId' AND State = '1'";

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

		public function DeleteCompany($companyId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE company SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$companyId."'";

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

		public function RetrieveCompanyData($companyId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE company SET State = '1' WHERE Id = '".$companyId."'";

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

		public function GetAllCompany()
		{
			$sql = "SELECT * FROM company WHERE State = '1' ORDER BY Name ASC";

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