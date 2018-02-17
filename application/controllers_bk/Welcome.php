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
		$data['query']= $this->Home_model->fetchRow();
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
	
	/*---------------------------------------ADD PROJECT ----------------------------------------
	
	public function addproject() {
		$data['title']  ="Add New Project";
		//$this->load->library('session');
			$this->load->view('header',$data);
			$this->load->view('addnew',$data);
			$this->load->view('footer',$data);
	}
	public function add_project() {
		$this->load->model('Addnew_model');
		
		//validations
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('project_title', 'Project Title', 'required');
		 //$this->form_validation->set_rules('ftp_server','FTP Server','required');
		// $this->form_validation->set_rules('project_url','Project URL','required|valid_ip');
		 //$this->form_validation->set_rules('ftp_username','FTP Username','required');
		 //$this->form_validation->set_rules('cms_type','Project CMS type','required');
		 //$this->form_validation->set_rules('ftp_password','FTP Password','required');
		 //$this->form_validation->set_rules('c_url','C Panel URL','required|valid_ip');
		 //$this->form_validation->set_rules('admin_url','Admin Panel URL','required');
		 //$this->form_validation->set_rules('c_username','C Panel Username','required');
		 //$this->form_validation->set_rules('admin_username','Admin username','required');
		 //$this->form_validation->set_rules('c_password','C Panel Password','required');
		 //$this->form_validation->set_rules('admin_password','Admin Panel Password','required');
		 //$this->form_validation->set_rules('project_description','Enter Project Description','required');
		 //$this->form_validation->set_rules('project_instruction','Project Instructions','required');
		 

		 if ($this->form_validation->run() == FALSE)
                {
					$this->session->set_userdata('error',1);
					$this->session->set_userdata('message','Invalid Details');
                    redirect('welcome/addproject', 'refresh');
                } else{ 
		$data = array( 
		'project_title' => $this->input->post('project_title'),
		'ftp_server' => $this->input->post('ftp_server'),
		'project_url'=> $this->input->post('project_url'),
		'ftp_username'=> $this->input->post('ftp_username'),
		'cms_type'=> $this->input->post('cms_type'),
		'ftp_password'=> $this->input->post('ftp_password'),
		'c_url'=> $this->input->post('c_url'),
		'admin_url'=> $this->input->post('admin_url'),
		'c_username'=> $this->input->post('c_username'),
		'admin_username'=> $this->input->post('admin_username'),
		'c_password'=> $this->input->post('c_password'),
		'admin_password'=> $this->input->post('admin_password'),
		'project_description'=> $this->input->post('project_description'),
		'project_instruction'=> $this->input->post('project_instruction')
 		);
		
		$this->Addnew_model->insertProject($data);
		 redirect('welcome/viewproject', 'refresh');
		
		
		
				}
		//print_r($data); die;
		
	}
	
	//VIEW PROJECTS
	public function viewproject() {
		$this->load->model('Addnew_model');
		$data['query']= $this->Addnew_model->fetchProjects();
		$data['title']  ="View All Projects";
		$this->load->view('header',$data);
		$this->load->view('allprojects', $data);
		$this->load->view('footer',$data);
	}
	
	
	
	//END VIEW PROJECTS
	
	
	//EDIT PROJECTS
	public function editproject() {
		$data['title'] = "Edit Project";
		$pid = $this->uri->segment(3);
		$this->load->model('Addnew_model');
		$data['query'] = $this->Addnew_model->editProjects($pid);
		$this->load->view('header', $data);
		$this->load->view('edit_project', $data);
		$this->load->view('footer', $data);
	}
	
	public function edit_project() {
		$pid= $this->uri->segment(3);
		$this->load->model('Addnew_model');
	}
	
	//END EDIT PROJECTS  */

	
	
	
/*--------------------------------------END ADD PROJECT-----------------------------------------*/
	
	
	/*--------------------------------------ASSEST START-----------------------------------------
	
	public function addassest() {
		$this->load->model('Addassest_model');
		$data['query']= $this->Addassest_model->getProject();
		//print_r($data);
		$data['title']  ="Add New Assest";
		$this->load->view('header',$data);
		$this->load->view('addnewassest.php',$data);
		$this->load->view('footer', $data);
	}
	public function add_assest() {
		$this->load->model('Addassest_model');
		
		//validations
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('project', 'Select Project', 'required');
		 //$this->form_validation->set_rules('assest_type','Assest Type','required');
		// $this->form_validation->set_rules('assest_title','Assest Title','required');
		// $this->form_validation->set_rules('description','Assest Description','required');
		if ($this->form_validation->run() == FALSE)
                {
                 $this->session->set_userdata('error',1);
					$this->session->set_userdata('message','Invalid Details');
                    redirect('welcome/addassest', 'refresh');
                }
		else{		
		 
		 
		$data = array(
		'project' => $this->input->post('project'),
		'assest_type' => $this->input->post('assest_type'),
		'assest_title' => $this->input->post('assest_title'),
		'description' => $this->input->post('description')
 		);
		$this->Addassest_model->insertAssest($data);
		 redirect('welcome/viewassest', 'refresh');
		}
	}
	
	//VIEW ASSESTS
	public function viewassest() {
		$this->load->model('Addassest_model');
		$data['query']= $this->Addassest_model->fetchAssests();
		$data['title']  ="View All Assests";
		$this->load->view('header',$data);
		$this->load->view('allassests', $data);
		$this->load->view('footer',$data);
	}
	
	
	
	//END VIEW ASSESTS */
	
	
	
	/*----------------------------------END ASSEST----------------------------------------------*/
	
	
	/*-----------------------------------ADD REQUEST--------------------------------------------
	public function addrequest() {
		$this->load->model('Addassest_model');
		$data['query']= $this->Addassest_model->getProject();
		$data['title']  = "Add New Request";
		$this->load->view('header.php', $data);
		$this->load->view('addnewrequest.php', $data);
		$this->load->view('footer.php', $data);
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
                    redirect('welcome/addrequest', 'refresh');
                }
		else{
		$data = array(
		'project' => $this->input->post('project'),
		'request_assest' => $this->input->post('request_assest'),
		'request_type' => $this->input->post('request_type'),
		'request_title' => $this->input->post('request_title'),
		'description' => $this->input->post('description')
		);
		$this->Addrequest_model->insertRequest($data);
		redirect('welcome/viewrequest', 'refresh');
		}
	}
	
	//VIEW REQUESTS
	public function viewrequest() {
		$this->load->model('Addrequest_model');
		$data['query']= $this->Addrequest_model->fetchRequests();
		$data['title']  ="View All Requests";
		$this->load->view('header',$data);
		$this->load->view('allrequests', $data);
		$this->load->view('footer',$data);
	}
	
	
	
	//END VIEW REQUESTS */
	
/*----------------------------------END ADD REQUEST---------------------------------------------*/



/* ------------------- ADD MEMBER --------------------  
	public function addmember() {
		
		$data['title'] = "Add New Member";
		$this->load->view('header.php', $data);
		$this->load->view('addnewmember.php', $data);
		$this->load->view('footer.php', $data);
		}
    public function add_member() {
		$this->load->model('Addmember_model');
		$this->load->library('form_validation');
		
		//validations 
		 $this->form_validation->set_rules('member_name', 'Member Name', 'required');
		 $this->form_validation->set_rules('member_email','Member Email','required');
		// $this->form_validation->set_rules('member_type','Member Type','required');
		
		if ($this->form_validation->run() == FALSE)
                {
                  $this->session->set_userdata('error',1);
				  $this->session->set_userdata('message','Invalid Details');
                   redirect('welcome/addmember', 'refresh');
                }else {
		$data = array(
		'member_name' => $this->input->post('member_name'),
		'member_email' => $this->input->post('member_email'),
		'member_type' => $this->input->post('member_type')
		
				); 
				$this->load->model('Addmember_model'); 
	$sent = $this->Addmember_model->insertMember($data);
	 redirect('welcome/viewmember', 'refresh');
		
				}
				
				
				
				
				
	}		
	
	//VIEW MEMBERS
	public function viewmember() {
		$this->load->model('Addmember_model');
		$data['query']= $this->Addmember_model->fetchMembers();
		$data['title']  ="View All Members";
		$this->load->view('header',$data);
		$this->load->view('allmembers', $data);
		$this->load->view('footer',$data);
	}
	
	
	
	//END VIEW MEMBERS */
	
	
	/* ------------------- ADD MEMBER --------------------  */
		
	
}
