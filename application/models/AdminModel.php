<?php
	/**
	 * 
	 */
	class AdminModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function Login($userName,$password)
		{
			$admin_check = $this->GetAdminAllInfo($userName,$password);

			if ($admin_check)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetAdminAllInfo($userName, $password)
		{
			$sql = "SELECT * FROM users WHERE UserId = '".$userName."' AND Password = '".$password."'";

			$admin_check = $this->db->query($sql);

			if ($admin_check->num_rows() > 0)
			{
				return $admin_check->row();
			}
			else
			{
				return false;
			}
		}

		public function GetAdminId($userName, $password)
		{
			$sql = "SELECT * FROM admins WHERE UserId = '".$userName."' AND Password = '".$password."'";

			$admin_check = $this->db->query($sql);

			if ($admin_check->num_rows() > 0)
			{
				$admin_check->row();
			}
			else
			{
				return false;
			}
		}
	}
?>