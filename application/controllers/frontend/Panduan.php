<?php
  /**
   *
   */
  class Panduan extends Frontend
  {

    function __construct()
    {
       parent::__construct();
    }

    public function index()
    {
      $data = array(
  			'tittle' => 'Panduan Penggunaan',
  			'nav' => 6,
  		);
      $this->layout->load_frontend('frontend/panduan/index', $data);
    }
  }

?>
