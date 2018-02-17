<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
 
 }
 
	/*-----------------------------------START LOGIN AND INDEX---------------------------------*/ 
	public function index()
	{
		$this->load->model('Home_model');
		$this->load->model('Addnew_model');
		$this->load->model('Addrequest_model');

		$data['query']= $this->Home_model->fetchRow();
		$data['allprojects']= $this->Home_model->fetchProjects();
		$data['all_task'] = $this->Addrequest_model->record_count();
		$this->load->library('session');
		$data['title']  ="Web Medic";
		if($this->session->userdata('username') != "") {
		$this->load->view('header',$data);
		$this->load->view('project',$data);
		$this->load->view('footer',$data);
		}else { 
		$this->load->view('login',$data); 
		}
	}
	public function login() {
		$this->load->model('Login_model');
		$data['title']  ="Login: Web Medic";
		$result = $this->Login_model->checkLogin();
		//print_r($result);
		if(!empty($result)) {
		//$this->load->library('session');
		$session_data = array(
		'username' => $result[0]['username']
		);
		$this->session->set_userdata($session_data);
	     redirect('welcome/index', 'refresh');
		} else {
			$this->load->view('login',$data);
		}
		
	}
	
	public function logout() {
		$this->session->sess_destroy();

		redirect('welcome/index', 'refresh');
	}
	/*----------------------------------------END LOGIN AND INDEX------------------------------*/
	
	
	
}
