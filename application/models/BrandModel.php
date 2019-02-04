<?php
	/**
	 * 
	 */
	class BrandModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		public function checkBrandExists($brandName,$companyId)
		{
			$sql = "SELECT * FROM brand WHERE Name = $brandName AND CompanyId = $companyId";

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

		public function CreateBrand($brandName,$companyId,$brandDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO brand (Name, CompanyId, Description, EntryBy, EntryDateTime) VALUES ('$brandName','$companyId','$brandDescription','$entryId','$entryDateTime')";

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