<?php
class Dashboard extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('facilitator');
		$this->load->model('requestor');
		$this->load->model('location');
		$this->load->model('status');
		$this->load->model('request');
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
		}elseif($page == 'location'){
			$this->view_location();
		}elseif($page == "regencies"){
			$this->view_regencies();
		}
		else{
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
	
	public function view_location(){
	  	
       //$this->db->limit(5, ($this->input->get("page",1) - 1) * 5);       
	   
		$data = $this->location->get_all_provinces();	
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}		
	}
	
	public function view_regencies(){
	  	
       //$this->db->limit(5, ($this->input->get("page",1) - 1) * 5);       
	    $id = $this->input->get("id");
		//echo $id;
		//$id = 11;
		//$data = $this->location->get_all_regencies();	
		$data = $this->location->get_reg_by_id($id);
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}	 
	}
	
	public function view_request(){
	  	
		//$this->db->limit(5, ($this->input->get("page",1) - 1) * 5);       
	   
		$data = $this->request->get_all( $this->input->post('q') );	
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		//$data['queries'] = $this->input->post('q');
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
	
	public function insert_provinces(){
		$data = array(
				'id' => null,
				'name' => $this->input->post("name")
		);
		$this->location->insert_provinces($data);
		$this->view_location();
	}
	
	public function insert_regencies(){
		$data = array(
				'id' => null,
				'province_id' => $this->input->get("id"),
				'name' => $this->input->post("name")
		);
		$this->location->insert_regencies($data);
		$this->view_regencies();
	}
	
	public function delete_facilitator($id){
		$this->facilitator->delete($id);
		$this->view_facilitator();
	}
	
	public function delete_requestor($id){
		$this->requestor->delete($id);
		$this->view_requestor();
	}
	
	public function delete_provinces($id){
		$this->location->delete_provinces($id);
		$this->view_location();
	}
	
	public function delete_regencies($id){
		$this->location->delete_regencies($id);
		$this->view_regencies();
	}
	
	public function edit_facilitator($id){
		$data = array(
			'id' => $id,
			'full_name' => $this->input->post("full_name")
		);
		$this->facilitator->update($data);
		$this->view_facilitator();
	}
	
	public function edit_requestor($id){
		$data = array(
			'id' => $id,
			'ktp_number' => $this->input->post("ktp_number"),
			'full_name' => $this->input->post("full_name"),
			'company' => $this->input->post("company")
		);		
		$this->requestor->update($data);
		$this->view_requestor();
	}
	
	public function edit_provinces($id){
		$data = array(
			'id' => $id,
			'name' => $this->input->post("name")			
		);		
		$this->location->update_provinces($data);
		$this->view_location();
	}
	
	public function edit_regencies($id){
		$data = array(
			'id' => $id,			
			'name' => $this->input->post("name")			
		);		
		$this->location->update_regencies($data);
		$this->view_regencies();
	}
	
	public function search_facilitator(){
		$name = $this->input->post("name");
		
		$data = $this->facilitator->search_by_name($name);
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}	
	}
	
	public function search_provinces(){
		$name = $this->input->post("name");
		
		$data = $this->location->search_prov_by_name($name);
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}	 
	}
	
	public function load_regencies(){
		$id = $this->input->post("province_id");
		
		$data = $this->location->get_reg_by_id($id);
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}	 
	}
	
	public function load_sets(){		
		
		$data = $this->status->get_all_sets();
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* your ajax here code will go here */
		header('Content-type: application/json');
		echo json_encode($data);
		exit();
		}	 
	}
	
	public function register(){
		/* bagian insert ke requestor */
		
		$ktp_number = $this->input->post("ktp_number");
		$full_name = $this->input->post("full_name");
		$company = $this->input->post("company");
		
		$requestor = array(
			'id' => null,
			'ktp_number' => $ktp_number,
			'full_name' => $full_name,
			'company' => $company
		);
		
		$requestor_id = $this->requestor->insert_requestor($requestor);
		
		/* rest, ke table transaksi */
		
		$request_trx = array(
			'id' => null,
			'requestor_id' => $requestor_id,
			'facilitator_id' => $this->input->post("facilitator_id"),
			'province_id' => $this->input->post("province_id"),
			'regency_id' => $this->input->post("regency_id")
		);
		
		$request_id = $this->request->insert_request($request_trx);
		
		$sets_id = $this->input->post("sets_id");
		
		$sets_group = $this->request->get_sets_group_by_sets_id($sets_id);
				
		foreach($sets_group as $n => $val){
			$data = array(
				'request_id' => $request_id,
				'set_id' => $sets_id,
				'status_id' => $val['status_id'],
				'flag' => ( ($n == 0) ? 1 : 0 ) // set setelah pendaftaran otomatis status pertama flag TRUE
			);
			
			$this->request->insert_request_status($data);			
		}
		redirect('/pages/view/admin/register');
	}
		
	public function update_status_next(){
		$data = array(
			'request_id' => $this->input->post("id"),
			'status_id' => $this->input->post("stId")
		);		
		$this->request->update_request_status($data);
		$this->view_request();
	}
	
	
}
	
?>