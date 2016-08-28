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
		return $data;	
	}

	function get_user_info()
	{
		$id=$this->ion_auth->get_user_id();
		$this->db->select('users_data.first_name,roll_number,encrypt');
		$this->db->from('users_data');
		$this->db->join('users', 'users.id = users_data.userid')->where('users.id',$id);
		$query=$this->db->get();
		$res=$query->row_array();
		return $res;
	}

	function complain_status($id)
	{
		$q="SELECT complain.* from complain,users_data where users_data.first_name=complain.complainBy and users_data.userid=$id";
		$res=$this->db->query($q)->result_array();
		$data['res']=$res;
		return $data;
	}

	function comp_comment()
	{
		$id=$_GET['id'];
		$q="SELECT comment.* from comment where id='$id'";
		$res=$this->db->query($q)->result_array();
		$data['res']=$res;
		return $data;
	}

	function update_comp($id=NULL)
	{
		$date=date("Y-m-d");
		$comp="comp".$date;
		$q="SELECT id from complain where id like '%$comp%' order by id desc";
		$res=$this->db->query($q)->row_array()['id'];
		if(count($res)==0)//insert directly
		{
			$c_id=1;
			$comp=$comp."/".$c_id;
			/*echo $comp;*/
		}
		else//increment and insert
		{
			$c=explode("/",$res );
			$inc=$c[1];
			if(strcmp($c[0], $comp)==0)
			{
				$inc++;
				$comp=$comp."/".$inc;
			}
		}
		$cid=$_POST['complain_id'];
		// $q="SELECT * from complain,users_data where users_data.first_name=complain.complainBy and complain.compId=$cid";
		// if(count($this->db->query($q)->row_array())>0)
		// {
		// 	return 0;
		// }
		$data['id']=$comp;
		$data['compId']=$cid;
		$data['dateTime']=date("Y-m-d H:i:s");
		$data['status']="Pending";
		$data['description']=$_POST['otherinfo'];
		$data['complainBy']=$this->get_user_info()['first_name'];
		$this->db->insert('complain',$data);
		return 1; 
	}
}