<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
	}

	function index()
	{   $this->load->helper('url');
	$this->load->view('header');
	$this->load->view('basic');
	$this->load->view('footer');
}

public function view($page='basic')
{   
	$data=NULL;
	$this->load->helper('url');
	$this->load->view('header');
	$this->load->view($page,$data);
	$this->load->view('footer');
}
function contact_us()
{
	if($this->input->post('username') && $this->input->post('email') && $this->input->post('subject') && $this->input->post('message'))
	{
		$name = $this->input->post('username');
		$from = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$to = 'taps@nitw.ac.in';//Get credentials from TAPS Authorities

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'no-reply@tapsnitw.org';//Get credentials from TAPS Authorities
		$config['smtp_pass'] = 'tAp$.n!Tw@Email16';//Get credentials from TAPS Authorities
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['smtp_crypto'] = 'ssl';
		//$config['newline'] = "\r\n"; //use double quotes
		$config['validation'] = TRUE;

		//$this->load->library('email');
		//$this->email->initialize($config);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from($from, $name);
		$this->email->to($to);
		$this->email->cc('');
		$this->email->bcc('');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

		//redirect('main/contact_us');
	}
	$data['tp'] = 'tp';	//This is needed otherwise you'll get an error $data not define in Main.php
	if(null !== $this->session->flashdata('sent'))
	{
		$data['sent'] = $this->session->flashdata('sent');
	}
	$this->load->view('header');
	$this->load->view('contact_us',$data);
	$this->load->view('footer');
}
    
    //custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
    	if (!preg_match("/^[a-zA-Z ]+$/",$str))
    	{
    		$this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }
}
?>