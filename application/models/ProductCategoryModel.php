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

		public function CheckProductCategoryExists($productCategoryName,$productCategoryId)
		{
			if ($productCategoryId == "")
			{
				$sql = "SELECT * FROM product WHERE Name = '$productCategoryName'";
			}
			else
			{
				$sql = "SELECT * FROM product WHERE Id != '$productCategoryId' AND Name = '$productCategoryName'";
			}

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

			$sql = "INSERT INTO product (Name, Description, EntryBy, EntryDateTime) VALUES ('$productCategoryName', '$productCategoryDescription', '$entryId', '$entryDateTime')";

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
			$sql = "SELECT * FROM product WHERE Id = '$productCategoryId'";

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
			$updateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product SET Name = '$productCategoryName', Description = '$productCategoryDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$productCategoryId'";

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

		public function DeleteProductCategory($productCategoryId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$productCategoryId."'";

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

		public function GetAllProductCategory()
		{
			$sql = "SELECT * FROM product ORDER BY Name ASC";

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