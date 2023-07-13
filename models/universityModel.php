<?php
defined('BASEPATH')or exit('no direct script allowed');

class universityModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
  
    public function getUniversity()
	{
		$query = $this->db->get('tbl_master_university');
		return $query->result();
	}

    public function deleteuniversity($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('tbl_master_university');
    }

    public function adduniversity($code,$name,$address,$status)
    {
        $datauni=array(
            
            'code'=>$code,
            'name'=>$name,
            'address'=>$address,
            'status'=>$status
        );

        return $this->db->insert('tbl_master_university',$datauni);
        

    }

    public function edituniversity($id,$code,$name,$address,$status){

        $response = array('status'=>false,'message'=>"");
        if(!$id||!$code||!$name||!$address||!$status){
            $response['message']="incomplete";
            return $response;
        }

        $datauni=array(
            
            'code'=>$code,
            'name'=>$name,
            'address'=>$address,
            'status'=>$status
        );
        
        $this->db->where('id',$id);
        return $result = $this->db->update('tbl_master_university',$datauni);

        if($result){
            $response['status']=true;
        }else{
            $response['message']="faill update";
        }

    }

    

    



}

?>