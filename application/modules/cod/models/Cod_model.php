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

	function add_news()
	{
		$data['title']=$this->input->post('title');
		$data['content']=$this->input->post('content');
		$data['timestamp']=date("Y-m-d H:i:s");
		$data['cod_id']=111;
		$this->db->insert('news_feed',$data);
	}

	function report($data)
	{
		$this->db->select($data);
		$this->db->from('application');
		$this->db->join('users_data', 'users_data.userid = application.userid','left');
		$this->db->join('specialization', 'users_data.specialization_id=specialization.id ','left');
		$this->db->join('department', 'specialization.department_id = department.id ','left');
		$this->db->join('gpa', 'gpa.userid = users_data.userid ','left');
		$this->db->join('users', 'users_data.userid = users.id','left');
		$this->db->join('company_visit', 'application.visit_id= company_visit.id','left');
		$this->db->join('eligibility', 'eligibility.visit_id = company_visit.id ','left');
		$this->db->join('company', 'company.id = company_visit.company_id','left');
		$this->db->group_by('company.name');
		$query=$this->db->get();
		$res=$query->result_array();
		$rowcount = $query->num_rows();
		$data=array('rowcount'=>$rowcount,
			'result'=>$res);
		return($data);
	}
	function get_events()
	{
		$this->db->select('title,selection_date as start')
		->from('company_visit');


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



	function read_student_emails_1()
	{

		$query = $this->db->query("SELECT username,email,password,first_name,last_name FROM users");
		return $query->result_array();
	}

	function modify_rounds($data)
	{

		print_r($data);
		$this->db->where('visit_id', $data['visit_id']);
		$this->db->update('company_status' ,$data);
	}

	function get_all_companies()
	{
		$q = 'SELECT * FROM `company` ORDER BY `name`';
		return $this->db->query($q)->result_array();
	}

	function get_all_sessions()
	{
		$q = 'SELECT * FROM `session` ORDER BY `id`';
		return $this->db->query($q)->result_array();
	}

	function get_all_jobtypes()
	{
		$q = 'SELECT * FROM `job_type`';
		return $this->db->query($q)->result_array();
	}

	function get_all_jobcategories()
	{
		$q = 'SELECT * FROM `job_category`';
		return $this->db->query($q)->result_array();
	}

	function get_all_specializations()
	{
		$q="SELECT `id`,`name`,`course` FROM specialization ORDER BY `name`";
		return $this->db->query($q)->result_array();
	}

	function get_specialization($id)
	{
		$q="SELECT `id`,`name`,`course` FROM specialization WHERE specialization.id=$id";
		return $this->db->query($q)->row_array();
	}

	function get_all_categories()
	{
		$q = "SELECT * FROM user_category";
		return $this->db->query($q)->result_array();
	}

	function get_all_company_visits()
	{
		$q = 'SELECT company_visit.*, company.id AS compid,company.name,company.website,company.info,company.approved,company.logofilename FROM company_visit, company WHERE company.id=company_visit.company_id ORDER BY company.name';
		return $this->db->query($q)->result_array();
	}

	function get_visit($id)
	{
		$q = "SELECT company_visit.*, company.id AS compid,company.name,company.website,company.info,company.approved,company.logofilename FROM company_visit, company WHERE company_visit.id=$id AND company.id=company_visit.company_id ORDER BY company.name";
		return $this->db->query($q)->row_array();
	}

	function get_eligibility($visit_id)
	{
		$q = "SELECT * FROM eligibility WHERE eligibility.visit_id=$visit_id";
		return $this->db->query($q)->result_array();
	}

	function get_user_dept($id)
	{
		$q = "SELECT specialization.department_id FROM specialization,users_data WHERE users_data.userid='$id' AND specialization.id=users_data.specialization_id";
		$d =  $this->db->query($q)->row_array();
		return $d['department_id'];
	}


	function get_company($id)
	{
		$q="SELECT * FROM `company` WHERE `id`='$id'";
		return $this->db->query($q)->row_array();
	}

	function add_company($data)
	{
		if($this->ion_auth->is_admin())
		{
			$data['approved'] = 1;
		}
		$this->db->insert('company',$data);
		$name = $data['name'];
		$cod_id = $data['cod_id'];
		$website = $data['website'];
		$q = "SELECT * FROM company WHERE company.name='$name' AND company.website='$website' AND company.cod_id=$cod_id";
		$d = $this->db->query($q)->row_array();
		$id = $d['id'];
		$logofilename = $this->upload_logo($id, false);
		if($logofilename == false)
		{
			$q = "DELETE FROM company WHERE company.id=$id";
			$this->db->query($q);
			return false;
		}
		$q = "UPDATE company SET company.logofilename='$logofilename' WHERE company.id=$id";
		$this->db->query($q);
		return true;
	}

	function modify_company($company_id,$data)
	{
		$company = $this->get_company($company_id);
		$data['approved'] = 4;
		if($this->input->post('logotext') && isset($_FILES['new_logo']))
		{
			$logofilename = $this->upload_logo($company_id, true);
			if($logofilename == false)
			{
				return false;
			}
		}
		if($this->ion_auth->in_group('admin'))
		{
			$data['approved'] = 1;
			if($this->input->post('logotext') && isset($_FILES['new_logo']))
			{
				//Move files
				unlink(getcwd().'\assets\images\companies\\'.$company['logofilename']);
				rename(getcwd().'\assets\images\companies\temp\\'.$logofilename, getcwd().'\assets\images\companies\\'.$logofilename);
				$data['logofilename'] = $logofilename;
			}
		}
		else
		{
			if($data['name'] != $company['name'])
			{
				$data['name'] = $company['name'].','.$data['name'];
			}
			if($data['website'] != $company['website'])
			{
				$data['website'] = $company['website'].','.$data['website'];
			}
			if($data['info'] != $company['info'])
			{
				$data['info'] = $company['info'].','.$data['info'];
			}
			$data['logofilename'] = $company['logofilename'];
			if($this->input->post('logotext') && isset($_FILES['new_logo']))
			{
				$data['logofilename'] = $data['logofilename'].','.$logofilename;
			}
		}
		$this->db->where('id',$company_id)
		->update('company',$data);
		return true;
	}

	function delete_company($company_id,$cod_id)
	{
		$data['approved']=2;
		if($this->ion_auth->in_group('admin'))
		{
			$data['approved'] = 3;
		}
		$data['cod_id']=$cod_id;
		$this->db->where('id',$company_id)
		->update('company',$data);
	}

	function upload_logo($filename ,$modify)
	{
		$config['upload_path'] = './assets/images/companies/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '512';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['file_name'] = $filename;
		$config['overwrite'] = true;
		if($modify)
		{
			$config['upload_path']=$config['upload_path'].'temp/';
			$logo = 'new_logo';
		}
		else
		{
			$logo = 'logo';
		}
		$this->load->library('upload', $config);
		if($this->upload->do_upload($logo))
		{
			$ret=$this->upload->data();
			return $ret['file_name'];
		}
		return false;
	}

	function get_visit_input()
	{
		$data['title'] = $this->input->post('title');
		$data['company_id'] =			$this->input->post('company_id');
		$data['session_id'] =			$this->input->post('session_id');
		$data['designation'] =			$this->input->post('designation');
		$data['selection_date'] =		date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('selection_dt'))));
		$data['application_deadline'] =	date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('app_deadline')))).' 23:59:59';
		$data['job_type'] =				$this->input->post('jobtype');
		$data['job_category'] =			$this->input->post('jobcatg');
		$data['stud_viewable'] =		$this->input->post('stud_view');
		$data['application_format'] =	$this->input->post('app_format');
		$data['salary'] =				$this->input->post('salary');
		$data['stipulated_amt'] =		$this->input->post('stp_amt');
		$data['bond'] =					$this->input->post('bond');

		if($data['application_format'] == 2) // Company application form
		{
			$data['app_link'] = $this->input->post('app_link');
		}
		else if($data['application_format'] == 1) // Institution application form
		{
			$data['app_link'] = null;
		}

		if($this->input->post('otherinfo'))
		{
			$data['other_information'] = $this->input->post('otherinfo');
		}

		$elig = array();
		$index = 0;
		foreach($this->input->post('spclid') as $spclid)
		{
			$elig[$index]['specialization_id'] = $spclid;
			$elig[$index]['categories'] = implode(',', $this->input->post('category'.$spclid));
			$elig[$index]['cgpa'] = $this->input->post('cgpa'.$spclid);
			$elig[$index]['ssc_percentage'] = $this->input->post('ssc'.$spclid);
			$elig[$index]['inter_percentage'] = $this->input->post('hsc'.$spclid);

			$d = $this->get_specialization($spclid);
			$course = $d['course'];

			if($course != 1)	// Post graduation course (B.Tech. == 1)
			{
				$elig[$index]['graduation_cgpa'] = $this->input->post('gradcgpa'.$spclid);
			}
			$index++;
		}

		return array(0=>$data, 1=>$elig);
	}

	function add_visit()
	{
		$input = $this->get_visit_input();
		$data = $input[0];
		$eligs = $input[1];
		$this->db->insert('company_visit',$data);

		$company_id = $data['company_id'];
		$date = $data['selection_date'];
		$q = "SELECT `id` FROM `company_visit` WHERE `company_id`='$company_id' AND `selection_date`='$date'";
		$d = $this->db->query($q)->row_array();

		foreach($eligs as $elig)
		{
			$elig['visit_id'] = $d['id'];
			$this->db->insert('eligibility',$elig);
		}
		$id=$d['id'];
		$q="INSERT into company_status values('$id',0,'No',0)";
		$this->db->query($q);
		return true;
	}

	function modify_visit()
	{
		$input = $this->get_visit_input();
		$data = $input[0];
		$eligs = $input[1];

		$visitid = $this->input->post('modify_id');

		$this->db->where('id',$visitid);
		$this->db->update('company_visit',$data);

		$q = "DELETE FROM eligibility WHERE eligibility.visit_id=$visitid";
		$this->db->query($q);
		foreach($eligs as $elig)
		{
			$elig['visit_id'] = $visitid;
			$this->db->insert('eligibility',$elig);
		}

		return true;
	}

	function delete_visit($id)
	{
		$q = "DELETE FROM eligibility WHERE eligibility.visit_id=$id";
		$this->db->query($q);
		$q = "DELETE FROM company_visit WHERE company_visit.id=$id";
		$this->db->query($q);
	}



	function get_user_info()
	{
		$id=$this->ion_auth->get_user_id();
		$this->db->select('users_data.first_name,roll_number,encrypt,specialization_id,userid')
		->from('users_data')
		->where('users_data.userid',$id);
		$query=$this->db->get();
		$res=$query->result_array();
		return $res[0];
	}

	function get_application_data($data=null,$status=null)
	{
		$result=null;
		$q="SELECT id from company_visit where company_visit.company_id=$data";
		$vis=$this->db->query($q)->result_array();
		if(count($vis)==0)return -1;
		foreach ($vis as $visitid) {
			$round_no=$this->get_round($visitid['id']);
			print_r($round_no);
			if($round_no==null){
				$flag=-1;continue;
			}
			else{
				$flag=0;
			}
			if ($status==1) { 
				$q="SELECT status,users_data.*,gpa.cgpa,eligibility.cgpa as cutoff,company.name as company_name,
				session.name as session_name,department.name as dept_name,course.course_name as cname,company_status.round_no,
				application.round_no
				as 'round' from application 
				left join users_data on users_data.userid=application.userid 
				left join company_visit on company_visit.id=application.visit_id 
				left join company on company_visit.company_id=company.id
				left join gpa on gpa.userid=application.userid 
				left join specialization on users_data.specialization_id=specialization.id
				left join department on department.id=specialization.department_id 
				left join course on course.course_id=specialization.course
				left join company_status on company_status.visit_id=application.visit_id 
				left join eligibility on eligibility.visit_id=application.visit_id
				left join session on company_visit.session_id=session.id
				where company.id =$data and company_status.round_no=$round_no";
				$result=$this->db->query($q)->result_array();
			}
			else{  
				$q="SELECT status,users_data.*,gpa.cgpa,eligibility.cgpa as cutoff,company.name as company_name,session.name as session_name,
				department.name as dept_name,course.course_name as cname ,company_status.round_no,application.round_no
				as 'round' from application 
				left join users_data on users_data.userid=application.userid 
				left join company_visit on company_visit.id=application.visit_id 
				left join company on company_visit.company_id=company.id
				left join gpa on gpa.userid=application.userid 
				left join specialization on users_data.specialization_id=specialization.id
				left join department on department.id=specialization.department_id 
				left join course on course.course_id=specialization.course
				left join company_status on company_status.visit_id=application.visit_id 
				left join eligibility on eligibility.specialization_id=users_data.specialization_id
				-- left join eligibility on eligibility.visit_id=application.visit_id
				left join session on company_visit.session_id=session.id
				where company.id =$data and company_status.round_no=$round_no and status!=2 and eligibility.visit_id=application.visit_id";
				$result=$this->db->query($q)->result_array();}
			}
			if($result==null)return -2;
			$data=array('rowcount'=>count($result),
				'result'=>$result);
			if($flag==-1)return $data=-1;
			return($data);

		}

		function enter_application($data)
		{
			if(is_array($data))
			{
				$status=array('status'=>1);
				foreach ($data as $each) {
					$q="SELECT visit_id,round_no from application where userid=$each";
					$result=$this->db->query($q)->row_array();
					$round=$this->get_round($result['visit_id']);
					if($round>$result['round_no'])
					{
						$r=$result['round_no']+1;
						$status['round_no']=$r;
						$this->db->where('userid',$each);
						$this->db->where('visit_id',$result['visit_id']);
						$this->db->update('application',$status);
						return 1;
					}
					else if($round<=$result['round_no'])
					{
						return -1;
					}
				}
			}
		}

		function get_company_data()
		{
			$this->db->select('company.id,company.name')
			->from('company');
			$query=$this->db->get();
			$result=$query->result_array();
			$rowcount=$query->num_rows();
			$data=array('rowcount'=>$rowcount,
				'result'=>$result);
			$this->db->from('company_status');
			$this->db->order_by("round_no", "desc");
			$query = $this->db->get(); 
			$res=$query->result_array();
			$x=0;
			foreach ($res as $key => $value) {
				$x=$value['round_no'];
				break;
			}
			$data['round']=$x;
			return($data);
		}
		function show_all_news()
		{

			$this->db->select('*')
			-> from('news_feed')
			->order_by('timestamp');
			$query=$this->db->get();
			$result=$query->result_array();
			return $result;    
		}
		function modify_news($id,$data)
		{


			$this->db->where('post_id',$id)
			->update('news_feed', $data); 


		}
		function delete_news($id)
		{
			$this->db->where('post_id',$id)
			->delete('news_feed');

		}

		function prolock()
		{
			$q="SELECT users_data.userid,users_data.registration_number,users_data.first_name,users_data.approved from users_data";
			$res=$this->db->query($q)->result_array();
			$rowcount=count($res);
			$data=array("result"=>$res,"rowcount"=>$rowcount);
			return $data;
		}

		function get_company_rounds()
		{
			$q="SELECT max(round_no) as 'round_no',round_name,visit_id,company.name,company.id,company_visit.session_id from company_status
			left join company_visit on company_status.visit_id=company_visit.id 
			left join company on company.id=company_visit.company_id 
			group by visit_id";
			return ($this->db->query($q)->result_array());
		}

  function upgrade_round($id)
  {
  	$result=null;
  	$r=$this->get_round($id);
  	$q="SELECT round_name,final from company_status where visit_id=$id and round_no=$r";
  	$retdata=$this->db->query($q)->row_array();
  	$r1=$retdata['round_name'];
  	$status=$retdata['final'];
  	if($status==1)
  	{
  		return -1;
  	}
  	else
  	{
  		$q="SELECT * from company_status where visit_id=$id group by round_no asc";
  	  	$result=$this->db->query($q)->result_array();
  	  	$rowcount=count($result);
  	  	$round=$rowcount;
  	  	$q="INSERT into company_status values($id,$round,'$r1',0)";
  	  	$this->db->query($q);
  	  	$que="SELECT round_no,round_name from company_status WHERE visit_id=$id group by round_no desc";
  	  	$result=$this->db->query($que)->row_array();
  	 }
  	return $result;
  }

  function final_round($id)
  {
  	$r=$this->get_round($id);
  	$q="UPDATE company_status SET final=1 WHERE visit_id=$id and round_no=$r";
  	$this->db->query($q);
  	return $r;
  }
  function get_round($dat)
  {
  	$q="SELECT max(round_no) as 'round_no' from company_status where visit_id=$dat";
  	return $this->db->query($q)->row_array()['round_no'];
  }
  function dismiss_round($id)
  {
  	$r=$this->get_round($id);
  	$q="SELECT round_name,final from company_status where visit_id=$id and round_no=$r";
  	$retdata=$this->db->query($q)->row_array();
  	$r1=$retdata['round_name'];
  	$status=$retdata['final'];
  	if($status==1)
  	{
  		return -2;
  	}
  	else
  	{
	  	$q="SELECT round_no from application where visit_id=$id";
	  	$result=$this->db->query($q)->result_array();
	  	foreach ($result as $key => $value) {
	  		if($value['round_no']>=$r)return -1;
	  	}
	  	if($r==0)return -1;
	  	$this->db->where('visit_id', $id);
	  	$this->db->where('round_no', $r);
		$this->db->delete('company_status'); 
	  	$que="SELECT round_no,round_name from company_status WHERE visit_id=$id group by round_no desc";
	  	$result=$this->db->query($que)->row_array();
	  	return $result;
  	}
  }

  function round_view($visit_id)
  {
  	$q="SELECT company.name,company_status.*,company_visit.*
  	 from company,company_status,company_visit 
  	 where company_status.visit_id=$visit_id and company_visit.company_id=company.id 
  	 and company_status.visit_id=company_visit.id group by round_no desc";
  	 return($this->db->query($q)->result_array());
  }

  function finalize_round($id,$round)
  {
  	$q="UPDATE company_status SET round_name='$id' WHERE round_no=$round";
  	$this->db->query($q);
  }
  
  function history_round($vid)
  {
  	$q="SELECT * from company_status where visit_id=$vid order by round_no desc";
  	$result=$this->db->query($q)->result_array();
  	return $result;
  }
		function get_all_special()
		{
			$q="SELECT id,name,abbr FROM specialization ";
			$res=$this->db->query($q)->result_array();
			return $res;
		}
	}

