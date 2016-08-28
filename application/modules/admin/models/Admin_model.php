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

	function get_content()
	{
		$q="SELECT * FROM complain";
		$result=$this->db->query($q)->result_array();
		$data['result']=$result;
		$data['rowcount']=count($result);
		return $result;
	}

	function get_ass()
	{
		$q="SELECT * from groups where id >= 6";
		$result=$this->db->query($q)->result_array();
		return $result;
	}

	function assigned()
	{
		foreach ($_POST as $key => $value) {
			$i=0;
			if(!is_numeric($value)==true)
			{
				if($value=="none")continue;
				$dat['grp_name']="$value";
				$dat['compid']="$key";
				$this->db->insert('assign',$dat);
				$q="UPDATE complain set approval=1 where id='$key'";
				$this->db->query($q);
			}
		}
		return;
	}
}