<?php
	/**
	 * 
	 */
	class AccountModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckAccountExists($accountUserId,$accountId)
		{
			if ($accountId == "")
			{
				$sql = "SELECT * FROM users WHERE UserId = '$accountUserId' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM users WHERE Id != '$accountId' AND UserId = '$accountUserId' AND State = '1'";
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

		public function CreateAccount($accountUserId,$accountPassword,$accountName,$accountType,$accountMobile,$accountEmail,$entryId)
		{
			$sql = "INSERT INTO users (UserId, Password, Name, DesignationId, Phone, Email, CreateBy) VALUES ('$accountUserId','$accountPassword','$accountName','$accountType','$accountMobile','$accountEmail','$entryId')";

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

		public function GetAccountById($accountId)
		{
			$sql = "SELECT * FROM users WHERE Id = '$accountId' AND State = '1'";

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

		public function UpdateAccount($accountName,$accountPhone,$accountEmail,$accountUserId,$accountType,$accountId)
		{
			$sql = "UPDATE users SET UserId = '".$accountUserId."', Name = '".$accountName."', DesignationId = '".$accountType."', Phone = '".$accountPhone."', Email = '".$accountEmail."' WHERE Id = '".$accountId."' AND State = '1'";

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

		public function UpdateProfile($accountName,$accountPhone,$accountEmail,$accountUserId,$accountId)
		{
			$sql = "UPDATE users SET UserId = '".$accountUserId."', Name = '".$accountName."', Phone = '".$accountPhone."', Email = '".$accountEmail."' WHERE Id = '".$accountId."' AND State = '1'";

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

		public function DeleteAccount($accountId)
		{
			$sql = "UPDATE users SET State = '0' WHERE Id = '".$accountId."'";

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

		public function RetrieveAccountData($accountId)
		{
			$sql = "UPDATE users SET State = '1' WHERE Id = '".$accountId."'";

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

		public function ChangePasswordAction($newPassword,$accountId)
		{
			$sql = "UPDATE users SET Password = '".$newPassword."' WHERE Id = '".$accountId."' AND State = '1'";

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
	}
?>