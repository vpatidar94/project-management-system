<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	
	
	
	function fetchRow() {
		$sql="SELECT count(*) FROM projects";
		$query= $this->db->query($sql);
		$result= $query->result_array();
		return $result;
	}
	function fetchProjects() {
		$sql="SELECT * FROM projects order by pid desc limit 5";
		$query= $this->db->query($sql);
		$result= $query->result_array();
		return $result;
	}
	
	
	
	
	
}
?>
