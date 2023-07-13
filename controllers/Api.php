<?php
defined('BASEPATH')or exit('no direct script allowed');

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller{
    public function __counstruct()
    {
        parent::__construct();
		$this->load->model('universityModel');
    }

    public function universities_get()
	{
		$universities = $this->universityModel->getUniversities();

		if ($universities) {
			$this->response($universities, REST_Controller::HTTP_OK);
		} else {
			$this->response(['message' => 'No universities found'], REST_Controller::HTTP_NOT_FOUND);
		}
	}

    public function university_get($id)
	{
		$university = $this->universityModel->getUniversity($id);

		if ($university) {
			$this->response($university, REST_Controller::HTTP_OK);
		} else {
			$this->response(['message' => 'University not found'], REST_Controller::HTTP_NOT_FOUND);
		}
	}



}



?>