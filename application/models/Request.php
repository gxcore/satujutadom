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
	
	public function get_all( $queries = null ){
		
		$q['where'] = ' 1 ';
		$q['val'] = array();
		if ($queries !== null) {
			$q['where'] = array();
			$q['val'] = array();
			foreach ($queries as $v) {
				if ($v['value'] !== "") {
					switch ($v['name']) {
						case 'q-reqid' :
							$q['where'][] = " r.id =  ? ";
							$q['val'][] = $v['value'];
							break;
						case 'q-reqname' :
							$q['where'][] = " rs.full_name LIKE ? OR rs.company LIKE ? ";
							$q['val'][] = '%'.$v['value'].'%';
							$q['val'][] = '%'.$v['value'].'%';
							break;
						case 'q-facname' :
							$q['where'][] = " fc.full_name LIKE ?";
							$q['val'][] = '%'.$v['value'].'%';
							break;
					}
				}
			}
			$q['where'] = (count($q['where']) > 0) ? implode(' OR ', $q['where']) : ' 1 ';
		}
		$q['sql'] = "
			SELECT r.id, rs.full_name AS req_name, rs.company, fc.full_name AS fac_name, lp.name AS prov, lr.name AS reg, 
				(
					SELECT st.description
					FROM request_statuses AS rt JOIN status AS st ON rt.status_id = st.id
					WHERE rt.request_id = r.id AND rt.flag = 1
					ORDER BY st.sequence DESC
					LIMIT 0,1
				) AS status,
				(
					SELECT st.description
					FROM request_statuses AS rt JOIN status AS st ON rt.status_id = st.id
					WHERE rt.request_id = r.id AND rt.flag = 0
					ORDER BY st.sequence ASC
					LIMIT 0,1
				) AS status_next,
				(
					SELECT rt.status_id
					FROM request_statuses AS rt JOIN status AS st ON rt.status_id = st.id
					WHERE rt.request_id = r.id AND rt.flag = 0
					ORDER BY st.sequence ASC
					LIMIT 0,1
				) AS status_next_id
			FROM request AS r
				LEFT JOIN requestor AS rs ON rs.id =  r.requestor_id
				LEFT JOIN facilitator AS fc ON fc.id =  r.facilitator_id
				LEFT JOIN provinces AS lp ON lp.id =  r.province_id
				LEFT JOIN regencies AS lr ON lr.id =  r.regency_id
			WHERE
				".$q['where']."
			ORDER BY rs.full_name
		";
		
		$query = $this->db->query($q['sql'], $q['val']);
		
		$data['data'] = $query->result_array();
		$data['queries'] = $q;
		$data['total'] = count($data['data']);
		return $data;
	}
	
	public function get_by_id($id){
		$query = $this->db->get_where("requestor",array("id" => $id));
		return $query->result_array();
	}
	
	public function update_request_status( $data ){
		$this->db->set('flag', 1);
		$this->db->where( $data );
		return $this->db->update("request_statuses");
	}
	
	public function get_request_status_set_by_id($id){
		$query = $this->db->query("
			SELECT st.sequence, st.description, rs.flag
			FROM request_statuses AS rs JOIN status AS st ON rs.status_id = st.id
			WHERE rs.request_id = ?
			ORDER BY st.sequence ASC
		", array($id) );
		return $query->result_array();
	}
}

?>