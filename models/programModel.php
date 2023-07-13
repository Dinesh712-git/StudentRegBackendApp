<?php
defined('BASEPATH')or exit('no direct script allowed');

class programModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
    //show all program
    public function getprogram()
	{
		$query = $this->db->get('tbl_master_program');
		return $query->result();
	}

    //show one by one
    public function getProgrambyID($id){

        $this->db->where('id',$id);
        $query = $this->db->get('tbl_master_program');
		return $query->result();
    }

    //add progrme
    public function insertProgram($code,$name,$status){
        
        $dataset=array(
            'code'=>$code,            
            'name'=>$name,
            'status'=>$status

        );

        return $this->db->insert('tbl_master_program',$dataset);
    }

    //delete

    public function deletefprogrm($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('tbl_master_program');
    }


    //edit
    public function editprogram($id,$code,$name,$status){

        $dataset=array(

            'code'=>$code,            
            'name'=>$name,
            'status'=>$status

        );

        $this->db->where('id',$id);
        $this->db->update('tbl_master_program',$dataset);
    }




    

    



}

?>