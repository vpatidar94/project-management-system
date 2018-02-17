<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addmember_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	function insertMember($data){
		$ins= $this->db->insert('members',$data);
       
    }
	
	/*-------------------------------FUNCTION FOR VIEW ALL MEMBERS-----------------------------------*/
	function fetchMembers($limit,$offset) {
			 $this->db->select('members.* , value_settings.name as member_type_name');
        $this->db->from('members');
		$this->db->join('value_settings', 'value_settings.id = members.member_type' );
        $this->db->order_by('mid','desc');
        $this->db->limit($limit,$offset);
        $rs = $this->db->get();
        $result = $rs->result_array();
		return $result;
		//print_r($result);
	}
	function fetchMembersAll() {
		$this->db->select('*');
		$this->db->from('members');
		$rs = $this->db->get();
		$result = $rs->result_array();
		return $result;
	}
	
	
	public function record_count() {
        return $this->db->count_all("members");
    }
	
	
	/*--------------------------END FUNCTION FOR VIEW ALL MEMBERS------------------------------------*/
	
	
	//EDIT MEMBER
	function Editmembers($data) {
		$sql= "SELECT * FROM members WHERE mid= '$data'";
		$query= $this->db->query($sql);
		$result= $query->result_array();
		return $result;
		
	}
	
	function Edit_members($data) {
		$this->db->where('mid', $data['mid']); 
        $this->db->update('members', $data); 
		
	}
	//END EDIT MEMBER
	
	//ADD MEMBER OPTIONS
	function fetchMembertype() {
		$sql = "SELECT * FROM value_settings WHERE value= '3'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	//END ADD MEMBER OPTIONS
	
	
	
	
}
?>
