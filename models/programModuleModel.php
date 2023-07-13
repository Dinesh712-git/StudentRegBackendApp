<?php
defined('BASEPATH')or exit('no direct script allowed');

class programModuleModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
    //show all program module
    public function getprogramModule()
	{
		$query = $this->db->get('tbl_master_program_module');
		return $query->result();
	}

    //show one by one
    public function getProgramModulebyID($id){

        $this->db->where('id',$id);
        $query = $this->db->get('tbl_master_program_module');
		return $query->result();
    }

    //add progrme module
    public function insertProgramModule($code,$name,$program_code,$status){
        
        $dataset=array(
            'code'=>$code,            
            'name'=>$name,
            'program_code'=>$program_code,
            'status'=>$status

        );

        return $this->db->insert('tbl_master_program_module',$dataset);
    }

    //delete

    public function deletefprogrmModule($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('tbl_master_program_module');
    }


    //edit
    public function editprogramModule($id,$code,$name,$program_code,$status){

        $dataset=array(

            'code'=>$code,            
            'name'=>$name,
            'program_code'=>$program_code,
            'status'=>$status

        );

        $this->db->where('id',$id);
        $this->db->update('tbl_master_program_module',$dataset);
    }




    

    



}

?>