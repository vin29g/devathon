<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cod_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		/*$this->load->library('ion_auth/bcrypt');*/
		$this->load->library('auth/bcrypt');
	}

	function get_user_info()
	{
		$id=$this->ion_auth->get_user_id();
		$this->db->select('users_data.first_name,roll_number,encrypt,specialization_id,userid')
		->from('users_data')
		->where('users_data.userid',$id);
		$query=$this->db->get();
		$res=$query->row_array();
		return $res;
	}

	function mess()
	{
		$q="SELECT * from complain,complaindata where complaindata.compId=complain.compId 
		and complaindata.compName='Mess' and complain.approval=1";
		$ret=$this->db->query($q)->result_array();
		return $ret;
	}

	function lan()
	{
		$q="SELECT * from complain,complaindata where complaindata.compId=complain.compId 
		and complaindata.compName='LAN' and complain.approval=1";
		$ret=$this->db->query($q)->result_array();
		return $ret;
	}

	function wsdc()
	{
		$q="SELECT * from complain,complaindata where complaindata.compId=complain.compId 
		and complaindata.compName='WSDC' and complain.approval=1";
		$ret=$this->db->query($q)->result_array();
		return $ret;
	}

	function water()
	{
		$q="SELECT * from complain,complaindata where complaindata.compId=complain.compId 
		and complaindata.compName='Water' and complain.approval=1";
		$ret=$this->db->query($q)->result_array();
		return $ret;
	}

	function grab()
	{
	print_r($_POST);
	foreach ($_POST as $key => $value) {
	$i=0;
	if($key=="tab_length" || $key=="action")
		continue;
	else
		{
		if($value=="none" || $value==0)continue;
		$dat['grp_name']="$value";
		$dat['compid']="$key";
		$this->db->insert('assign',$dat);
		$q="UPDATE complain set approval=2 where id='$key'";
		$this->db->query($q);
		}
	}
	return;
}

	}

