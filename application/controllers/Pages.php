<<<<<<< HEAD
<?php
class Pages extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->library('SmartGrid/Smartgrid');
		$this->load->model('facilitator');
		$this->load->database();		
		$this->load->model('facilitator');
		//$this->load->model('data_model');
		//$this->load->model('report_model');
		//require FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
	}
	
	public function send_mail() {

		$mail = new PHPMailer();
		$mail->SMTPDebug = 2;
		// ---------- adjust these lines ---------------------------------------
		$mail->Username = "grantz.x.core@gmail.com"; // your GMail user name
		$mail->Password = "urslyexrftzeyqke"; 

		$mail->setFrom('no-reply@1juta.id', '1JutaDomain');

		$mail->isHTML(true);                           // Set email format to HTML
		$mail->addCustomHeader("From","no-reply@1juta.id");
		$mail->createHeader();
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		//-----------------------------------------------------------------------

		$mail->Host = "ssl://smtp.gmail.com"; // GMail
		$mail->Port = 465;
		$mail->IsSMTP(); // use SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		
		if (!$mail->isError()) {
			return $mail;
		} else {
			return $mail->ErrorInfo;
		}
		
		/* // TO SEND MAIL
		$mail->AddAddress("ardhy.nsatrya@gmail.com"); // recipients email
		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		if(!$mail->Send())
			echo "Mailer Error: " . $mail->ErrorInfo;
		else
			echo "Message has been sent";
		*/
	}
	
	
	public function view($page = 'home') {
	
		//$logged = $this->login->get_login_data();
		//echo '<pre style="padding: 60px 20px 20px 280px;">';
		//print_r($this->login->get_login_data());
		//echo "</pre>";
		/*
		if ( $page != 'login' && !$logged ) {
		
			header( 'Location: '.base_url('login').'?redirect='."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
			
		} else {
		
			if ( $page == 'login' && $logged ) {
			
				header( 'Location: '.base_url('home') );
				return 0;
				
			}
		*/
			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
					show_404();
			}

			//$data['mail'] = $this->send_mail();
			$data['page_filename'] = $page;
			$data['title'] = ucwords(str_replace("-"," ",$page));
			//$data['logged_user'] = $logged;
			if ($page != 'login') { $this->load->view('templates/header', $data); } else { $this->load->view('templates/header-clean', $data); }
			$this->load->view('pages/'.$page, $data);
			if ($page != 'login') { $this->load->view('templates/footer', $data); } else { $this->load->view('templates/footer-clean', $data); }
			
		
		//}
		
	}
=======
<?php
class Pages extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
		$this->load->helper('url_helper');
		//$this->load->database();		
		//$this->load->model('login');
		//$this->load->model('data_model');
		//$this->load->model('report_model');
		//require FCPATH.'assets/phpmailer/PHPMailerAutoload.php';
	}
	
	public function send_mail() {

		$mail = new PHPMailer();
		$mail->SMTPDebug = 2;
		// ---------- adjust these lines ---------------------------------------
		$mail->Username = "grantz.x.core@gmail.com"; // your GMail user name
		$mail->Password = "urslyexrftzeyqke"; 

		$mail->setFrom('no-reply@1juta.id', '1JutaDomain');

		$mail->isHTML(true);                           // Set email format to HTML
		$mail->addCustomHeader("From","no-reply@1juta.id");
		$mail->createHeader();
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		//-----------------------------------------------------------------------

		$mail->Host = "ssl://smtp.gmail.com"; // GMail
		$mail->Port = 465;
		$mail->IsSMTP(); // use SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		
		if (!$mail->isError()) {
			return $mail;
		} else {
			return $mail->ErrorInfo;
		}
		
		/* // TO SEND MAIL
		$mail->AddAddress("ardhy.nsatrya@gmail.com"); // recipients email
		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		if(!$mail->Send())
			echo "Mailer Error: " . $mail->ErrorInfo;
		else
			echo "Message has been sent";
		*/
	}
	
	
	public function view($page = 'home', $page2 = 'home') {
		
		$page = ($page == 'admin') ? $page.'/'.$page2 : $page;
	
		//$logged = $this->login->get_login_data();
		//echo '<pre style="padding: 60px 20px 20px 280px;">';
		//print_r($this->login->get_login_data());
		//echo "</pre>";
		/*
		if ( $page != 'login' && !$logged ) {
		
			header( 'Location: '.base_url('login').'?redirect='."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
			
		} else {
		
			if ( $page == 'login' && $logged ) {
			
				header( 'Location: '.base_url('home') );
				return 0;
				
			}
		*/
		
			if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
					echo APPPATH.'views/pages/'.$page.'.php';
					show_404();
			}

			//$data['mail'] = $this->send_mail();
			$data['page_filename'] = $page;
			$data['title'] = ucwords(str_replace("-"," ",$page));
			//$data['logged_user'] = $logged;

			if ($page != 'login') { $this->load->view('templates/header', $data); } else { $this->load->view('templates/header-clean', $data); }
			$this->load->view('pages/'.$page, $data);
			if ($page != 'login') { $this->load->view('templates/footer', $data); } else { $this->load->view('templates/footer-clean', $data); }
		
		//}
		
	}
>>>>>>> 038ecbb764a781a0fdbb809637e0f3d74d6d966d
}
