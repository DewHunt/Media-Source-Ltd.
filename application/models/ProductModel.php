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

		public function GetProductById($productId)
		{
			$sql = "SELECT * FROM product WHERE Id = ".$productId;

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

		public function UpdateProduct($productId,$productName,$productCategoryId,$productDescription,$updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product SET Name = '$productName', ProductCategoryId = '$productCategoryId', Description = '$productDescription', UpdateBy = '$updateId', UpdateDateTime = '$updateDateTime' WHERE Id = '$productId'";

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
			$sql = "DELETE FROM product WHERE Id = '".$productId."'";

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