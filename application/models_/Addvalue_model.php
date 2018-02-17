<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addvalue_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	function insertValues($data){
		//print_r($data); 
		$ins= $this->db->insert('value_settings',$data);
       
    }
}