<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Email_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}
	
	
	
	
	public function send_mail($email,$subject,$message){
		$this->template->load_header('mail_header.php');
		$this->template->load_footer('mail_footer.php');
		$this->template->load('mail_custom.php');
		$this->template->add_variable('message',$message);
		$body = $this->template->generate();

		$mail = $this->phpmailer->load();
		$mail->addAddress($email);
		$mail->Subject = $subject;
		$mail->Body = $body;

		if(!$mail->send()){
			return false;
		}else{
			$mail->clearAddresses();
			$mail->clearAttachments();

			return true;
		}


	}




}