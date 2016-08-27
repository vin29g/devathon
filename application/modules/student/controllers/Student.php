<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('stud_model');
		$this->load->model('cod/cod_model');
		$this->load->helper('file');
		$this->load->library('auth/ion_auth');
		if(!$this->ion_auth->logged_in())
		{
			redirect('/auth/login/','refresh');
		}
		if(!$this->ion_auth->in_group('stud'))
		{
			redirect('/admin/','refresh');
		}		
	}

	function index()
	{
		$id=$this->ion_auth->get_user_id();
		$data=$this->get_user_data();
		$this->load->view('stud_dash',$data);
		$this->load->view('stud_rules');
		$this->load->view('footer');
		
	}

	function application_status()
	{
		$data=$this->stud_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash',$data);
		$data=$this->stud_model->app_status($data['id']);
		$this->load->view('application_status',$data);
		$this->load->view('footer',$data);
	}

	function post_data()
	{
		$data=$this->stud_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$data['object']=$this->stud_model->put_data();
		$this->load->view('stud_dash',$data);
		$this->load->view('',$data);
		$this->load->view('footer');
	}

	function return_events()
	{
		echo json_encode($this->stud_model->get_events());
	}

	function get_user_data()
	{
		$data['id']=$this->ion_auth->get_user_id();
		return $data;
	}

	function profile()
	{
		$data=$this->stud_model->get_profile_info();
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash',$data);
		$this->load->view('student_profile',$data);
		$this->load->view('footer',$data);
	}

	function display()
	{
		$id=$this->ion_auth->get_user_id();
		$flag=$this->stud_model->profile_display($id);
		if($flag==1)
		{
			redirect('student/profile');
		}
	}

	function complain_submit()
	{
		//$data=$this->stud_model->get_profile_info();
		$data['id']=$this->ion_auth->get_user_id();
		$data['complaints']=$this->stud_model->get_comp();
		$this->load->view('stud_dash',$data);
		$this->load->view('submit_form',$data);
		$this->load->view('footer');
	}

	function help()
	{
		$data['user']=$this->stud_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash',$data);
		$data=$this->stud_model->help_reply();
		$this->load->view('help',$data);
		$this->load->view('footer',$data);
	}

	function stud_help()
	{
		$data=$this->stud_model->get_profile_info();
			$data['id']=$this->ion_auth->get_user_id();
			$this->load->view('stud_dash',$data);
		$this->load->view('stud_help',$data);
		$this->load->view('footer',$data);
	}

	function deactivate_req()
	{
		$id=$this->ion_auth->get_user_id();
		$this->stud_model->deactivate_req($id);
		$this->ion_auth->logout();
		redirect('/auth/login/','refresh');
	}

	function getSpecialization()
	{
		$data=$this->stud_model->get_specialized($this->input->post('branch'));
		echo "<option value=''>"."None"."</option>";
		foreach ($data as $key => $value)
		{
			$id=$value['id'];
			echo "<option value='$id'>".$value['name']."</option>";
		}
	}
	//search direction to be discussed
	function search()
	{}

	function stud_help_temp()
	{
		$data=$this->stud_model->get_profile_info();
			$data['id']=$this->ion_auth->get_user_id();
			$this->load->view('stud_dash_temp',$data);
		$this->load->view('stud_help',$data);
		$this->load->view('footer',$data);
	}

	function profile_temp()
	{
		$data=$this->stud_model->get_profile_info();
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash_temp',$data);
		$this->load->view('student_profile',$data);
		$this->load->view('footer',$data);
	}
}
