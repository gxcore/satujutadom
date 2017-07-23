<?php


class facilitator extends CI_Model {
	
	public function __construct() {
		$this->load->database();
		$this->load->library('SmartGrid/Smartgrid');
	}
	
	public function insert_facilitator($name){
		$data = array(
			'id' => null,
			'full_name' => $name
		);
		
		$this->db->insert("facilitator",$data);				
		//$last_id = $this->db->insert_id();		
	}
	
	public function update($d){
		$data = array(
			'id' => $d['id'],
			'full_name' => $d['full_name']
		);
		
		$this->db->set($data);
		$this->db->where("id",$d['id']);
		$this->db->update("facilitator",$data);
	}
	
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("facilitator");
	}
	
	public function get_all(){
		$count = $this->db->count_all("facilitator");	
		
		$query = $this->db->get("facilitator");
		//return $query->result_array();			
		$data['data'] = $query->result();
		$data['total'] = $count;
		return $data;
	}
	
	public function get_by_name($name){
		$full_name = "%".strtolower($name)."%";
		$q = "SELECT * FROM facilitator WHERE lower(full_name) LIKE ?";
		$query = $this->db->query($q,array($full_name));
	}
	
}