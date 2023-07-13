<?php
 defined('BASEPATH')or exit('no direct script allowed');
 class universityController extends CI_Controller{
    
    //view
    function view_get()
    {
        $this->load->model('universityModel');
		$result = $this->universityModel->getUniversity();

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    //delete
    public function delete($id)
    {
        $this->load->model('universityModel');
        $result=$this->universityModel->deleteuniversity($id);

        if ($result) {
			$response = array('status' => 'success', 'message' => 'Record deleted successfully');
		} else {
			$response = array('status' => 'error', 'message' => 'Failed to delete record');
		}

        $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }

    //add university
    public function insert_uni()
    {
        //  print_r($this->input->post());
        //  die();
        $response = array('status' => 'success', 'message' => 'University added successfully');
      
       
       if($this->input->server('REQUEST_METHOD') ==='POST'){   
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $status = $this->input->post('status');
        
        $this->load->model('universityModel');
        
        $n=$this->universityModel->adduniversity($code,$name,$address,$status);
      

        }
        else{

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }

    //edit
    public function edit($id){

      

        if($this->input->server('REQUEST_METHOD') ==='POST'){   
            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $status = $this->input->post('status');
            
            $this->load->model('universityModel');
            
            $this->universityModel->edituniversity($id,$code,$name,$address,$status);
            $response = array('status' => 'success', 'message' => 'University Edit successfully');
    
            }
            else{

                $response = array('status' => 'success', 'message' => 'not valid method');
    
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));


    }

   
 }

?>