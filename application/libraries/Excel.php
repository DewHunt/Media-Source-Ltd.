<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  require_once APPPATH."/third_party/PHPExcel/Classes/PHPExcel.php"; 
  // require_once('PHPExcel.php');

  class Excel extends PHPExcel
  {

    public function __construct()
    {
      parent::__construct();
    }
  }
?>