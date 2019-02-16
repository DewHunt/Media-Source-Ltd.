<?php
	/**
	 * 
	 */
	class NewsEntryModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function GetBatchId()
		{
			$str = "SELECT max(BatchId)+1 AS maxBatchId FROM dataentry";

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

		public function CreateDataEntry($dbDate,$batchId,$mediaId,$publicationId,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO dataentry (BatchId, MediaId, PublicationId, Date, EntryBy, EntryDateTime) VALUES ('$batchId','$mediaId','$publicationId','$dbDate','$entryId','$entryDateTime')";

			$priceQuery = $this->db->query($sql);

			if ($priceQuery)
			{
				$insertId = $this->db->insert_id();
				return $insertId;
			}
			else
			{
				return false;
			}
		}
	}
?>