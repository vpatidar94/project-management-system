<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
    function __construct() {
		 parent::__construct();
         //$this->load->helper('database');
	   //$this->load->database();
    }
	function checkLogin(){
		 //$this->load->database();
		  $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
		$sql= "SELECT *  FROM login WHERE username='$username' AND password='".md5($password)."' ";
		$query= $this->db->query($sql);
		$result = $query->result_array();
		return $result;
        
       
	}
}
?>
