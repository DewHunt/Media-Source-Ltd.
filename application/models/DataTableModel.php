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
			if ($option == "dt-common")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-dr-common")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","0");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","0");
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

			if ($option == "dt-publication")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					// $this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("MediaId",$_POST["search"]["value"])->where("State","1");
					// $this->db->or_where("PublicationTypeId",$_POST["search"]["value"])->where("State","1");
					// $this->db->or_where("PublicationPlaceId",$_POST["search"]["value"])->where("State","1");
					// $this->db->or_where("PublicationFrequencyId",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-product")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("ProductId",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-price")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("PriceId",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-brand")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("CompanyId",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-dr-brand")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","0");
					$this->db->or_where("CompanyId",$_POST["search"]["value"])->where("State","0");
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

			if ($option == "dt-sub-brand")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("BrandId",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-dr-sub-brand")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Name",$_POST["search"]["value"])->where("State","0");
					$this->db->or_where("BrandId",$_POST["search"]["value"])->where("State","0");
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

			if ($option == "dt-adinfo")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Title",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-dr-adinfo")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Title",$_POST["search"]["value"])->where("State","0");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","0");
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

			if ($option == "dt-news-entry")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Caption",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-advertise-entry")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Caption",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-synopsis-by-operator")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("Title",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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

			if ($option == "dt-synopsis-details")
			{
				$this->db->select($selectColumn);
				$this->db->from($table);

				if (isset($_POST["search"]["value"]))
				{
					$this->db->like("NewsTitle",$_POST["search"]["value"])->where("State","1");
					$this->db->or_where("Id",$_POST["search"]["value"])->where("State","1");
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
			$this->db->from($table)->where("State","1");

			return $this->db->count_all_results();
		}

		public function GetAllDeleteData($table)
		{
			$this->db->select("*");
			$this->db->from($table)->where("State","0");

			return $this->db->count_all_results();
		}
	}
?>