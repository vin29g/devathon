<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gpa_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
}

  function get_user_info()
  {
   $id=$this->ion_auth->get_user_id();
   $this->db->select('name,roll_number,');
   $this->db->from('users_data');
   $this->db->join('users', 'users.id = users_data.userid')->where('users.id',$id);
   $query=$this->db->get();
   $res=$query->result_array();
   return $res[0];
 }
  

 function get_gpa_table($num)
   {
    $data=$this->db->where('approval_status',$num)->get('gpa');

    return($data->result_array());
   }

   function get_gpa_approved()
   {
    $data=$this->db->get('gpa')->where('approval_status',1);
    return($data->result_array());
   }

   function get_gpa_dismissed()
   {
    $data=$this->db->get('gpa')->where('approval_status',0);
    return($data->result_array());
   }


   function approve_gpa_status($userid)
   {

    $data['approval_status']=1;
    $this->db->where('userid',$userid)
             ->update('gpa',$data);
     
   }

    function dismiss_gpa_status($userid)
   {

    $data['approval_status']=-1;
    $this->db->where('userid',$userid)
             ->update('gpa',$data);
    }

    function revert_gpa_status($userid)
  {
    $data['approval_status']=0;
    $this->db->where('userid',$userid)
        ->update('gpa',$data);
  }





}

