<?php
class Dashboard extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('facilitator');
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
		}else{
		$this->load->view('templates/footer-clean', $data);
		}
	}
	
	public function view_facilitator(){
		/* if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
       }
	   	
       $this->db->limit(5, ($this->input->get("page",1) - 1) * 5);
       $query = $this->db->get("items");
       $data['data'] = $query->result();
       $data['total'] = $this->db->count_all("items"); */
	   //$limit = $this->input->get("page",1);
	   
	   $data = $this->facilitator->get_all();

       echo json_encode($data);
	}
}
	
?>