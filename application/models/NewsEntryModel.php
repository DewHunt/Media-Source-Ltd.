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

			$dataEntryQuery = $this->db->query($sql);

			if ($dataEntryQuery)
			{
				$insertId = $this->db->insert_id();
				return $insertId;
			}
			else
			{
				return false;
			}
		}

		public function CreateDataEntryDetails($dataEntryId,$productId,$caption,$hueId,$keywordId,$subBrandId,$positionName,$pageId,$col,$inch,$pageNo,$newsTypeId,$dbImageName,$entryId,$newsCategoryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO dataentrydetails (DataentryId, ProductId, Caption, HueId, KeywordId, subBrandId, PositionName, PageId, Cols, Inchs, PageNo, NewstypeId, Image, EntryBy, EntryDateTime, outlook) VALUES ('$dataEntryId','$productId','$caption','$hueId','$keywordId','$subBrandId','$positionName','$pageId','$col','$inch','$pageNo','$newsTypeId','$dbImageName','$entryId','$entryDateTime','$newsCategoryId')";

			$dataEntryDetailsQuery = $this->db->query($sql);

			if ($dataEntryDetailsQuery)
			{
				$insertId = $this->db->insert_id();
				return $insertId;
			}
			else
			{
				return false;
			}

		}

		public function CreateDataEntryReport($dataEntryId,$batchId,$mediaName,$publicationName,$publicationLanguage,$publicationTypeName,$publicationFrequencyName,$publicationPlaceName,$productName,$productCategoryName,$brandName,$subBrandName,$companyName,$caption,$dbDate,$hueName,$positionName,$pageName,$col,$inch,$price,$pageNo,$newsTypeName,$dbImageName,$keywordName,$entryId,$newsCategoryName)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO dataentryreport (DataEntryId, BatchId, MediaId, PublicationName, PublicationLan, PublicationType, PublicationFreq, PublicationPlace, ProductName, ProductCatName, BrandName, subBrand, Company, Caption, Date, HueName, PositionName, PageId, Cols, Inchs, Price, PageNo, NewstypeName, Image, Keyword, EntryBy, EntryDateTime, outlook) VALUES ('$dataEntryId','$batchId','$mediaName','$publicationName','$publicationLanguage','$publicationTypeName','$publicationFrequencyName','$publicationPlaceName','$productName','$productCategoryName','$brandName','$subBrandName','$companyName','$caption','$dbDate','$hueName','$positionName','$pageName','$col','$inch','$price','$pageNo','$newsTypeName','$dbImageName','$keywordName','$entryId','$entryDateTime','$newsCategoryName')";

			$dataEntryDetailsQuery = $this->db->query($sql);

			if ($dataEntryDetailsQuery)
			{
				$insertId = $this->db->insert_id();
				return $insertId;
			}
			else
			{
				return false;
			}
		}

		public function GetDataEntryById($dataEntryId)
		{
			$sql = "SELECT * FROM dataentry WHERE Id = '$dataEntryId' AND State = '1'";

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

		public function GetDataEntryDetailsById($dataEntryId)
		{
			$sql = "SELECT * FROM dataentrydetails WHERE DataentryId = '$dataEntryId' AND State = '1'";

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

		public function UpdateDataEntry($dataEntryId,$batchId,$mediaId,$publicationId,$dbDate,$updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE dataentry SET BatchId = '".$batchId."', MediaId = '".$mediaId."', PublicationId = '".$publicationId."', Date = '".$dbDate."', UpdateBy = '".$updateId."', UpdateDateTime = '".$updateDateTime."' WHERE Id = '".$dataEntryId."'";

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

		public function GetPublicationInfo($publicationId)
		{
			$str = "SELECT publication.Name AS PublicationName, publication.PublicationLan AS PublicationLanguage, media.Name AS MediaName, pubtype.Name AS TypeName, pubfrequency.Name AS FrequencyName, pubplace.Name AS PlaceName
				FROM publication
				INNER JOIN media ON (publication.MediaId = media.Id)
				INNER JOIN pubtype ON (publication.PublicationType = pubtype.Id)
				INNER JOIN pubfrequency ON (publication.PubFreQuencyId = pubfrequency.Id)
				INNER JOIN pubplace ON (publication.PubPlaceId = pubplace.Id)
				WHERE publication.Id = '$publicationId' AND publication.State = '1'";

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
				WHERE subbrand.Id = '$subBrandId' AND subbrand.State = '1'";

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
				WHERE product_cat.Id = '$productId' AND product_cat.State = '1'";

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

		public function GetPriceInfo($mediaId,$publicationId,$col,$inch,$hueId,$pageId)
		{
			$str = "SELECT pricedetails.Price, hue.Name AS HueName, page.Name AS PageName
			FROM price
			LEFT JOIN pricedetails on (price.Id = pricedetails.PriceId)
			LEFT JOIN hue ON (pricedetails.Hue = hue.Id)
			LEFT JOIN page ON (pricedetails.PageNoId = page.Id)
			WHERE price.MediaId='$mediaId' and price.PublicationId='$publicationId' and pricedetails.Col='$col' and pricedetails.Inch='$inch' and pricedetails.Hue='$hueId' and pricedetails.PageNoId='$pageId' and pricedetails.State='1'
			";

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