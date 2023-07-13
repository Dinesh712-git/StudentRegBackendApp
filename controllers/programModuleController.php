<?php
defined('BASEPATH')or exit('no direct script allowed');
class programModuleController extends CI_Controller{

    //view program module using id
    public function viewProgramMbyID($id){
        $this->load->model('programModuleModel');
        $result=$this->programModuleModel->getProgramModulebyID($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }


    //view all progrm module
    public function viewAllProgramM(){
        $this->load->model('programModuleModel');
        $result=$this->programModuleModel->getprogramModule();

        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    //add program module
    public function addProgramM(){

        if($this->input->server('REQUEST_METHOD')==='POST'){

            $this->load->model('programModuleModel');

            $code=$this->input->post('code');
            $name=$this->input->post('name');
            $program_code->input->post('program_code');
            $status=$this->input->post('status');

            $this->programModuleModel->insertProgram($code,$name,$program_code,$status);
            $response=array('status'=>'success','message'=>'Progam Module added');
        }else{
            
            $response=array('status'=>'success','massage'=>'Invalied RequestMethod');

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    //delete
    public function delete($id)
    {
        $this->load->model('programModuleModel');
        $result=$this->programModuleModel->deletefprogrmModule($id);

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
            $program_code=$this->input->post('program_code');
            $status=$this->input->post('status');
            
            $this->load->model('programModuleModel');
            
            $this->programModuleModel->editprogramModule($id,$code,$name,$program_code,$status);
            $response = array('status' => 'success', 'message' => 'University Edit successfully');
    
            }
            else{

                $response = array('status' => 'success', 'message' => 'not valid method');
    
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));


    }




    

}

?>