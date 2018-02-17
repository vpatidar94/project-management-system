<?php
/* 
* Author: Vinay Patidar
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_con extends CI_Controller {

	
	  function __Construct(){
  parent::__Construct ();
    $this->load->library('pagination');

 
 }


/*--------------------------------------ASSEST START-----------------------------------------*/
	
	public function addasset() {
		if($this->session->userdata('username')){
		$this->load->model('Addasset_model');

		$data['query']= $this->Addasset_model->getProject();
		//$data['option'] = $this->Addasset_model->fetchAssettype();
		//print_r($data);
		$data['title']  ="Add New Asset";
		$this->load->view('header',$data);
		$this->load->view('add_asset.php',$data);
		$this->load->view('footer', $data);
		}else{
			redirect('welcome/index','refresh');
		}
	}
	public function add_asset() {
		$this->load->model('Addasset_model');
		
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
                    redirect('addasset', 'refresh');
                }
		else{		
		 
		 
		$data = array(
		'project' => $this->input->post('project'),
		'assest_type' => $this->input->post('assest_type'),
		'assest_title' => $this->input->post('assest_title'),
		'description' => $this->input->post('description'),
		'assest_link' => $this->input->post('assest_link')
 		);
		$this->Addasset_model->insertAsset($data);
		 redirect('viewasset', 'refresh');
		}
	}
	
	//VIEW ASSESTS
	public function viewasset() {
		if($this->session->userdata('username')) {
			
		$this->load->model('Addasset_model');
		//pagination
		$config = array();
        $config["base_url"] = base_url() . "viewasset";
        $config["total_rows"] = $this->Addasset_model->record_count();
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
		$data['query']= $this->Addasset_model->fetchAssets($config["per_page"], $page);
		//print_r($data['query']);
		
		$seg =  $this->uri->segment(2);
		print($seg);
		 $data["links"] = $this->pagination->create_links();
		
		//$data['query']= $this->Addasset_model->fetchAssets();
		$data['title']  ="View All Assets";
		$this->load->view('header',$data);
		$this->load->view('all_assets', $data);
		$this->load->view('footer',$data);
		} else{
			redirect('welcome/index','refresh');
		}
	}
	
	
	
	//END VIEW ASSESTS
	
	
	// EDIT ASSET
	public function editasset() {
		if($this->session->userdata('username')) {
		$data['title'] = 'Edit Asset';
		$aid= $this->uri->segment(2);
		$this->load->model('Addasset_model');
		$result = $this->Addasset_model->Editassets($aid);
		//print_r($result);
		$data['aid'] = $result[0]['aid'];
		$data['project'] = $result[0]['project'];
		$data['assest_type'] = $result[0]['assest_type'];
		$data['assest_title'] = $result[0]['assest_title'];
		$data['assest_link'] = $result[0]['assest_link'];
		$data['description'] = $result[0]['description'];
		
		$data['query1'] = $this->Addasset_model->getProject();
		//$data['option'] = $this->Addasset_model->fetchAssettype();
		$this->load->view('header',$data);
		$this->load->view('edit_asset', $data);
		$this->load->view('footer',$data);
		}
		else {
			redirect('welcome/index','refresh');
		}
	}
	
	public function edit_asset() {
		$aid= $this->uri->segment(2);
		$this->load->model('Addasset_model');
		
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
                    redirect('editasset/'.$aid.'' , 'refresh');
                }
		else{		
		 $data = array(
		'project' => $this->input->post('project'),
		'assest_type' => $this->input->post('assest_type'),
		'assest_title' => $this->input->post('assest_title'),
		'description' => $this->input->post('description'),
		'aid' => $aid,
		'assest_link' => $this->input->post('assest_link')
 		);
		$this->Addasset_model->Edit_assets($data);
		 redirect('viewasset', 'refresh');
		}
		
		
	}
	
	
	
	
	// EDIT ASSET
	
	// public function goassetlink() {
		// $link = $this->uri->segment(2);
		
		//redirect('www.google.com' ,'refresh');
	// }
	
	/*----------------------------------END ASSEST----------------------------------------------*/
	
	
}