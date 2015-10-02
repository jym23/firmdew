<?php
/*
 Plugin Name: Firmdew Contact Form
 Plugin URI: #
 Description: Custom contact form
 Author: Jymyl B.
 Version: 1
 Author URI: #
*/

class Fd_Contact_Form{

	public $site_key = "6LdBOQ0TAAAAACn4W3GSIKBr7q_XijiJzhRKA5iC";
	public $secret_key = "6LdBOQ0TAAAAAKED388qtZiFij7-k2lxAdE-RLpD";

	public $self_dir;
	public $self_uri;
			
	public function __construct(){

		$this->self_dir = plugin_dir_path(__FILE__);
		$this->self_uri = plugins_url() . '/fd-contact-form/';
		if( ! is_admin() ) :

			add_action('wp_enqueue_scripts', array($this, 'reg_scripts'));
			add_shortcode('fd-contact-form', array($this, 'show_form'), 1);
			
		endif;

	}
	public function show_form( $atts ){

		if( isset($atts) && !empty($atts['headline']) ):
			$headline = $atts['headline'];
		endif;

		$fields = array(
				'firstname'	=>	isset( $_POST['fname'] ) ? $_POST['fname'] : '',
				'lastname'	=>	isset( $_POST['lname'] ) ? $_POST['lname'] : '',
				'email'		=>	isset( $_POST['email'] ) ? $_POST['email'] : '',
				'message'	=>	isset( $_POST['msg'] ) ? $_POST['msg'] : '',
				'error'		=> false
			);

		$message = $this->process_request();
		if( $message['success'] === true ){
			$this->send_mail_to_admin( $message['data'] );
		}

		//src site: http://wordpress.stackexchange.com/questions/48491/shortcode-always-displaying-at-the-top-of-the-page
		ob_start();
		include($this->self_dir . 'form.php');
		return ob_get_clean();

	}
	public function process_request(){

		if( isset($_POST['fd-submit-form'])):

			#$verify_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $this->secret_key . '&response=' . $_POST['g-recaptcha-response'];
			
			$message = array(
					'success' 	=> 	true,
					'captcha'	=>  false,
					'email'		=>	false,
					'data'		=> $_POST
				);
			$sanitize_code = isset($_POST['user_code']) ? sanitize_text_field( $_POST['user_code'] ) : '';

			if( get_option('wp-captcha') == $sanitize_code ){
				$message['captcha'] = false;	
				$message['success'] = true;
			}

			$email = sanitize_email($_POST['email']);
			if ( ! is_email( $email ) ){
				$message['email'] = true;
				$message['success'] = false;
			}

			echo '<pre>'; print_r($message); echo '</pre>';
			return $message;

		endif;

	}
	public function send_mail_to_admin( $data ){

		#echo '<pre>'; print_r($data); echo '</pre>'; die();
		add_filter( 'wp_mail_content_type', array($this, 'set_html_content_type') );

		$to = get_option('admin_email');
		$message = '<p style="font-size: 16px;">' . $data['msg'] . '</p>';
		$subject = 'New Inquiry from Website';

		$headers = "From: " . $data['fname'] . " " . $data['lname'] . "<". $data['email'] .">" . "\r\n";
		wp_mail( $to, $subject, $message, $headers );
		
		// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
		remove_filter( 'wp_mail_content_type', array($this, 'set_html_content_type') );
	}
	public function reg_scripts(){

		wp_register_style('fd-contact-form-style', $this->self_uri . 'style.css', time(), '');
		wp_enqueue_style( 'fd-contact-form-style');

		wp_register_script('fd-contact-form-jscript', $this->self_uri . 'jscript.js', array('jquery'), time(), true);
		wp_enqueue_script( 'fd-contact-form-jscript' );
	}
	public function set_html_content_type() {
		return 'text/html';
	}
}

$fdcf = new Fd_Contact_Form;

?>