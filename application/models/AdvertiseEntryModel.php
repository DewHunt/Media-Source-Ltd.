<?php
	/**
	 * 
	 */
	class AdvertiseEntryModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function GetAdvertiseEntryById($adEntryId)
		{
			$sql = "SELECT * FROM adentry WHERE Id = '$adEntryId' AND State = '1'";

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
	}
?>