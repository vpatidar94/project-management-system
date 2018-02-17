<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Addvalue_con extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
 
 }
 
 public function addvalue() {
	$data['title'] = "Add Options"; 
	$this->load->view('header', $data);
	$this->load->view('add_option', $data);
	$this->load->view('footer', $data);
	 
 }
 public function add_value() {
	$this->load->model('Addvalue_model');
	$value = $this->input->post('value');
	if($value == '1') {
		$type = "project_cms";
	}
	if($value == '2') {
		$type = "project_asset";
	}
	if($value == '3') {
		$type = "member_type";
	}
	if($value == '4') {
		$type = "member_request";
	}
	$data = array(
		'value' => $this->input->post('value'),
		'name' => $this->input->post('name'),
		'type' => $type
		//'member_type' => $this->input->post('member_type')
		
				); 
				//print_r($data);
	$this->Addvalue_model->insertValues($data); 
	redirect('addvalue','refresh');
	 
 }
 
}