<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gpa extends MX_Controller
{
  function __construct()
  {
    parent::__construct(); 
    $this->load->helper('date');
    $this->load->helper('url'); 
     $this->load->model('gpa_model');
     if(!$this->ion_auth->logged_in())
      redirect('/auth/login/','refresh');

  }

  function index()
  {
        $this->load->model('gpa_model');
        $data=$this->gpa_model->get_user_info();
        $data['id']=$this->ion_auth->get_user_id();
        $this->load->view('gpa_dash',$data);
        $this->load->view('footer');
  }

  function render_page($view,$data_new)
  {   
    $data=$this->gpa_model->get_user_info();
    $data['id']=$this->ion_auth->get_user_id();
    $this->load->view('gpa_dash',$data);
        $this->load->view($view,$data_new);
      $this->load->view('footer');
  }

  

   function get_gpa_table($num)
   {
    
    $data['query']=$this->gpa_model->get_gpa_table($num); 
    $data['status']=$num; 
    $this->render_page('get_gpa_datatable',$data);
   }
    function gpa_table_approved()
   {
     
    $data['query']=$this->gpa_model->get_gpa_approved();   
    $this->render_page('get_gpa_datatable',$data);
   }
    function gpa_table_dismissed()
   {
   
    $data['query']=$this->gpa_model->get_gpa_dismissed();  
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
}