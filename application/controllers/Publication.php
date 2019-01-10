<?php
	/**
	 * 
	 */
	class Publication extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('PublicationModel');
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				echo "This Is Publication Function";
			}
		}
	}
?>