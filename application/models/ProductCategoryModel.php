<?php
	/**
	 * 
	 */
	class ProductCategoryModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function CheckProductCategoryExists($productCategoryName)
		{
			$sql = "SELECT * FROM product_category WHERE Name = '$productCategoryName'";

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

		public function CreateProductCategory($productCategoryName,$productCategoryDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO product_category (Name, Description, EntryBy, EntryDateTime) VALUES ('$productCategoryName', '$productCategoryDescription', '$entryId', '$entryDateTime')";

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

		public function GetProductCategoryById($productCategoryId)
		{
			$sql = "SELECT * FROM product_category WHERE Id = '$productCategoryId'";

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

		public function UpdateProductCategory($productCategoryId,$productCategoryName,$productCategoryDescription,$updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product_category SET Name = '$productCategoryName', Description = '$productCategoryDescription', UpdateBy = '$updateId', UpdateDateTime = '$updateDateTime' WHERE Id = '$productCategoryId'";

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

		public function DeleteProductCategory($productCategoryId)
		{
			$sql = "DELETE FROM product_category WHERE Id = '$productCategoryId'";

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

		public function GetAllProductCategory()
		{
			$sql = "SELECT * FROM product_category ORDER BY Name ASC";

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
	}
?>