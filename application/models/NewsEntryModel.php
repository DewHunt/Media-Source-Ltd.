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

		public function GetPublicationInfo($publicationId)
		{
			$str = "SELECT publication.Name AS PublicationName, publication.PublicationLan AS PublicationLanguage, media.Name AS MediaName, pubtype.Name AS TypeName, pubfrequency.Name AS FrequencyName, pubplace.Name AS PlaceName
				FROM publication
				INNER JOIN media ON (publication.MediaId = media.Id)
				INNER JOIN pubtype ON (publication.PublicationType = pubtype.Id)
				INNER JOIN pubfrequency ON (publication.PubFreQuencyId = pubfrequency.Id)
				INNER JOIN pubplace ON (publication.PubPlaceId = pubplace.Id)
				WHERE publication.Id = '$publicationId'";

			$query = $this->db->query($str);

			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

		public function GetSubBrandInfo($subBrandId)
		{
			$str = "SELECT subbrand.Name AS SubBrandName, brand.Name AS BrandName, company.Name AS CompanyName
				FROM subbrand
				INNER JOIN brand ON (subbrand.BrandId = brand.Id)
				INNER JOIN company ON (subbrand.CompanyId = company.Id)
				WHERE subbrand.Id = '$subBrandId'";

			$query = $this->db->query($str);

			if ($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

		public function GetProductInfo($productId)
		{
			$str = "SELECT product_cat.Name AS ProductName, product.Name AS ProductCategoryName
				FROM product_cat
				INNER JOIN product ON (product_cat.ProductId = product.Id)
				WHERE product_cat.Id = '$productId'";

			$query = $this->db->query($str);

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