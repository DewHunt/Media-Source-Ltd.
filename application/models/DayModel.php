<?php
	/**
	 * 
	 */
	class DayModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function GetAllDay()
		{
			$sql = "SELECT * FROM days ORDER BY Name ASC";

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