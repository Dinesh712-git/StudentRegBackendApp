<?php
defined('BASEPATH')or exit('no direct script allowed');

use Restserver\Libraries\REST_Controller;

class programModulAPI extends REST_Controller{
    public function __counstruct()
    {
        parent::__construct();
		$this->load->model('programModuleModel');
    }

}



?>