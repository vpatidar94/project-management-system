<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addasset_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	
	function getProject() {
		$sql= "SELECT project_title,pid FROM projects";
		$query= $this->db->query($sql);
		$result = $query->result_array();
		//print_r($result);
		return $result;
	}
	
	function insertAsset($data){
		 //$this->load->database();
		$this->db->insert('assests',$data);
        
       
	}
	
	
	/*-------------------------------FUNCTION FOR VIEW ALL ASSESTS-----------------------------------*/
	function fetchAssets($limit,$offset) {
		$this->db->select('assests.*,projects.project_title as project_title_name');
        $this->db->from('assests');
		$this->db->join('projects', 'projects.pid = assests.project');
        $this->db->order_by('aid','desc');
        $this->db->limit($limit,$offset);
        $rs = $this->db->get();
        $result = $rs->result_array();
		return $result;
		//print_r($result);
	}
	public function record_count() {
        return $this->db->count_all("assests");
    }
	
	
	
	/*--------------------------END FUNCTION FOR VIEW ALL ASSESTS------------------------------------*/
	
	/*-------------------------- FUNCTION FOR EDIT ASSESTS------------------------------------*/
	function Editassets($data) {
		//print_r($data);
		$sql = "SELECT * FROM assests WHERE aid= '$data'";
		$query= $this->db->query($sql);
		$result = $query->result_array();
		return $result;
		
	}
	
	function Edit_assets($data) {
		$this->db->where('aid', $data['aid']); 
        $this->db->update('assests', $data); 
	}
	/*--------------------------END FUNCTION FOR EDIT ASSESTS------------------------------------*/
	
		/*--------------------------ADD ASSET TYPES------------------------------------*/
		function fetchAssettype() {
			$sql= "SELECT assest_type FROM assests";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
		}
			/*--------------------------END ADD ASSET TYPES------------------------------------*/


	
	
	
}
?>
