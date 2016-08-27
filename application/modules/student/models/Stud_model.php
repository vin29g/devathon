<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stud_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('auth/ion_auth');
	}

	function get_comp()
	{
		$q="SELECT * from complaindata";
		$data=$this->db->query($q)->result_array();
		return $data;	}
}