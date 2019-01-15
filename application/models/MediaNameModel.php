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
		var $selectColumn = array("id","Name","Image");
		var $orderColumn = array(null,"Name",null,null);

		public function CreateMediaName($mediaName,$imageName,$entryId)
		{
			$entryDateTime = date('Y-m-d H:i:s');

			$sql = "INSERT INTO media (Name,Image,EntryBy,EntryDateTime) VALUES ('$mediaName', '$imageName', '$entryId', '$entryDateTime')";

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

		public function MakeQuery()
		{
			$this->db->select($this->selectColumn);
			$this->db->from($this->table);

			if (isset($_POST["search"]["value"]))
			{
				$this->db->like("Name",$_POST["search"]["value"]);
			}

			if (isset($_POST["order"]))
			{
				$this->db->order_by($this->orderColumn[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
			}
			else
			{
				$this->db->order_by("id","DESC");
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

		public function CountRows()
		{
			$sql = "SELECT * FROM media";

			$mediaQuery = $this->db->query($sql);

			return $mediaQuery->num_rows();
		}

		public function Edit($mediaNameId)
		{
			echo "AdminModle->Edit = ".$mediaNameId;
		}

		public function Delete($mediaNameId)
		{
			echo "AdminModle->Delete = ".$mediaNameId;
		}
	}
?>