<?php

class request extends CI_Model {
	
	public function __construct(){
		$this->load->database();
	}
	
	public function insert_request($data){
		$this->db->insert("request",$data); 
	}
	
	public function insert_request_status($data){
		$this->db->insert("request_status",$data);
	}
	
	public function check_status($id,$flag){
		$this->db->set($flag);
		$this->db->where($id);
		$this->db->update("request_status");
	}
}

?>