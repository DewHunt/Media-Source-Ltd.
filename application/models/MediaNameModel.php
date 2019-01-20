<?php
	/**
	 * 
	 */
	class MediaNameModel extends CI_Model
	{		
		public function __construct()
		{
			parent::__construct();
		}

		var $table = "media";
		var $selectColumn = array("Id","Name","Image");
		var $orderColumn = array("Id","Name",null,null);

		public function CheckMediaNameExsits($mediaName)
		{
			$sql = "SELECT Name FROM media WHERE Name = '".$mediaName."'";

			$query = $this->db->query($sql);

			if ($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function CreateMediaName($mediaName,$imageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO media (Name, Image, EntryBy, EntryDateTime) VALUES ('$mediaName', '$imageName', '$entryId', '$entryDateTime')";

			$mediaQuery = $this->db->query($sql);

			if ($mediaQuery)
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

		public function GetMediaNameById($mediaId)
		{
			$sql = "SELECT * FROM media WHERE Id = ".$mediaId;

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

		public function UpdateMediaName($mediaId, $mediaName, $dbImageName, $updateId)
		{
			$updateDateTime = date('Y-m-d H:i:s');

			$sql = "UPDATE media SET Name = '".$mediaName."', Image = '".$dbImageName."', UpdateBy = '".$updateId."', UpdateDateTime = '".$updateDateTime."' WHERE Id = '".$mediaId."'";

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

		public function DeleteMediaName($mediaId)
		{
			$sql = "DELETE FROM media WHERE Id = '".$mediaId."'";

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