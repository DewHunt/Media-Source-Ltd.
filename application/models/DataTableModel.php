<?php
	/**
	 * 
	 */
	class DataTableModel extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function MakeQuery($option,$table,$selectColumn,$orderColumn)
		{
			if ($option == "dt-01")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

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

			if ($option == "dt-02")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

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

			if ($option == "dt-03")
			{				
				$this->db->select($selectColumn);
				$this->db->from($table);

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

			if ($option == "dt-04")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

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
		}

		public function MakeDataTables($option,$table,$selectColumn,$orderColumn)
		{
			$this->MakeQuery($option,$table,$selectColumn,$orderColumn);

			if ($_POST["length"] != -1)
			{
				$this->db->limit($_POST["length"],$_POST["start"]);
			}

			$query = $this->db->get();

			return $query->result();
		}

		public function GetFilteredData($option,$table,$selectColumn,$orderColumn)
		{
			$this->MakeQuery($option,$table,$selectColumn,$orderColumn);
			$query = $this->db->get();

			return $query->num_rows();
		}

		public function GetAllData($table)
		{
			$this->db->select("*");
			$this->db->from($table);

			return $this->db->count_all_results();
		}
	}
?>