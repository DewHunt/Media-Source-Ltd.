<?php
	/**
	 * 
	 */
	class PriceModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CreatePrice($priceMediaName,$mediaId,$publicationId,$day,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO price (Name, MediaId, PublicationID, Day, EntryBy, EntryDateTime) VALUES ('$priceMediaName','$mediaId','$publicationId','$day','$entryId','$entryDateTime')";

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

		public function CreatePriceDetails($priceId,$priceTitle,$hueId,$pageId,$price,$col,$inch,$priceDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO pricedetails (PriceId, Name, Hue, PageNoId, Price, Col, Inch, Description, EntryBy, EntryDateTime) VALUES ('$priceId','$priceTitle','$hueId','$pageId','$price','$col','$inch','$priceDescription','$entryId','$entryDateTime')";

			$priceDetailsQuery = $this->db->query($sql);

			if ($priceDetailsQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetPriceById($priceId)
		{
			$sql = "SELECT * FROM price WHERE Id = $priceId";

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

		public function GetPriceDetailsById($priceDetailsId)
		{
			$sql = "SELECT * FROM pricedetails WHERE Id = $priceDetailsId";

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