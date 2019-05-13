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

		public function SendSynopsisByOperator($synopsisTitle,$synopsisContent,$synopsisReference,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO synopsisbyoperator (Title, Content, Reference, EntryBy, EntryDateTime) VALUES ('$synopsisTitle','$synopsisContent','$synopsisReference','$entryId','$entryDateTime')";

			$insertQuery = $this->db->query($sql);

			if ($insertQuery)
			{
				$insertId = $this->db->insert_id();
				return $insertId;
			}
			else
			{
				return false;
			}
		}

		public function SendSynopsis($synopsisByOperatorId,$dataEntryReportId,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO synopsis (SynopsisByOperatorId, DataEntryReportId, EntryBy, EntryDateTime) VALUES ('$synopsisByOperatorId','$dataEntryReportId','$entryId','$entryDateTime') ";

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

		public function ShowSynopsis()
		{
			$sql = "SELECT * FROM synopsisbyoperator WHERE State = '1' ORDER BY Id DESC";

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

		public function SynopsisByOperatorInfoById($id)
		{
			$sql = "SELECT * FROM synopsisbyoperator WHERE Id = '$id' AND State = '1'";

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

		public function SynopsisInfoByForeignId($id)
		{
			$sql = "SELECT * FROM synopsis WHERE SynopsisByOperatorId = '$id' AND State = '1'";

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

		public function DataEntryReportInfoById($id)
		{
			$sql = "SELECT * FROM dataentryreport WHERE Id = '$id'";

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

		public function CreateSynopsis($synopsisTitle,$synopsis,$synopsisByOperatorId,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO synopsisdetails (SynopsisByOperatorId, NewsTitle, ContentDetails, EntryBy, EntryDateTime) VALUES ('$synopsisByOperatorId','$synopsisTitle','$synopsis','$entryId','$entryDateTime') ";

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