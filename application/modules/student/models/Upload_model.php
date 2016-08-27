<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	function news()
	{
		$query=$this->db->get('news_feed');
		return($query->result());

	}
	function getroll($id)
	{
		
        $this->db->select('roll_number');
		$query=$this->db->join($this->tables['student_auth'].' as auth ', 'auth.id = data.userid')
					    ->limit(1)
					    ->where('id', $id)
					    ->get($this->tables['student_data'].' as data');
		return($query->result());
	}


}