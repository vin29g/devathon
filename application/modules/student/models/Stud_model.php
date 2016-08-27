<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stud_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('auth/ion_auth');
	}


	function get_news()
	{
		$query=$this->db->get('news_feed');
		$result=$query->result_array();
		return $result;
	}

	function get_user_info()
	{
		$id=$this->ion_auth->get_user_id();
		$this->db->select('users_data.first_name,roll_number,encrypt,specialization_id')
				->from('users_data')
				->where('users_data.userid',$id);
		$query=$this->db->get();
		$res=$query->result_array();
		return $res[0];
	}

	function get_eligible_visits($userid)
	{
		$q = "SELECT cgpa FROM gpa WHERE gpa.userid='$userid'";
		$d = $this->db->query($q)->row_array();
		$usercgpa = $d['cgpa'];
		$q = "SELECT sscPer, interPer, gradPer FROM academics WHERE academics.userid=$userid";
		$d = $this->db->query($q)->row_array();
		$usersscper = $d['sscPer'];
		$userinterper = $d['interPer'];
		$usergradcgpa = $d['gradPer'];

		$q = "SELECT specialization_id, category_id, course FROM users_data,specialization WHERE users_data.userid=$userid AND specialization.id=users_data.specialization_id";
		$d = $this->db->query($q)->row_array();
		$userspclid = $d['specialization_id'];
		$usercourse = $d['course'];
		$categoryid = $d['category_id'];

		$q = "SELECT category FROM user_category WHERE id='$categoryid'";
		$d = $this->db->query($q)->row_array();
		$usercategory = $d['category'];

		$q = "SELECT company_visit.*, company.id AS compid, company.name, company.website, company.logofilename, company.info,eligibility.* FROM company,company_visit,eligibility WHERE company_visit.company_id=company.id AND company_visit.id=eligibility.visit_id AND company_visit.stud_viewable=1 AND company.approved=1 AND company_visit.application_deadline>CURRENT_TIMESTAMP AND eligibility.specialization_id=$userspclid AND eligibility.cgpa<=$usercgpa AND eligibility.ssc_percentage<=$usersscper AND eligibility.inter_percentage<=$userinterper";
		if($usercourse != 1) // Not B.Tech. i.e. PG student
		{
			$q = $q." AND eligibility.graduation_cgpa<=$usergradcgpa";
		}
		$visits = $this->db->query($q)->result_array();
		$index = 0;
		$eligible_visits = array();
		foreach($visits as $visit)
		{
			$categories = explode(',', $visit['categories']);
			if(in_array($usercategory, $categories, true))
			{
				$eligible_visits[$index] = $visit;
				$eligible_visits[$index]['applied'] = $this->has_applied($visit['visit_id'], $userid);
				$index++;
			}
		}
		return $eligible_visits;
	}

	function has_applied($visit_id, $userid)
	{
		$q = "SELECT * FROM application WHERE application.visit_id=$visit_id AND application.userid=$userid";
		$d = $this->db->query($q)->result_array();
		return (count($d) == 1);
	}

	function apply($userid, $applyid)
	{
		if($this->has_applied($applyid, $userid))
		{
			return;
		}
		$data['userid'] = $userid;
		$data['visit_id'] = $applyid;
		$data['status'] = 0;
		$data['feedback'] = 0;
		$data['round_no'] = 0;
		$this->db->insert('application',$data);
	}

	function withdraw($userid, $withdrawid)
	{
		$q = "DELETE FROM application WHERE application.visit_id=$withdrawid AND application.userid=$userid";
		$this->db->query($q);
	}

	function resume()
	{
   $id=$this->ion_auth->get_user_id();
   $this->db->select('name,roll_number,registration_number,specialization_id,gender,birthday,mobile,permanent_address,skills,experience,hobbies,linkedin');
   $this->db->from('users_data');
   $this->db->join('users', 'users.id = users_data.userid')->where('users.id',$id);
   $query=$this->db->get();
   $this->db->select('email')->from('users')->where('users.id',$id);
   $query2=$this->db->get()->result_array();
   $res=$query->result_array();
   $query3=$this->db->select('name')->from('department')->where('id',$res[0]['specialization_id'])->get()->result_array();

   
   $res[0]['email']=$query2[0]['email'];
   $res[0]['specialization']=$query3[0]['name'];
   return $res[0];
	}

// <<<<<<< HEAD
	function get_company_data($data=null)
	{
		if(is_array($data))
		{
			$userid=$this->get_data($data['id']);
			$result=$userid['specialization_id'];
			if($result==null)
			{
				$data=array('result'=>$result);
				return $data;
			}
			else
			{
				$id=$this->ion_auth->get_user_id();
				$q="SELECT company.name,company.info,designation,salary,application_deadline,company_visit.id
				from company_visit left join company on company_visit.company_id = company.id left join eligibility on company_visit.id = eligibility.visit_id
				where eligibility.specialization_id=$result order by company.name ASC";
				$result = $this->db->query($q)->result_array();
				$rowcount = count($result);
				$data=array('rowcount'=>$rowcount,
				'result'=>$result);
			}
	          return($data);
      }
	}

		function profile_display($id=null)
	{
		$flag=0;
		$data=array('first_name'=>$this->input->post('fn'),
			'middle_name'=>$this->input->post('mn'),
			'last_name'=>$this->input->post('ln'),
			'roll_number'=>$this->input->post('roll_no'),
			'registration_number'=>$this->input->post('reg_no'),
			'gender'=>$this->input->post('gen'),
			'category_id'=>$this->input->post('catg'),
			'country'=>$this->input->post('country'),
			'mobile'=>$this->input->post('mob'),
			'permanent_address'=>$this->input->post('add'),
			'passport'=>$this->input->post('passport'),
			'birthday'=>$this->input->post('dob'),
			'skills'=>$this->input->post('skills'),
			'experience'=>$this->input->post('experience'),
			'hobbies'=>$this->input->post('hobbies'),
			'emergency_contact'=>$this->input->post('emergency_contact'),
			'linkedin'=>$this->input->post('linkedin'),
			'projects'=>$this->input->post('project'));
		$this->db->select('userid')
				->from('users_data')
				->where('userid',$id);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			if($this->input->post('branch_spe')!=null)
			{
				$data['specialization_id']=$this->input->post('branch_spe');
			}
			$this->db->where('userid',$id);
			$this->db->update('users_data', $data);
			$flag=1;
		}
		else
		{
			$data['specialization_id']=$this->input->post('branch_spe');
			$this->db->insert('users_data',$data);
		}

		$data=array('sscInst'=>$this->input->post('tenth_ins'),
			'sscUniv'=>$this->input->post('tenth_uni'),
			'sscPer'=>$this->input->post('tenth'),
			'sscPassYr'=>$this->input->post('tenth_yr'),
			'interInst'=>$this->input->post('twelfth_ins'),
			'interUniv'=>$this->input->post('twelfth_uni'),
			'interPer'=>$this->input->post('twelfth'),
			'interPassYr'=>$this->input->post('twelfth_yr'));
		$q="SELECT * from academics where userid=$id";
		$row=count($this->db->query($q)->result_array());
		if($row>0)
		{
			$this->db->where('userid',$id);
			$this->db->update('academics', $data);
		}
		else
		{
			$data['userid']=$id;
			$this->db->insert('academics',$data);			
		}
		//new
		$data=array('cgpa'=>$this->input->post('cgpa'),
			'sem1sg'=>$this->input->post('sem1'),
			'sem1cg'=>$this->input->post('sem1cg'),
			'sem2sg'=>$this->input->post('sem2'),
			'sem2cg'=>$this->input->post('sem2cg'),
			'sem3sg'=>$this->input->post('sem3'),
			'sem3cg'=>$this->input->post('sem3cg'),
			'sem4sg'=>$this->input->post('sem4'),
			'sem4cg'=>$this->input->post('sem4cg'),
			'sem5sg'=>$this->input->post('sem5'),
			'sem5cg'=>$this->input->post('sem5cg'),
			'sem6sg'=>$this->input->post('sem6'),
			'sem6cg'=>$this->input->post('sem6cg'),
			'sem7sg'=>$this->input->post('sem7'),
			'sem7cg'=>$this->input->post('sem7cg'));
		$q="SELECT * from gpa where userid=$id";
		$row=count($this->db->query($q)->result_array());
		if($row>0)
		{
			$this->db->where('userid',$id);
			$this->db->update('gpa', $data);
		}
		else
		{
			$data['userid']=$id;
			$this->db->insert('gpa',$data);			
		}
		//newend
		$q="UPDATE users_data
			SET approved=2
			where users_data.userid=$id";
		$this->db->query($q);
		return $flag;

	}

	function get_profile_info()
  {
	$id=$this->ion_auth->get_user_id();
	$q="SELECT users_data.*,gpa.*,academics.*,users.email,specialization.department_id as 'did',specialization.name as 'spe_name'
	from users_data left join users on users.id=users_data.userid left join gpa on gpa.userid=users_data.userid
	left join academics on academics.userid=users_data.userid
	left join specialization on specialization.id=users_data.specialization_id
	where users_data.userid=$id LIMIT 1";
	$result = $this->db->query($q)->row_array();
	return $result;
 }

 function companies()
 {
	$this->db->select('name as "comp_name",website')
			->from('company')
			->order_by('name','asc');
	$query=$this->db->get();
	$result=$query->result_array();
	$rowcount=$query->num_rows();
	$data=array('result'=>$result,
				'rowcount'=>$rowcount);
	return($data);
 }
 function verify($data) //checks if user has application previously stored and trying to crash or something like that
 {
	$userid=$data['id'];
	$visit_id=$data['vid'];
	$q=" SELECT * from application where userid = $userid and visit_id = $visit_id ";
	$data=$this->db->query($q)->num_rows();
	if($data>0)
		return 1;
	else
		return 0;

 }

 function insert_application($data)
 {
	$this->db->insert('application',$data);
 }

function get_round($dat)
{
	$q="SELECT max(round_no) as 'round_no' from application where visit_id=$dat";
	return $this->db->query($q)->row_array()['round_no'];
}
 function app_status($id)
 {

	$q="SELECT company_visit.id as 'id',company.name,company_visit.designation,company_visit.salary,company_visit.job_type,company_visit.job_category
		,application.round_no,status FROM application left join company_visit on company_visit.id=application.visit_id 
		left join company on company.id=company_visit.company_id
		 where application.userid=$id";
	$result=$this->db->query($q)->result_array();
	$rowcount=count($result);
	$data=array('rowcount'=>$rowcount,'result'=>$result);
	return $data;
 }

  function get_events()
  {
	  $this->db->select('title,selection_date as start')
					->from('company_visit')
					->where('stud_viewable','1');
			 
	  $query=$this->db->get();
	  $res=$query->result();
	 // print_r($res);


	$color[0]='#9c27b0';
	$color[1]= '#e91e63';
	$color[2]= '#ff1744';
	$color[3]= '#aa00ff';
	$color[4]= '#01579b';
	$color[5]= '#2196f3';
	$color[6]= '#ff5722';
	$color[7]= '#4caf50';
	$color[8]= '#03a9f4';
	$color[9]= '#009688';
	$color[10]= '#00bcd4';
	$i=0;
				foreach($res as $ex)
				  {
					$ex->color=$color[$i];
					$i++;
					$i=$i%11;
				  }
			  return($res);
  }
 

   function help_reply()
	{
		$q="SELECT users_data.first_name,users_data.last_name,users_data.mobile,users.email,department.name,department.id FROM users_groups 
		LEFT JOIN users_data on users_data.userid=users_groups.user_id
		LEFT JOIN users on users.id=users_data.userid
		LEFT JOIN specialization on specialization.id=users_data.specialization_id
		LEFT JOIN department on specialization.department_id=department.id
		 WHERE group_id=2";
		 $res=$this->db->query($q)->result_array();
		$rowcount=count($res);
		$data=array("result"=>$res,"rowcount"=>$rowcount);
		return $data;
	}
 
  function deactivate_req($id)
  {
	  $data['deactivate_status']=1;
	  $this->db->where('userid',$id)->update('users_data',$data);
  }
 
 function get_specialized($inp)
 {
	$q="SELECT id,name from specialization where department_id=$inp";
	return $this->db->query($q)->result_array();
	
 }

 function check_lock($id)
 {

	$query1=$this->db->select('lock_date')
				   ->from('profile_lock')
				   ->get();
	$date=$query1->result_array();
	$query2=$this->db->select('approved')
				   ->from('users_data')
				   ->where('userid',$id)
				   ->get();
	 $status=$query2->result_array();
	 
	if($date[0]['lock_date']<=date('Y-m-d') && $status[0]['approved']==2)
	{  
		return true;
	}
	else
		{ return false;}

 }
 function lock_it($id)
 {
	$data['approved']=1;
	$this->db->where('userid',$id)
			  ->update('users_data',$data);
 }

 function feedback_list()
 {
	$id=$this->ion_auth->get_user_id();
	$q="SELECT application.visit_id ,company.name,application.feedback from application left join 
	company_visit on application.visit_id=company_visit.id left join company on
	company.id=company_visit.company_id where application.userid=$id";
	$res=$this->db->query($q)->result_array();
	return $res;
 }

 function feedback()
 { 
   $data['visit_id']=$this->input->post('visit_id');
   $visit_id=$data['visit_id'];
   $data['description']=$this->input->post('desc');
   $q="SELECT company.name from company_visit left join company on company_visit.company_id=company.id where company_visit.id=$visit_id ";
   $res=$this->db->query($q)->result_array();
	
   $data['user_id']=$this->ion_auth->get_user_id();
   $data['company_name']=$res[0]['name'];
   $this->db->insert('feedback',$data);

   $this->db->where('userid',$data['user_id']);
   $this->db->where('visit_id',$data['visit_id'])
			->update('application',array('feedback'=>1));
 }

 function get_round_data($cid)
 {
	$id=$this->ion_auth->get_user_id();
	$q="SELECT round_no from application where visit_id=$cid";
	$r=$this->db->query($q)->row_array()['round_no'];
	$big_r=$this->get_round($cid);
	if($big_r<$r)return -1;
	else{
		$q="SELECT * from company_status where visit_id=$cid";
		$result=$this->db->query($q)->result_array();
		$data=array('result'=>$result,'round'=>$r);
		return $data;
	}
 }
 function search_company($q)
 {
	 $this->db->select('name');
	$this->db->like('name', $q);
	$this->db->from('company');
	$query = $this->db->get();
	if($query->num_rows() > 0){
	  foreach ($query->result_array() as $row){
		$row_set[] = htmlentities(stripslashes($row['name'])); //build an array
	  }
	  echo json_encode($row_set); //format the array into json data
	}
 }

  function check_approval($id)
  {
  	$query2=$this->db->select('approved')
				   ->from('users_data')
				   ->where('userid',$id)
				   ->get();
	$status=$query2->result_array();

	if($status[0]['approved']==1)
	 return true;
	else
	 return false;

  }
  function getroll()
  {
  	$id=$this->ion_auth->get_user_id();
  	$q="SELECT roll_number from users_data where userid=$id";
  	 $res=$this->db->query($q)->result_array();
  	 $resc=$res[0];
  	 return $resc;
  }
}