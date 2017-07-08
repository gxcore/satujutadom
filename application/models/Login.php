<?php

class login extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function get_login_data($user_data =  null) {
	
		$user_data = $this->session->userdata('user');
		
		return $user_data;
	}
	
	public function set_login_data( $id = false ) {
	
		$user_data = $this->session->userdata('user');
			
		if ( $id ) {
			$query = $this->db->get_where( 'user', array( 'id' => $id ) );
		} else {
			return 0;
		}
			
		if ( $query ) {
		
			$login_user['user'] = $query->row();
			
			$this->session->set_userdata($login_user);
			
		}
		
		return $this->login->get_login_data();
	}
	
	public function log_in($username = null, $password = null, $remember = false) {
		
		if ( $username != null && $password != null && $username != '' && $password != '' ) {
			
			$query = $this->db->where('email', $username);
			$query = $this->db->where('password', md5($password));
			$query = $this->db->where('status', 1);
			$query = $this->db->from('user');
			$count = $this->db->count_all_results();
			$query = null;
			
			if ( $count > 0 ) {
				$u = $this->db->get_where( 'user', array( 'email' => $username, 'password' => md5($password) ) )->row_array();
				if ($u['status']) {
					return $this->login->set_login_data( $u['id'] );
				} else {
					return 2;
				}
			} else {
				return 1;
			}
		}
	}
}