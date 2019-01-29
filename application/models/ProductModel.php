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

		public function checkProductExists($productName,$productCategoryId)
		{
			$sql = "SELECT * FROM product_cat WHERE Name = '".$productName."' AND ProductId = '".$productCategoryId."'";

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

		public function CreateProduct($productCategoryId,$productName,$productDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO product_cat (ProductId, Name, Description, EntryBy, EntryDateTime) VALUES ('$productCategoryId','$productName','$productDescription','$entryId','$entryDateTime')";

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

		public function GetProductById($productId)
		{
			$sql = "SELECT * FROM product_cat WHERE Id = ".$productId;

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

		public function UpdateProduct($productId,$productCategoryId,$productName,$productDescription,$updateId)
		{
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product_cat SET ProductId = '$productCategoryId', Name = '$productName', Description = '$productDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$productId'";

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

		public function DeleteProduct($productId)
		{
			$sql = "DELETE FROM product_cat WHERE Id = '".$productId."'";

			$query = $this->db->query($sql);

			if ($query)
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