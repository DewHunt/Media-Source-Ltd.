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
			$sql = "SELECT * FROM admins WHERE Username = '".$userName."' AND Password = '".$password."'";

			$admin_check = $this->db->query($sql);

			if ($admin_check->num_rows() > 0)
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