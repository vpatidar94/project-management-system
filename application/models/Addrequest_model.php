<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addrequest_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	function insertRequest($data){
		 //$this->load->database();
		$this->db->insert("requests",$data);
        
       
	}
	
	/*-------------------------------FUNCTION FOR VIEW ALL REQUESTS-----------------------------------*/
	function fetchRequests($limit,$offset) {
		//$end = $limit+$offset;
		$this->db->select('requests.*, projects.project_title as project_title_name, members.member_name as mem_name , value_settings.name as request_type_name ');
		$this->db->from('requests');
		$this->db->join('projects', 'projects.pid = requests.project');
		$this->db->join('members', 'members.mid = requests.member_name');
		$this->db->join('value_settings', 'value_settings.id = requests.request_type');
		$this->db->limit($limit,$offset);
        $rs = $this->db->get();
		$all_data = $rs->result_array();
		//echo $this->db->last_query();die;
		foreach($all_data as $k=>$v){
			$this->db->select('GROUP_CONCAT(assests.assest_title) as assets_type_name');
			$this->db->from('assests');
			$this->db->where("aid in ($v[request_assest])");
			$rs = $this->db->get();
			$result = $rs->result_array();
			$all_data[$k]['assets_type_name'] = $result[0]['assets_type_name'];
		}
		//echo $this->db->last_query();
		//print_r($all_data);die;
		
	
		return $all_data;
	}
	public function record_count() {
        return $this->db->count_all("requests");
    }
	
	
	/*--------------------------END FUNCTION FOR VIEW ALL REQUESTS------------------------------------*/
	
	
	//FUNCTION FOR EDIT
	function Editrequests($data) {
		$sql = "SELECT * FROM requests WHERE rid='$data' ";
		$query= $this->db->query($sql);
		$result= $query->result_array();
        return $result;		
	}
	
	function Edit_requests($data) {
		$this->db->where('rid', $data['rid']); 
        $this->db->update('requests', $data); 
		
	}
	//END FUNCTION FOR EDIT
	
	//OPTIONS FOR REQUEST TYPE
	function fetchRequesttype() {
		$sql = "SELECT * FROM value_settings WHERE value='4' ";
		$query = $this->db->query($sql);
		$result= $query->result_array();
		return $result;
	}
	
	//END OPTIONS FOR REQUEST TYPE
	
	//get asset option for project
	function getAssetoptions($option) {
		$this->db->select('assest_title, aid');
		$this->db->from('assests');
		$this->db->where('project =', $option);
	    $rs= 	$this->db->get();
		$result = $rs->result_array();
		
		return $result;
	}
	function getProject() {
		$sql= "SELECT pid, project_title FROM projects";
		$query= $this->db->query($sql);
		$result = $query->result_array();
		//print_r($result);
		return $result;
	}
	// end get asset option for project
function viewTemplate($mid,$rid,$aid,$pid) {
	$this->db->select('member_name');
	$this->db->from('members');
	$this->db->where('mid=', $mid);
	$rs= $this->db->get();
	$data['member_name'] = $rs->result_array();
	
	$this->db->select('name');
	$this->db->from('value_settings');
	$this->db->where('id=', $rid);
	$rs1= $this->db->get();
	$data['request_type'] = $rs1->result_array();
		//print_r($data['request_type']);
		
		
	$this->db->select('project_title');
	$this->db->from('projects');
	$this->db->where('pid=', $pid);
	$rs2= $this->db->get();
	$data['project_title'] = $rs2->result_array();
		//print_r($data['project_title']);
	//$ass= array();

	$ass = explode(",","$aid");
	$arr = array();
	$m= 0;
	foreach($ass as $i) {
		$m++;
	$this->db->select('assest_title, assest_link, description');
	$this->db->from('assests');
	$this->db->where('aid=', $i);
	$rs3= $this->db->get();
	array_push($arr, $rs3->result_array());
	}
	$data['assest_name'] = $arr;
	$data['num'] = $m;
	//print_r($data);
	return $data;
}
	function Lasttask() {
		$this->db->select_max('rid');
		$this->db->from('requests');
		$rs= $this->db->get();
		$result= $rs->result_array();
		return $result;
		//print_r($result);
	}
	
}
?>
