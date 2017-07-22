<?php
class User extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->model('login');
		$this->load->helper('url_helper');
		$this->load->library('session');
			
	}
	
	
	public function login() {
		
		$logged_in = $this->login->log_in($this->input->post('username'), $this->input->post('password'), $this->input->post('remember'));
		
		/* if ( $logged_in && is_array($logged_in)) { */
		if ( $logged_in) { // 20170722 | ilhabibi | take out kondisi kedua is_array karena gak ngerti maksudnya buat apa kondisi ini
			$redir = ($this->input->post('redirect')) ? $this->input->post('redirect') : base_url('dashboard'); // 20170722 | ilhabibi | di redirect ke halaman dashboard
			header('Location: '.$redir);
		} else {
			header( 'Location: '.base_url('login').'?redirect='.$this->input->post('redirect').'&fail='.$logged_in );
		} 
	}
	
	public function logout() {
	
		$this->session->unset_userdata('user');
		header( 'Location: '.base_url('login') );
		
	}
	
	public function change_role( $r ) {
	
		$user_data = $this->session->userdata('user');
		$user_data['role'] = $r;
		$user_data['roles_name'] = $this->db->get_where('roles', array( 'id' => $r ) )->row_array()['name'];
		$login_user['user'] = $user_data;
		$this->session->set_userdata($login_user);
		header( 'Location: '.base_url('') );
		
	}
	
	public function change_id( $id = false ) {
	
		$id = $this->input->post('id'); 
		$this->login->set_login_data( $id );
		
		$user_data = $this->session->userdata('user');
		$user_data['was_admin'] = true;
		$login_user['user'] = $user_data;
		$this->session->set_userdata($login_user);
		header( 'Location: '.base_url('') );
		
	}
	
}