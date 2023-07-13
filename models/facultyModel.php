<?php
defined('BASEPATH')or exit('no direct script allowed');

class facultyModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
    //show all faculty
    public function getfaculty()
	{
        $this->db->select('tbl_master_faculty.*,tbl_master_university.name AS university_name,tbl_master_university.address AS university_Address');
        $this->db->from('tbl_master_faculty');
        $this->db->join('tbl_master_university','tbl_master_faculty.university_code=tbl_master_university.id','inner');
		//$query = $this->db->get('tbl_master_faculty');

        $query=$this->db->get();
		return $query->result();
	}

    //show one by one
    public function getFacultyID($id){

        $this->db->where('id',$id);
        $query = $this->db->get('tbl_master_faculty');
		return $query->result();
    }

    //add faculty
    public function insertfaculty($code,$name,$university_code,$status){
        
        $dataset=array(
            'code'=>$code,            
            'name'=>$name,
            'university_code'=>$university_code,
            'status'=>$status

        );

        return $this->db->insert('tbl_master_faculty',$dataset);
    }

    //delete

    public function deletefaculty($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('tbl_master_faculty');
    }


    //edit
    public function editfaculty($id,$code,$name,$university_code,$status){

        $dataset=array(

            'code'=>$code,            
            'name'=>$name,
            'university_code'=>$university_code,
            'status'=>$status

        );

        $this->db->where('id',$id);
        $this->db->update('tbl_master_faculty',$dataset);
    }




    

    



}

?>