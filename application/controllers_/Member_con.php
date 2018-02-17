<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_con extends CI_Controller {


	  function __Construct(){
  parent::__Construct ();
 	  $this->load->library('pagination');

 }


/* ------------------- ADD MEMBER --------------------  */
	public function addmember() {
		if($this->session->userdata('username')) {
			$this->load->model('Addmember_model');
			$data['member_type']= $this->Addmember_model->fetchMembertype();
		$data['title'] = "Add New Member";
		$this->load->view('header.php', $data);
		$this->load->view('add_member.php', $data);
		$this->load->view('footer.php', $data);
		} else {
			redirect('welcome/index','refresh');
		}
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
                   redirect('addmember', 'refresh');
                }else {
		$data = array(
		'member_name' => $this->input->post('member_name'),
		'member_email' => $this->input->post('member_email'),
		'member_profile' => $this->input->post('member_profile'),
		'member_type' => $this->input->post('member_type')
		
				); 
				$this->load->model('Addmember_model'); 
	$sent = $this->Addmember_model->insertMember($data);
	 redirect('viewmember', 'refresh');
		
				}
				
				
				
				
				
	}		
	
	//VIEW MEMBERS
	public function viewmember() {
		if($this->session->userdata('username')) {
		$this->load->model('Addmember_model');
		
		$config = array();
        $config["base_url"] = base_url() . "viewproject";
        $config["total_rows"] = $this->Addmember_model->record_count();
        $config["per_page"] = 10;
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
		$data['query']= $this->Addmember_model->fetchMembers($config["per_page"], $page);
		//print_r($data['query']);
		$seg =  $this->uri->segment(2);
		//print($seg);
		 $data["links"] = $this->pagination->create_links();
		
		
		
		
		
		//$data['query']= $this->Addmember_model->fetchMembers();
		$data['title']  ="View All Members";
		$this->load->view('header',$data);
		$this->load->view('all_members', $data);
		$this->load->view('footer',$data);
		} else {
			redirect('welcome/index','refresh');
		}
	}
	
	
	
	//END VIEW MEMBERS
	
	//EDIT MEMBER
	public function editmember() {
		$this->load->model('Addmember_model');
		$data['query']= $this->Addmember_model->fetchMembertype();
		$mid = $this->uri->segment(2);
		if($this->session->userdata('username')) {
			$this->load->model('Addmember_model');
			$data['title'] = "Edit Member";
			$result = $this->Addmember_model->Editmembers($mid);
			$data['mid'] = $result[0]['mid'];
			$data['member_name'] = $result[0]['member_name'];
			$data['member_email'] = $result[0]['member_email'];
			$data['member_type'] = $result[0]['member_type'];
			$data['member_profile'] = $result[0]['member_profile'];
			
			$this->load->view('header',$data);
		    $this->load->view('edit_member', $data);
		    $this->load->view('footer',$data);
			
		} else {
			redirect('welcome/index','refresh');
		}
	}
	
	public function edit_member() {
		$mid = $this->uri->segment(2);
		//validations 
		$this->load->library('form_validation');
		 $this->form_validation->set_rules('member_name', 'Member Name', 'required');
		 $this->form_validation->set_rules('member_email','Member Email','required');
		// $this->form_validation->set_rules('member_type','Member Type','required');
		
		if ($this->form_validation->run() == FALSE)
                {
                  $this->session->set_userdata('error',1);
				  $this->session->set_userdata('message','Invalid Details');
                   redirect('editmember'.$mid.'' , 'refresh');
                }else {
		$data = array(
		'member_name' => $this->input->post('member_name'),
		'member_email' => $this->input->post('member_email'),
		'member_type' => $this->input->post('member_type'),
		'member_profile' => $this->input->post('member_profile'),
		'mid'   => $mid
				); 
				$this->load->model('Addmember_model'); 
	$this->Addmember_model->Edit_members($data);
	 redirect('viewmember', 'refresh');
		
				}
		
		
	}
	//END EDIT MEMBER
	function searching() {
		$data = $this->input->post('search');
		print_r($data);
		
				
	}
	
	/* ------------------- ADD MEMBER --------------------  */
}