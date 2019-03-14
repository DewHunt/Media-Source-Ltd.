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
			$sql = "SELECT * FROM price WHERE Id = '$priceId' AND State = '1'";

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

		public function GetPriceDetailsById($priceId)
		{
			$sql = "SELECT * FROM pricedetails WHERE PriceId = '$priceId' AND State = '1'";

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

		public function UpdatePrice($priceId,$priceMediaName,$mediaId,$publicationId,$day,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE price SET Name = '".$priceMediaName."', MediaId = '".$mediaId."', PublicationId = '".$publicationId."', Day = '".$day."', UpdateBy = '".$updateId."', UpdateTime = '".$updateTime."' WHERE Id = '".$priceId."'";

			$updateQuery = $this->db->query($sql);

			if ($updateQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function UpdatePriceDetails($priceId,$priceTitle,$hueId,$pageId,$price,$col,$inch,$priceDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$insertSql = "INSERT INTO pricedetails (PriceId, Name, Hue, PageNoId, Price, Col, Inch, Description, UpdateBy, UpdateTime) VALUES ('$priceId','$priceTitle','$hueId','$pageId','$price','$col','$inch','$priceDescription','$updateId','$updateTime')";

			$priceDetailsQuery = $this->db->query($insertSql);

			if ($priceDetailsQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function DeletePrice($priceId)
		{
			$sql = "DELETE FROM price WHERE Id = '$priceId'";

			$deleteQuery = $this->db->query($sql);

			if ($deleteQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function DeletePriceDetails($priceId)
		{
			$sql = "DELETE FROM pricedetails WHERE PriceId = '$priceId'";

			$deleteQuery = $this->db->query($sql);

			if ($deleteQuery)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function GetPriceId($fieldName1,$value1,$fieldName2,$value2)
		{
			$str = "SELECT * FROM price WHERE $fieldName1 = '$value1' AND $fieldName2 = '$value2'";

			$query = $this->db->query($str);

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