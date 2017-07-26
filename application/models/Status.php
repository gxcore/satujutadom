<?php

class status extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function insert_status($data){
		$this->db->insert("status",$data);
	}
	
	public function insert_sets($data){
		$this->db->insert("sets",$data);
	}
	
	public function insert_status_groups($data){
		$this->db->insert("set_status_groups",$data);
	}
	
	public function delete_status($id){
		$this->db->where("id",$id);
		$this->db->delete("status");
	}
	
	public function delete_sets($id){
		$this->db->where("id",$id);
		$this->db->delete("sets");
	}
	
	public function get_all_sets(){
		$query = $this->db->get("sets");
		$data['data'] = $query->result();
		return $data;
	}
	
	public function get_all_status(){
		$query = $this->db->get("status");
		return $query->result_array();
	}

	
	
}