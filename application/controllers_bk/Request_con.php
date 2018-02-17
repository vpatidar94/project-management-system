<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_con extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
 
 }

/*-----------------------------------ADD REQUEST--------------------------------------------*/
	public function addrequest() {
		if($this->session->userdata('username')){
		$this->load->model('Addasset_model');
		$this->load->model('Addrequest_model');
		$this->load->model('Addmember_model');
		$data['query']= $this->Addasset_model->getProject();
		$data['option_request'] = $this->Addrequest_model->fetchRequesttype();
		$data['option_asset'] = $this->Addasset_model->fetchAssettype();
		$data['option_member'] = $this->Addmember_model->fetchMembers();
 		$data['title']  = "Add New Request";
		$this->load->view('header.php', $data);
		$this->load->view('add_request.php', $data);
		$this->load->view('footer.php', $data);
		}else{
			redirect('welcome/index','refresh');
		}
	}
	
	public function add_request() {
		$this->load->model('Addrequest_model');
		$this->load->library('form_validation');
		
		//validations
		 $this->form_validation->set_rules('project', 'Select Project', 'required');
		 //$this->form_validation->set_rules('request_assest','Request Assests','required');
		 //$this->form_validation->set_rules('request_type','Request Type','required');
		 //$this->form_validation->set_rules('request_title','Request Title','required');
		  //$this->form_validation->set_rules('description','Request Description','required');
		if ($this->form_validation->run() == FALSE)
                {
                   $this->session->set_userdata('error',1);
					$this->session->set_userdata('message','Invalid Details');
                    redirect('addrequest', 'refresh');
                }
		else{
		$data['query'] = array(
		'project' => $this->input->post('project'),
		'request_assest' => $this->input->post('request_assest'),
		'request_type' => $this->input->post('request_type'),
		'request_title' => $this->input->post('request_title'),
		'member_name' => $this->input->post('member_name'),
		'description' => $this->input->post('description'),
		'request_status' => $this->input->post('request_status')
		
		);
		$data['title'] = "Request Template";
		$this->Addrequest_model->insertRequest($data['query']);
		$this->load->view('header', $data);
		$this->load->view('request_template', $data);
		$this->load->view('footer', $data);
		}
	}
	
	//VIEW REQUESTS
	public function viewrequest() {
		if($this->session->userdata('username')) {
		$this->load->model('Addrequest_model');
		$data['query']= $this->Addrequest_model->fetchRequests();
		$data['title']  ="View All Requests";
		$this->load->view('header',$data);
		$this->load->view('all_requests', $data); 
		$this->load->view('footer',$data); 
		} else{
			redirect('welcome/index','refresh');
			
		}
	}
	
	
	
	//END VIEW REQUESTS
	
	
	//EDIT REQUEST
	public function editrequest() {
		if($this->session->userdata('username')) {
			$data['title'] = "Edit Request";
			$rid= $this->uri->segment(2);
			$this->load->model('Addrequest_model');
			$this->load->model('Addasset_model');
			$this->load->model('Addmember_model');
			$result = $this->Addrequest_model->Editrequests($rid);
			$data['option_member'] = $this->Addmember_model->fetchMembers();
			$data['rid'] =  $result[0]['rid'];
			$data['project'] =  $result[0]['project'];
			$data['request_assest'] =  $result[0]['request_assest'];
			$data['request_type'] =  $result[0]['request_type'];
			$data['request_title'] =  $result[0]['request_title'];
			$data['description'] =  $result[0]['description'];
			$data['member_name'] =  $result[0]['member_name'];
			$data['request_status'] =  $result[0]['request_status'];
			
			
			$data['query1'] = $this->Addasset_model->getProject();
			$data['option_request'] = $this->Addrequest_model->fetchRequesttype();
			$data['option_asset'] = $this->Addasset_model->fetchAssettype();		
			$this->load->view('header', $data);
			$this->load->view('edit_request', $data);
			$this->load->view('footer', $data);
			
			
			
			}
		else {
			redirect('welcome/index','refresh');
		}
	}
	
	public function edit_request() {
		$rid= $this->uri->segment(2);
	    $this->load->model('Addrequest_model');
		
		$this->load->library('form_validation');
		
		//validations
		 $this->form_validation->set_rules('project', 'Select Project', 'required');
		 //$this->form_validation->set_rules('request_assest','Request Assests','required');
		 //$this->form_validation->set_rules('request_type','Request Type','required');
		 //$this->form_validation->set_rules('request_title','Request Title','required');
		  //$this->form_validation->set_rules('description','Request Description','required');
		if ($this->form_validation->run() == FALSE)
                {
                   $this->session->set_userdata('error',1);
					$this->session->set_userdata('message','Invalid Details');
                    redirect('editrequest'.$rid.'' , 'refresh');
                }
		else{
		$data = array(
		'project' => $this->input->post('project'),
		'request_assest' => $this->input->post('request_assest'),
		'request_type' => $this->input->post('request_type'),
		'request_title' => $this->input->post('request_title'),
		'description' => $this->input->post('description'),
		'rid' => $rid ,
		'request_status' => $this->input->post('request_status')
		);
		$this->Addrequest_model->Edit_requests($data);
		redirect('viewrequest', 'refresh');
		}
		
		
		
		
		

		
	}
	
	// END EDIT REQUEST
	
/*----------------------------------END ADD REQUEST---------------------------------------------*/
}