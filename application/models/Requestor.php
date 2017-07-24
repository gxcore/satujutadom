<?php


class requestor extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function insert_requestor($data){				
		$this->db->insert("requestor",$data);				
	}
	
	public function update($data){
		$this->db->set($data);
		$this->db->where("id",$data['id']);
		$this->db->update("requestor",$data);
	}
	
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("requestor");
	}
	
	public function get_all(){
		$count = $this->db->count_all("facilitator");	
		$query = $this->db->get("requestor");
		$data['data'] = $query->result();
		$data['total'] = $count;
		return $data;
	}
	
	public function get_by_name($name){
		$full_name = "%".strtolower($name)."%";
		$q = "SELECT * FROM requestor WHERE lower(full_name) LIKE ?";
		$query = $this->db->query($q,array($full_name));
		return $query->result_array();
	}
	
	public function get_by_id($id){
		$query = $this->db->get_where("requestor",array("id" => $id));
		return $query->result_array();
	}
}
	
?>