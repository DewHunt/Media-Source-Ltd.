<?php
	/**
	 * 
	 */
	class ProductModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function checkProductNameExists($productName,$productCategoryId)
		{
			$sql = "SELECT * FROM product WHERE Name = '".$productName."' AND ProductCategoryId = '".$productCategoryId."'";

			$checkQuery = $this->db->query($sql);

			if ($checkQuery->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function CreateProduct($productName,$productCategoryId,$productDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO product (Name, ProductCategoryID, Description, EntryBy, EntryDateTime) VALUES ('$productName','$productCategoryId','$productDescription','$entryId','$entryDateTime')";

			$productQuery = $this->db->query($sql);

			if ($productQuery)
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