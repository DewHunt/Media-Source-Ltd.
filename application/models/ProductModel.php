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

		public function CheckProductExists($productName,$productCategoryId,$productId)
		{
			if ($productId == "")
			{
				$sql = "SELECT * FROM product_cat WHERE Name = '$productName' AND ProductId = '$productCategoryId' AND State = '1'";
			}
			else
			{
				$sql = "SELECT * FROM product_cat WHERE Id != '$productId' AND Name = '$productName' AND ProductId = '$productCategoryId' AND State = '1'";
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
			$sql = "SELECT * FROM product_cat WHERE Id = '$productId' AND State = '1'";
			
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
			$sql = "UPDATE product_cat SET ProductId = '$productCategoryId', Name = '$productName', Description = '$productDescription', UpdateBy = '$updateId', UpdateTime = '$updateTime' WHERE Id = '$productId' AND State = '1'";

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

		public function DeleteProduct($productId,$deleteId)
		{
			$deleteDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE product_cat SET DeleteBY = '".$deleteId."', DeleteDateTime = '".$deleteDateTime."', State = '0' WHERE Id = '".$productId."'";

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

		public function GetAllProduct()
		{
			$sql = "SELECT * FROM product_cat WHERE State = '1' ORDER BY Name ASC";

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

		public function GetProductByForeignKey($fieldName,$id)
		{
			$sql = "SELECT * FROM product_cat WHERE $fieldName = $id AND State = '1' ORDER BY Name ASC";

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