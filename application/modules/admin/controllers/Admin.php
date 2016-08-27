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
		$this->load->view('admin_dash',$data);
		$this->load->view('admin_main',$data);
		$this->load->view('footer');
	}

	function render_page($view,$data)
	{
		$data['user']=$this->admin_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$data['unapproved_number'] = count($this->admin_model->get_unapproved_companies());
		$this->load->view('admin_dash',$data);
		$this->load->view($view,$data );
		$this->load->view('footer');
	}

	function add_news()
	{
		$this->load->model('cod_model');
		$this->cod_model->add_news();
	}

	function create_user()
	{
		$data['spcls']=$this->admin_model->get_all_specializations();
		$this->render_page("create_user",$data);
	}
	function auth()
	{
		if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			redirect('/student/', 'refresh');
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->load->library(array('ion_auth','form_validation'));
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$data['users'] = $this->ion_auth->users()->result();
			$this->load->model('admin_model');
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
				$roll=$data['users'][$k]->id;
				$data['users'][$k]->roll=$this->admin_model->get_user_roll($roll);
			}
			$this->render_page('index', $data);
		}
	}

	function get_gpa_table($num)
	{
		$data['query']=$this->admin_model->get_gpa_table($num);	
		$data['status']=$num; 
		$this->render_page('get_gpa_datatable',$data);
	}

	function approve_gpa_status()
	{
		$q=$this->input->post('id');
		$this->admin_model->approve_gpa_status($q);
		echo json_encode(array("msg"=>"<button  class='btn waves-effect waves-light col s6 green'>Approved</button>
			<button onclick='revert($q)'  class='btn waves-effect blue darken-2 waves-light col s6 '>Revert</button>"));
	}

	function dismiss_gpa_status()
	{
		$q=$this->input->post('id');
		$this->admin_model->dismiss_gpa_status($q);
		echo json_encode(array("msg"=>"<button  class='btn waves-effect waves-light col s6 red'>Dismissed</button>
			<button onclick='revert($q)'  class='btn waves-effect blue darken-2 waves-light col s6 '>Revert</button>"));
	}

	function revert_gpa_status()
	{
		$q=$this->input->post('id');
		$this->admin_model->revert_gpa_status($q);
		echo json_encode(array("msg"=>"<button onclick='approve($q)'  class='btn waves-effect teal lighten-2 waves-light col s6 red'>Approve</button>
			<button onclick='dismiss($q)'  class='btn waves-effect waves-light col s6 '>Dismiss</button>"));
	}

	function show_calender()
	{
		$data['object']=$this->admin_model->get_events();
		$data['url']=base_url();
		$this->render_page('customized_calender',$data);
	}

	function unapproved_companies()
	{
		$data['companies'] = $this->admin_model->get_unapproved_companies();
		$data['user']=$this->admin_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$data['unapproved_number'] = count($this->admin_model->get_unapproved_companies());
		$this->load->view('admin_dash',$data);
		$this->load->view('approve_company',$data );
		$this->load->view('footer');
	}

	function approve_company()
	{
		if($this->input->post('mode') && $this->input->post('action') && $this->input->post('id'))
		{
			$this->admin_model->approve_company($this->input->post('mode'), $this->input->post('action'), $this->input->post('id'));
		}
	}
	
	function approve_application()
	{
		$appid=$this->input->post('id');
		$data=$this->admin_model->approved_application($appid);
		echo json_encode(array("m1"=>$data['rowcount'],"m2"=>"<button  class='btn waves-effect waves-light col s4 green'>Approved</button>
			<button onclick='revert($appid)'  class='btn waves-effect blue darken-2 waves-light col s6 red'>Revert</button>"));
	}

	function dismissed_application()
	{
		$appid=$this->input->post('id');
		echo json_encode(array("m2"=>"<button  class='btn waves-effect waves-light col s6 red'>Dismissed</button>
			<button onclick='revert($appid)'  class='btn waves-effect blue darken-2 waves-light col s6 '>Revert</button>"));
	}

	function revert()
	{
		$appid=$this->input->post('id');
		$data=$this->admin_model->revert_application($appid);
		echo json_encode(array("rm1"=>$data['rowcount'],"rm2"=>"<button onclick='approve($appid)'  class='btn waves-effect waves-light teal lighten-2 col s6'>Approve</button>
			<button onclick='dismiss($appid)'  class='btn waves-effect waves-light col s6'>Dismiss</button>"));
	}

	function sql_download()
	{
		$this->load->helper('download');
		$name= 'TAPS_2016.sql';
		$data = file_get_contents(base_url('/assets/sql/taps.sql')); // Read the file's contents
		force_download($name,$data);
	}

	function assets_download()
	{
		$this->load->library('zip');
		$this->zip->clear_data(); 
		if(base_url()=="http://localhost/taps/")
		{
			$path ='assets';						//if buffer size is not sufficient use two blocks 
			$this->zip->read_dir($path);
			//$path ='assets\images\main';			//otherwise no need of if else 
			// $this->zip->read_dir($path);
		}
		else
		{											//problem arises for '\'   '/' 
	$path ='assets';
	$this->zip->read_dir($path);
			//$path ='assets/images/main';
			// $this->zip->read_dir($path);
}
$this->zip->download('TAPS_2016_assets.zip');
}

function profilelock()
{
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$this->load->view('admin_dash',$data);
	$data=$this->admin_model->prolock();
	$this->load->view('profile_lock',$data);
	$this->load->view('footer',$data);
}

function lock()
{
	$userid=$this->input->post('id');
	$flag=$this->admin_model->lock_pro($userid);
	echo json_encode(array("m1"=>"<button class='btn waves-effect waves-light green'>Locked</button>
		<button class='btn waves-effect waves-light blue darken-2' onclick='unlock($userid)'>Unlock</button>"));
}

function unlock()
{
	$userid=$this->input->post('id');
	$flag=$this->admin_model->revert_pro($userid);
	echo json_encode(array("m1"=>"<button class='btn waves-effect waves-light teal lighten-2' onclick='lock($userid)' >Lock It</button>"));
}

function approved_appl()
{
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$this->load->view('admin_dash',$data);
	$data=$this->admin_model->get_status();
	$this->load->view('approved_applicants',$data);
	$this->load->view('footer',$data);
}

function all_coordinators()
{
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$this->load->view('admin_dash',$data);
	$data=$this->admin_model->get_cod();
	$this->load->view('all_coordinators',$data);
	$this->load->view('footer',$data);
}

function return_events()
{
	echo json_encode($this->admin_model->get_events());
}

function deactivate_req()
{
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$data['req']=$this->admin_model->deactivate_req();
	$this->load->view('admin_dash',$data);
	$this->load->view('deactivate_req',$data);
	$this->load->view('footer',$data);
}

function deactivate_approve()
{
	$id=$this->input->post('id');
	$this->admin_model->deactivate_approve($id);
	echo json_encode(array("m1"=>"<button  class='btn green'>approved</button>"));
}

function deactivate_dismiss()
{
	$id=$this->input->post('id');
	$this->admin_model->deactivate_dismiss($id);
	echo json_encode(array("m1"=>"<button  class='btn red'>dismissed</button>"));
}

function set_autolock()
{
	$this->admin_model->set_autolock();
}

function feedbacks()
{
	$data['companies']=$this->admin_model->companies();
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$this->load->view('admin_dash',$data);
	$this->load->view('feedback_select',$data);
	$this->load->view('footer');
}

function show_feedback()
{
	$data['res']=$this->admin_model->show_feedback();
	$data['user']=$this->admin_model->get_user_info();
	$data['id']=$this->ion_auth->get_user_id();
	$this->load->view('admin_dash',$data);
	$this->load->view('feedback_res',$data);
	$this->load->view('footer');
}

function get_student()
{
	if (isset($_GET['term']))
	{
		$q = strtolower($_GET['term']);
		$this->admin_model->search_student($q);
	}
}
function upload_stud_list_view()
{
	$data['error']["error"]=" ";
	$data['special']=$this->admin_model->get_all_special();
	$this->render_page('upload_csv',$data);
}
function upload_student_list()
{    
	$special = $this->input->post('special');
	$special_abbr=$this->admin_model->get_special_abbr($special);
	$data['special']=$this->admin_model->get_all_special();
		//echo $special;
	$data['title']="Upload list";
	$config['upload_path'] = './assets/uploads/student_list/';
	$config['allowed_types'] = 'csv';
	$config['overwrite'] = TRUE;
	$config['file_name']=$special_abbr;

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload())
	{
		$data['error'] = array('error' => $this->upload->display_errors());
		$this->csv_to_array($special_id,$special);
	}
	else
	{
		$data = array('upload_data' => $this->upload->data());
		//$this->render_page('upload_success', $data);

	}
	$this->csv_to_array($special_abbr,$special);
}
function csv_to_array($id,$special_id)
{
	//echo "please wait";
	$string_csv = "assets/uploads/student_list/".$id.".csv";        

	$this->load->library('excel');
	   // $this->load->library('PHPexcel/IOFactory.php'); 
	$reader = PHPExcel_IOFactory::createReader('CSV')
	->setDelimiter(',')
	->setEnclosure('"')
	->setSheetIndex(0)
	->load($string_csv); 

	$objWorksheet = $reader->setActiveSheetIndex(0);
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

	//read from file
	for ($row = 1; $row <= $highestRow; ++$row)
	{
		$file_data = array();
		for ($col = 0; $col <= $highestColumnIndex-1; ++$col)
		{  
			$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
			$file_data[$col]=trim($value);
		}
		$result[] = $file_data;
	}   

  //print_r($result);

	//print_r($result);
	$excluded_result =$this->admin_model->add_csvdata($result,$special_id);
	//$this->send_emails();

	$this->view_uploaded_data($special_id,$excluded_result);
}
function view_uploaded_data($special_id,$excluded_result)
{
	$data['uploaded_success']=$this->admin_model->get_all_data_users_special($special_id);
	$data['excluded_result']=$excluded_result;
	$this->render_page("view_uploaded_data",$data);
}
function send_activation()
{
	$data['error']["error"]=" ";
	$data['special']=$this->admin_model->get_all_special();
	$this->render_page('send_activation',$data);
}
function view_students_email()
{
	$data['special'] = $this->input->post('special');
	$data['student']=$this->admin_model->get_all_data_users_special($data['special']);
	$this->render_page("confirm_page",$data);
	
	
}
function send_password($special)
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
}

}