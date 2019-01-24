<?php
	/**
	 * 
	 */
	class ParameterModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckParameterNameExists($parameterName)
		{
			$sql = "SELECT * FROM parameter WHERE Name = '$parameterName'";

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

		public function CreateParameter($parameterName,$parameterDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO parameter (Name, Description, EntryBy, EntryDateTime) VALUES ('$parameterName', '$parameterDescription', '$entryId', '$entryDateTime')";

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
	}
?>