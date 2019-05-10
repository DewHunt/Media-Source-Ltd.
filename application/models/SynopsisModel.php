<?php
	/**
	 * 
	 */
	class SynopsisModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function GetReferenceId()
		{
			$str = "SELECT max(ReferenceId)+1 AS maxReferenceId FROM synopsis";

			$query = $this->db->query($str);

			if ($query)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

		public function SendSynopsis($dataEntryReportId,$synopsisTitle,$synopsisContent,$synopsisReferenceId,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO synopsis (DataEntryReportId, Title, Content, ReferenceId, EntryBy, EntryDateTime) VALUES ('$dataEntryReportId','$synopsisTitle','$synopsisContent','$synopsisReferenceId','$entryId','$entryDateTime') ";

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