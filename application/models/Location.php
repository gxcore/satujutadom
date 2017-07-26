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
	
	public function update_provinces($data){
		$this->db->set($data);
		$this->db->where("id",$data['id']);
		$this->db->update("provinces",$data);
	}
	
	public function update_regencies($data){
		$this->db->set($data);
		$this->db->where("id",$data['id']);
		$this->db->update("regencies",$data);
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
		$count = $this->db->count_all("provinces");	
		
		$query = $this->db->get("provinces");
		//return $query->result_array();			
		$data['data'] = $query->result();
		$data['total'] = $count;
		return $data;			
	}
	
	public function get_all_regencies(){
		$count = $this->db->count_all("regencies");	
		
		$query = $this->db->get("regencies");
		//return $query->result_array();			
		$data['data'] = $query->result();
		$data['total'] = $count;		
		return $data;;			
	}	
	
	public function get_prov_by_id($id){
		$query = $this->db->get_where("provinces",array("id" => $id));
		return $query->result_array();
	}
	
	public function get_reg_by_id($id){
		$this->db->where("id",$id);
		$count = $this->db->count_all("regencies");	
		
		$query = $this->db->get_where("regencies",array("province_id" => $id));
		//return $query->result_array();			
		$data['data'] = $query->result();
		$data['total'] = $count;
		return $data;					
	}	
	
	public function search_prov_by_name($name){
		$full_name = "%".strtolower($name)."%";
		$q = "SELECT id,name FROM provinces";// WHERE lower(name) LIKE ?";
		$data['data'] = $this->db->query($q,array($name))->result();
		$data['total'] = 0;
		
		return $data;
	}
}	
?>