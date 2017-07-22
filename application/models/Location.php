<?php


class location extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function insert_provinces($data){				
		$this->db->insert("provinces",$data);				
	}
	
	public function insert_regencies($data){
		$this->db->insert("regencies",$data);
	}
		
	public function delete_provinces($id){
		$this->db->where("id",$id);
		$this->db->delete("provinces");
	}
	
	public function delete_regencies($id){
		$this->db->where("id",$id);
		$this->db->delete("regencies");
	}
	
	public function get_all_provinces(){
		$query = $this->db->get("provinces");
		return $query->result_array();			
	}
	
	public function get_all_regencies(){
		$query = $this->db->get("regencies");
		return $query->result_array();			
	}	
	
	public function get_prov_by_id($id){
		$query = $this->db->get_where("provinces",array("id" => $id));
		return $query->result_array();
	}
	
	public function get_reg_by_id($id){
		$query = $this->db->get_where("regencies",array("id" => $id, "provinces_id" => $id['provinces_id']));
		return $query->result_array();
	}	
	
?>