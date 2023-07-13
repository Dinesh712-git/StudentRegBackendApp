<?php
defined('BASEPATH')or exit('no direct script allowed');
class programController extends CI_Controller{

    //view programe using id
    public function viewProgrambyID($id){
        $this->load->model('programModel');
        $result=$this->programModel->getProgrambyID($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


    //view all programe
    public function viewAllProgram(){
        $this->load->model('programModel');
        $result=$this->programModel->getprogram();

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    //add programe
    public function addProgram(){

        if($this->input->server('REQUEST_METHOD')==='POST'){

            $this->load->model('programModel');


            $code=$this->input->post('code');
            $name=$this->input->post('name');
            $status=$this->input->post('status');

            $this->programModel->insertProgram($code,$name,$status);
            $response=array('status'=>'success','message'=>'Progam added');
        }else{
            
            $response=array('status'=>'success','massage'=>'Invalied RequestMethod');

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    //delete
    public function delete($id)
    {
        $this->load->model('programModel');
        $result=$this->programModel->deletefprogrm($id);

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
            $status=$this->input->post('status');
            
            $this->load->model('programModel');
            
            $this->programModel->editprogram($id,$code,$name,$status);
            $response = array('status' => 'success', 'message' => 'University Edit successfully');
    
            }
            else{

                $response = array('status' => 'success', 'message' => 'not valid method');
    
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));


    }




    

}

?>