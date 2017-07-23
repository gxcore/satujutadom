<?php
class Dashboard extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('facilitator');
		$this->load->model('requestor');
	}
	
	public function view($page = null){
		
		/* if ( ! file_exists(APPPATH.'views/dashboard/'.$page.'.php')) {
					show_404();
		}
		 */
		$data['page_filename'] = $page;
		$data['title'] = ucwords(str_replace("-"," ",$page));
		
		$this->load->view('templates/header-clean', $data);		
		$this->load->view('dashboard/dashboard', $data);	
		if ($page) { $this->load->view('dashboard/'.$page, $data);}
		
		if ($page == 'facilitator'){
			$this->view_facilitator();
		}elseif($page == 'requestor'){
			$this->view_requestor();
		}else{
			null;
		}
		
		//$this->load->view('templates/footer-clean', $data);
		
	}
	
	public function view_facilitator(){
	  	
       //$this->db->limit(5, ($this->input->get("page",1) - 1) * 5);       
	   
		$data = $this->facilitator->get_all();	
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}		
	}
	
	public function view_requestor(){
	  	
       //$this->db->limit(5, ($this->input->get("page",1) - 1) * 5);       
	   
		$data = $this->requestor->get_all();	
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}		
	}
	
	public function insert_facilitator(){
		$fname = $this->input->post("full_name");
		$this->facilitator->insert_facilitator($fname);
		$this->view_facilitator();
	}
	
	public function insert_requestor(){				
		$data = array(
				'id' => null,
				'ktp_number' =>	$this->input->post("ktp_number"),
				'full_name' =>	$this->input->post("full_name"),
				'company' =>	$this->input->post("company")
		);
		
		$this->requestor->insert_requestor($data);
		$this->view_requestor();
	}
	
	public function delete_facilitator($id){
		$this->facilitator->delete($id);
		$this->view_facilitator();
	}
	
	public function delete_requestor($id){
		$this->requestor->delete($id);
		$this->view_requestor();
	}
	
	
	
	
}
	
?>