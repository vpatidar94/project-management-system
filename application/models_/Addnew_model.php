<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addnew_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	/*-------------------------------FUNCTION FOR ADD NEW PROJECT-----------------------------------*/
	function insertProject($data){
		
        $this->db->insert('projects',$data);
       
	}
	/*------------------------------END FUNCTION FOR ADD NEW PROJECT--------------------------------*/
	
	
	/*-------------------------------FUNCTION FOR VIEW ALL PROJECTS-----------------------------------*/
	function fetchProjects($limit,$offset) {
		 $this->db->select('*');
        $this->db->from('projects');
        $this->db->order_by('pid','desc');
        $this->db->limit($limit,$offset);
        $rs = $this->db->get();
        $result = $rs->result_array();
		return $result;
		//print_r($result);
	}
	public function record_count() {
        return $this->db->count_all("projects");
    }
	
	
	
	/*--------------------------END FUNCTION FOR VIEW ALL PROJECTS------------------------------------*/
	
	
		/*-------------------------------FUNCTION FOR EDIT PROJECTS-----------------------------------*/
		function editProjects($data) {
			$sql= "SELECT * FROM projects WHERE pid='$data' ";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
		function edit_Projects($data) {
			//print_r($data);
			$this->db->where('pid', $data['pid']);
             $this->db->update('projects', $data); 
			//echo $pid;
		}

	/*-------------------------------END FUNCTION FOR EDIT PROJECTS-----------------------------------*/
	
	function fetchProjectcms() {
		$sql = "SELECT * FROM value_settings WHERE value='1'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result; 
	}
	

}
?>
