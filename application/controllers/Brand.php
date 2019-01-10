<?php
	/**
	 * 
	 */
	class Brand extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('BrandModel');
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				echo "This Is Brand Function";
			}
		}
	}
?>