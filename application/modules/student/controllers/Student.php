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

	function complain_status()
	{
		$data=$this->stud_model->complain_status($this->ion_auth->get_user_id());
		$this->_render_page('my_complains',$data);
	}

	function get_data()
	{
		$id=$this->ion_auth->get_user_id();
		$res=$this->stud_model->update_comp($id);
		$this->session->set_flashdata('message','Issue Posted');
		$this->session->keep_flashdata('message');
		redirect('/student');
	}

	function _render_page($page=NULL,$data=NULL)
	{
		/*$data['res']=$data;*/
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}

	function my_comp()
	{
		$id=$_GET['id'];
		$data=$this->stud_model->comp_comment();
		$this->_render_page('my_comp_com',$data);
	}
	//search direction to be discussed
	function search()
	{}

}
