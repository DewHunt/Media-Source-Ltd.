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

		public function CreateMediaName($mediaName,$imageName)
		{
			echo "Media Name = ".$mediaName."<br>";
			echo "Image Name = ".$imageName;
		}
	}
?>