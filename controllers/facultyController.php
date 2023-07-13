<?php
defined('BASEPATH')or exit('no direct script allowed');
class facultyController extends CI_Controller{

    //view faculty using id
    public function viewFacultybyID($id){
        $this->load->model('facultyModel');
        $result=$this->facultyModel->getFacultyID($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


    //view all faculty
    public function viewAllFaculty(){
        $this->load->model('facultyModel');
        $result=$this->facultyModel->getfaculty();

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    //add faculty
    public function addfaculty(){

        if($this->input->server('REQUEST_METHOD')==='POST'){

            $this->load->model('facultyModel');


            $code=$this->input->post('code');
            $name=$this->input->post('name');
            $university_code=$this->input->post('university_code');
            $status=$this->input->post('status');

            $this->facultyModel->insertfaculty($code,$name,$university_code,$status);
            $response=array('status'=>'success','message'=>'Faculty added');
        }else{
            
            $response=array('status'=>'success','massage'=>'Invalied RequestMethod');

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    //delete
    public function delete($id)
    {
        $this->load->model('facultyModel');
        $result=$this->facultyModel->deletefaculty($id);

        if ($result) {
			$response = array('status' => 'success', 'message' => 'Record deleted successfully');
		} else {
			$response = array('status' => 'error', 'message' => 'Failed to delete record');
		}

        $this->output->set_content_type('application/json')->set_output(json_encode($response));

    }

    //edit
    public function edit($id){

      

        if($this->input->server('REQUEST_METHOD') ==='POST'){   
            $code=$this->input->post('code');
            $name=$this->input->post('name');
            $university_code=$this->input->post('university_code');
            $status=$this->input->post('status');
            
            $this->load->model('facultyModel');
            
            $this->facultyModel->editfaculty($id,$code,$name,$university_code,$status);
            $response = array('status' => 'success', 'message' => 'University Edit successfully');
    
            }
            else{

                $response = array('status' => 'success', 'message' => 'not valid method');
    
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));


    }

    




    

}

?>