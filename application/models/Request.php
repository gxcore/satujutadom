<?php

class request extends CI_Model {
	
	public function __construct(){
		$this->load->database();
	}
	
	public function insert_request($data){
		$this->db->insert("request",$data); 
		return $this->db->insert_id();
	}
	
	public function insert_request_status($data){
		$this->db->insert("request_statuses",$data);
		return $this->db->insert_id();
	}
	
	public function check_status($id,$flag){
		$this->db->set($flag);
		$this->db->where($id);
		$this->db->update("request_status");
	}
	
	public function get_sets_group_by_sets_id($sets_id){
		$query = $this->db->get_where("set_status_groups",array("set_id" => $sets_id));
		return $query->result_array();
	}
}

?>