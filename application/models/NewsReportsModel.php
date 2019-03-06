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

		public function SearchNewsReports($fromDate, $toDate, $mediaName, $publicationName, $brandName, $productName, $keywordName)
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

			if ($brandName != "")
			{
				$where .= "AND BrandName = '$brandName' ";
			}

			if ($productName != "")
			{
				$where .= "AND ProductName = '$productName' ";
			}

			if ($keywordName != "")
			{
				$where .= "AND Keyword = '$keywordName' ";
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