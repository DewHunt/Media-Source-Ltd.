<?php
	/**
	 * 
	 */
	class PublicationTypeModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		var $table = "publication_type";
		var $selectColumn = array("Id","Name","Description");
		var $orderColumn = array("Id","Name",null,null);

		public function CheckPublicationTypeExists($publicationTypeName)
		{
			$sql = "SELECT * FROM publication_type WHERE Name = '$publicationTypeName'";

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

		public function CreatePublicationType($publicationTypeName,$publicationTypeDescription,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO publication_type (Name, Description, EntryBy, EntryDateTime) VALUES ('$publicationTypeName','$publicationTypeDescription','$entryId','$entryDateTime')";

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

		// Data Tables Query Start
		public function MakeQuery()
		{
			$this->db->select($this->selectColumn);
			$this->db->from($this->table);

			if (isset($_POST["search"]["value"]))
			{
				$this->db->like("Name",$_POST["search"]["value"]);
				$this->db->or_where("Id",$_POST["search"]["value"]);
			}

			if (isset($_POST["order"]))
			{
				$this->db->order_by($this->orderColumn[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
			}
			else
			{
				$this->db->order_by("Id","DESC");
			}
		}

		public function MakeDataTables()
		{
			$this->MakeQuery();

			if ($_POST["length"] != -1)
			{
				$this->db->limit($_POST["length"],$_POST["start"]);
			}

			$query = $this->db->get();

			return $query->result();
		}

		public function GetFilteredData()
		{
			$this->MakeQuery();
			$query = $this->db->get();

			return $query->num_rows();
		}

		public function GetAllData()
		{
			$this->db->select("*");
			$this->db->from($this->table);

			return $this->db->count_all_results();
		}
		// Data Tables Query End

		public function GetPublicationTypeById($publicationTypeId)
		{
			$sql = "SELECT * FROM publication_type WHERE Id = '$publicationTypeId'";

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

		public function UpdatePublicationType($publicationTypeId,$publicationTypeName,$publicationTypeDescription,$updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');
			$sql = "UPDATE publication_type SET Name = '$publicationTypeName', Description = '$publicationTypeDescription', UpdateBy = '$updateId', UpdateDateTime = '$updateDateTime' WHERE Id = '$publicationTypeId'";

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

		public function DeletePublicationType($publicationTypeId)
		{
			$sql = "DELETE FROM publication_type WHERE Id = '$publicationTypeId'";

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
	}
?>