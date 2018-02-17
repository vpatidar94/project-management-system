<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_con extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
  $this->load->library('pagination');
 
 }

/*-----------------------------------ADD REQUEST--------------------------------------------*/
	public function addrequest() {
		if($this->session->userdata('username')){
		$this->load->model('Addasset_model');
		$this->load->model('Addrequest_model');
		$this->load->model('Addmember_model');
		$data['query']= $this->Addrequest_model->getProject();
		$data['option_request'] = $this->Addrequest_model->fetchRequesttype();
		$data['option_asset'] = $this->Addasset_model->fetchAssettype();
		//print_r($data['option_asset']);
		$data['option_member'] = $this->Addmember_model->fetchMembersAll();
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
			$target = $this->input->post('request_assest');
			 $commasaprated = implode(',' , $target); 
			
			
		$data['query'] = array(
		'project' => $this->input->post('project'),
		'request_assest' => $commasaprated,
		'request_type' => $this->input->post('request_type'),
		'request_title' => $this->input->post('request_title'),
		'member_name' => $this->input->post('member_name'),
		'description' => $this->input->post('description'),
		'request_status' => $this->input->post('request_status')
		
		);
		
		$data['title'] = "Request Template";
		$this->Addrequest_model->insertRequest($data['query']);
		redirect('viewrequest','refresh');
		
		}
	}
	
	//VIEW REQUESTS
	public function viewrequest() {
		if($this->session->userdata('username')) {
		$this->load->model('Addrequest_model');
		
		$config = array();
        $config["base_url"] = base_url() . "viewrequest";
        $config["total_rows"] = $this->Addrequest_model->record_count();
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
		
		$data['query']= $this->Addrequest_model->fetchRequests($config["per_page"], $page);
		//echo"<pre>";
		//print_r($data['query']); 
		$data["links"] = $this->pagination->create_links();
		//print_r($data["links"]);
		
		
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
			$data['option_member'] = $this->Addmember_model->fetchMembersAll();
			$data['rid'] =  $result[0]['rid'];
			$data['project'] =  $result[0]['project'];
			$option = $result[0]['project'];
			$subdata =  $result[0]['request_assest'];
			
			$data['request_assest_all']= $this->Addrequest_model->getAssetoptions($option);
		
			$data['request_assest'] = explode(",", $subdata);	
			//print_r($data['request_assest']);	
			$data['request_type'] =  $result[0]['request_type'];
			$data['request_title'] =  $result[0]['request_title'];
			$data['description'] =  $result[0]['description'];
			$data['member_name'] =  $result[0]['member_name'];
			$data['request_status'] =  $result[0]['request_status'];
			
			
			$data['query1'] = $this->Addrequest_model->getProject();
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
			$target = $this->input->post('request_assest');
			 $commasaprated = implode(',' , $target); 
		$data = array(
		'project' => $this->input->post('project'),
		'request_assest' => $commasaprated,
		'request_type' => $this->input->post('request_type'),
		'request_title' => $this->input->post('request_title'),
		'member_name' => $this->input->post('member_name'),
		'description' => $this->input->post('description'),
		'rid' => $rid ,
		'request_status' => $this->input->post('request_status')
		);
		$this->Addrequest_model->Edit_requests($data);
		redirect('viewrequest', 'refresh');
		}
		
		
		
		
		

		
	}
	
	// END EDIT REQUEST

	//VIEW TEMPLATE
public function viewtemplate() {
	$rid = $this->uri->segment('2'); 
	$this->load->model('Addrequest_model');
	$result = $this->Addrequest_model->Editrequests($rid);
	$data['rid'] =  $result[0]['rid'];
	$pid =  $result[0]['project'];
	
	$aid =  $result[0]['request_assest'];
	
	$rid =  $result[0]['request_type'];
	$data['request_title'] =  $result[0]['request_title'];
	$data['description'] =  $result[0]['description'];
	$mid =  $result[0]['member_name'];
	$data['request_status'] =  $result[0]['request_status'];
	$data['title'] = "Request Template";
	
	$res= $this->Addrequest_model->viewTemplate($mid,$rid,$aid,$pid );
	$data['member_name'] = $res['member_name'][0]['member_name'];
	$data['project_title'] = $res['project_title'][0]['project_title'];
	$data['request_type'] = $res['request_type'][0]['name'];
	$data['assest_name'] = $res['assest_name'];
	$data['num'] = $res['num'];
	//print_r($data['assest_name']); die;
	$this->load->view('header', $data);
	$this->load->view('request_template', $data);
	$this->load->view('footer', $data);

 

}


	//END VIEW TEMPLATE
	
	
	//GET ASSET THROUGH AJAX
	public function getassetoption() {
		$option=  $_REQUEST['option'];
		$this->load->model('Addrequest_model');
		$data['options']= $this->Addrequest_model->getAssetoptions($option);
		echo json_encode($data['options']);
		die;
	}
	
	//END GET ASSET THROUGH AJAX
	
	public function last_task() {
		$this->load->model('Addrequest_model');
		$result = $this->Addrequest_model->Lasttask();
		$rid = $result[0]['rid'];
		redirect('viewtemplate/'.$rid , 'refresh');
		//print_r($pid);
		
	}
	
	
	

/*----------------------------------END ADD REQUEST---------------------------------------------*/
}