	<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_con extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
  $this->load->library('pagination');

 
 }
	/*---------------------------------------ADD PROJECT ----------------------------------------*/
	
	public function addproject() {
		if($this->session->userdata('username') ) {
		$data['title']  ="Add New Project";
		$this->load->model('Addnew_model');
		$data['query']= $this->Addnew_model->fetchProjectcms();
	
			$this->load->view('header',$data);
			$this->load->view('add_project',$data);
			$this->load->view('footer',$data);
		} else {
			redirect('welcome/index', 'refresh');
		}
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
                    redirect('addproject', 'refresh');
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
		'project_instruction'=> $this->input->post('project_instruction'),
		'project_status'=> $this->input->post('project_status')
 		);
		
		$this->Addnew_model->insertProject($data);
		 redirect('viewproject', 'refresh');
		
		
		
				}
		//print_r($data); die;
		
	}
	
	//VIEW PROJECTS
	public function viewproject() {
	if($this->session->userdata('username')) {
	$this->load->model('Addnew_model');
		
		
		//pagination
		$config = array();
        $config["base_url"] = base_url() . "viewproject";
        $config["total_rows"] = $this->Addnew_model->record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 2;
		$config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="pg-next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pg-prev">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		//pagination
		$data['query']= $this->Addnew_model->fetchProjects($config["per_page"], $page);
		//print_r($data['query']);
		$seg =  $this->uri->segment(2);
		//print($seg);
		 $data["links"] = $this->pagination->create_links();

		
		$data['title']  ="View All Projects";
		$this->load->view('header',$data);
		$this->load->view('all_projects', $data);
		$this->load->view('footer',$data);
		} else {
			redirect('welcome/index','refresh');
		}
	}
	
	
	
	//END VIEW PROJECTS
	
	
	//EDIT PROJECTS
	public function editproject() {
	
		$data['title'] = "Edit Project";
		
		$pid = $this->uri->segment(2);
		$this->load->model('Addnew_model');
		$result = $this->Addnew_model->editProjects($pid);
		$data['project_title'] = $result[0]['project_title'];
		$data['project_url'] = $result[0]['project_url'];
		$data['ftp_server'] = $result[0]['ftp_server'];
		$data['ftp_username'] = $result[0]['ftp_username'];
		$data['ftp_password'] = $result[0]['ftp_password'];
		$data['cms_type'] = $result[0]['cms_type'];
		$data['c_url'] = $result[0]['c_url'];
		$data['c_username'] = $result[0]['c_username'];
		$data['c_password'] = $result[0]['c_password'];
		$data['admin_url'] = $result[0]['admin_url'];
		$data['admin_username'] = $result[0]['admin_username'];
		$data['admin_password'] = $result[0]['admin_password'];
		$data['project_description'] = $result[0]['project_description'];
		$data['project_instruction'] = $result[0]['project_instruction'];
		$data['pid'] = $result[0]['pid'];
		$data['project_status'] = $result[0]['project_status'];
		// print_r($result); 
		$data['cms']= $this->Addnew_model->fetchProjectcms();
		$this->load->view('header', $data);
		$this->load->view('edit_project', $data);
		$this->load->view('footer', $data);
	}
	
	public function edit_project() {
		$pid= $this->uri->segment(2);
		$this->load->model('Addnew_model');
		//$this->Addnew_model->edit_Projects($pid);
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
                    redirect('addproject', 'refresh');
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
		'project_instruction'=> $this->input->post('project_instruction'),
		'pid' => $pid ,
			'project_status' => $this->input->post('project_status'),
 		);
		$this->Addnew_model->edit_Projects($data);
		redirect('viewproject','refresh');
				}
		
	}
	
	//END EDIT PROJECTS

	
	
	
/*--------------------------------------END ADD PROJECT-----------------------------------------*/
}