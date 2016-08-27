<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}

	function get_user_info()
	{
		$id=$this->ion_auth->get_user_id();
		$this->db->select('users_data.first_name,roll_number,encrypt');
		$this->db->from('users_data');
		$this->db->join('users', 'users.id = users_data.userid')->where('users.id',$id);
		$query=$this->db->get();
		$res=$query->row();
		return $res;
	}

		function get_all_specializations()
	{
		/*$q="SELECT id,name,abbr FROM specialization ORDER BY name";
		return $this->db->query($q)->result_array();*/
	}
}