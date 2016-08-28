<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller
{
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper('date');
		$this->load->helper('url'); 
		$this->load->helper('file');
		$this->load->library('auth/ion_auth');
		$this->load->helper('form');
		$this->load->model('admin_model');
		if(!$this->ion_auth->logged_in())
		{
			redirect('/auth/login/','refresh');
		}
if(!$this->ion_auth->in_group('admin'))
			redirect('/student/','refresh');
	}

	function admin_help()
	{
		$data['user']=$this->admin_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_info();
		$this->load->view('admin_dash',$data);
		$this->load->view('admin_help',$data);
		$this->load->view('footer',$data);
	}

	function index()
	{
		$this->load->model('admin_model');
		$data['user']=$this->admin_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$data['comp']=$this->admin_model->get_content();
		$data['assignee']=$this->admin_model->get_ass();
		$this->load->view('admin_dash',$data);
		$this->load->view('admin_main',$data);
		$this->load->view('footer');
	}

	function assign_it()
	{
		$this->admin_model->assigned();
		$this->session->set_flashdata('message','Assigned some of the issues');
		redirect('/admin');
	}
/*function send_password($special)
{
		
$students=$this->admin_model->get_all_data_users_special($special);  
foreach ($students as $student )
{              
$reset=$this->ion_auth->forgotten_password($student['email']);
$name = "TAPS_ADMIN";
		$from = "no-reply@tapsnitw.org";
		$subject = "test";
		$message = "your username is  your email:".$reset['identity']." <br> To reset password click link below <br> ".base_url('auth/reset_password/'.$reset['forgotten_password_code']);

		$to = $reset['identity'];//Get credentials from TAPS Authorities

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'no-reply@tapsnitw.org';//Get credentials from TAPS Authorities
		$config['smtp_pass'] = 'tAp$.n!Tw@Email16';//Get credentials from TAPS Authorities
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['smtp_crypto'] = 'tls';
		//$config['newline'] = "\r\n"; //use double quotes
		$config['validation'] = TRUE;
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from($from, $name);
		$this->email->to($to);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
                $error=$this->email->print_debugger();
                print_r($error);
}
redirect('admin/send_activation');
}
function activate_user($data,$email)
{
	$this->load->config('auth/ion_auth', TRUE);
	$this->load->library(array('email'));
	$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_activate', 'ion_auth'), $data, true);

	$this->email->clear();
	$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
	$this->email->to($email);
	$this->email->subject($this->config->item('site_title', 'ion_auth') . ' - ' . $this->lang->line('email_activation_subject'));
	$this->email->message($message);

	if ($this->email->send() == TRUE)
	{
		$this->Ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));
		$this->set_message('activation_email_successful');
		return $id;
	}
}*/

}