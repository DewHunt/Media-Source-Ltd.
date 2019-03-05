<?php
	/**
	 * 
	 */
	class NewsReportsModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function SearchNewsReports($fromDate, $toDate, $mediaName, $publicationName)
		{
			$where = "";
			if ($fromDate != "" && $toDate != "")
			{
				$where .= "AND Date BETWEEN '$fromDate' AND '$toDate' ";
			}

			if ($mediaName != "")
			{
				$where .= "AND MediaId = '$mediaName' ";
			}

			if ($publicationName != "")
			{
				$where .= "AND PublicationName = '$publicationName' ";
			}

			$sql = "SELECT * FROM dataentryreport WHERE State = 1 $where";

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