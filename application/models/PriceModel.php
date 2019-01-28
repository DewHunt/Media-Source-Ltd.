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

		public function CreatePrice($priceTitle,$mediaId,$publicationId,$dayId,$pageId,$hueId,$col,$inch,$price,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO price (Name, MediaId, PublicationID, DayId, PageId, HueId, Col, Inch, Price, EntryBy, EntryDateTime) VALUES ('$priceTitle','$mediaId','$publicationId','$dayId','$pageId','$hueId','$col','$inch','$price','$entryId','$entryDateTime')";

			$priceQuery = $this->db->query($sql);

			if ($priceQuery)
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
	}
?>