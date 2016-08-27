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
	
	function get_user_roll($id)
	{
		$this->db->select('roll_number');
		$this->db->from('users_data');
		$this->db->join('users', 'users.id = users_data.userid')->where('users.id',$id);
		$query=$this->db->get();
		return $query->row_array();
	}

	function get_gpa_table($num)
	{
		$q="SELECT gpa.*,users_data.first_name as name,users_data.registration_number as reg_number,department.name as dept_name
		from gpa  left join users_data on gpa.userid=users_data.userid
		left join specialization on users_data.specialization_id=specialization.id left join department on 
		specialization.department_id=department.id where approval_status=$num";
		$data=$this->db->query($q);
		return($data->result_array());
	}

	function approve_company($mode,$action,$id)
	{
		if($mode == 'add')
		{
			if($action == 'approve')
			{
				$q = "UPDATE `company` SET `approved`=1 WHERE `id`=$id";
				$this->db->query($q);
			}
			elseif($action == 'reject')
			{
				$q = "DELETE FROM company WHERE id=$id";
				$this->db->query($q);
			}
		}
		elseif($mode == 'delete')
		{
			if($action == 'approve')
			{
				$q = "UPDATE `company` SET `approved`=3 WHERE `id`=$id";
				$this->db->query($q);
			}
			elseif($action == 'reject')
			{
				$q = "UPDATE `company` SET `approved`=1 WHERE `id`=$id";
				$this->db->query($q);
			}
		}
		elseif($mode == 'modify')
		{
			$q = "SELECT * FROM company WHERE id=$id";
			$company = $this->db->query($q)->row_array();
			$names = explode(',',$company['name']);
			$sites = explode(',',$company['website']);
			$logos = explode(',',$company['logofilename']);
			$infos = explode(',',$company['info']);
			$oldname = $names[0];
			$oldsite = $sites[0];
			$oldlogo = $logos[0];
			$oldinfo = $infos[0];
			if(count($names) === 2){$newname = $names[1];}else{$newname = $oldname;}
			if(count($sites) === 2){$newsite = $sites[1];}else{$newsite = $oldsite;}
			if(count($infos) === 2){$newinfo = $infos[1];}else{$newinfo = $oldinfo;}
			if(count($logos) === 2){$newlogo = $logos[1];$tmplogo = true;}else{$tmplogo = false;}
			if($action == 'approve')
			{
				$q = "UPDATE company SET name='$newname', website='$newsite', info='$newinfo', approved=1";
				if($tmplogo)
				{
					unlink(getcwd().'\assets\images\companies\\'.$oldlogo);
					rename(getcwd().'\assets\images\companies\temp\\'.$newlogo, getcwd().'\assets\images\companies\\'.$newlogo);
					$q = $q.", logofilename='$newlogo'";
				}
				$q = $q." WHERE id=$id";
				$this->db->query($q);
			}
			elseif($action == 'reject')
			{
				if($tmplogo)
				{
					unlink(getcwd().'\assets\images\companies\temp\\'.$newlogo);
				}
				$q = "UPDATE company SET name='$oldname', website='$oldsite', info='$oldinfo', approved=1, logofilename='$oldlogo' WHERE id=$id";
				$this->db->query($q);
			}
		}
	}

	function approve_gpa_status($userid)
	{
		$data['approval_status']=1;
		$this->db->where('userid',$userid)->update('gpa',$data);
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

	function revert_application($id=null)
	{
		if(isset($id))
		{
			$data = array('status'=>1);
			$this->db->where('id', $id);
			$this->db->update('application',$data); 
			$this->db->select('users_data.*,company.name as "comp_name",application.*')
			->from('application')
			->join('users_data','application.userid=users_data.userid')
			->join('company_visit','company_visit.id=application.visit_id','left')
			->join('company','company.id=company_visit.company_id','left')
			->where('status',2);
			$query=$this->db->get();
			$result=$query->result_array();
			$rowcount=$query->num_rows();
			$data=array('result'=>$result,'rowcount'=>$rowcount);
			return $data;
		}
	}

	function approved_application($id=null)
	{
		if(isset($id))
		{
			$data = array('status'=>2);
			$this->db->where('id', $id);
			$this->db->update('application',$data); 
			$this->db->select('users_data.*,company.name as "comp_name",application.*')
			->from('application')
			->join('users_data','application.userid=users_data.userid')
			->join('company_visit','company_visit.id=application.visit_id','left')
			->join('company','company.id=company_visit.company_id','left')
			->where('status',2);
			$query=$this->db->get();
			$result=$query->result_array();
			$rowcount=$query->num_rows();
			$data=array('result'=>$result,'rowcount'=>$rowcount);
			return $data;
		}
	}

	function get_status($id=null)
	{
		$this->db->select('users_data.*,company.name as "comp_name",application.status,application.id,gpa.cgpa,eligibility.cgpa as "ecg"')
		->from('application')
		->join('users_data','application.userid=users_data.userid')
		->join('company_visit','company_visit.id=application.visit_id','left')
		->join('company','company.id=company_visit.company_id','left')
		->join('eligibility','eligibility.visit_id=application.visit_id','left')
		->join('gpa','gpa.userid=application.userid','left');
		$query=$this->db->get();
		$result=$query->result_array();
		$rowcount=$query->num_rows();
		$data=array('result'=>$result,'rowcount'=>$rowcount);
		$this->db->select('round_no')
		->from('company_status')
		->order_by('round_no','desc');
		$query=$this->db->get();
		$result=$query->row_array();
		$data['round_no']=$result['round_no'];
		return $data;
	}

	function get_events()
	{
		$this->db->select('title,selection_date as start')
		->from('company_visit');
		$query=$this->db->get();
		$res=$query->result();
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

	function get_unapproved_companies()
	{
		$q="SELECT * FROM `company` WHERE `approved`!=1 AND `approved`!=3 ORDER BY `approved`";
		return $this->db->query($q)->result_array();
	}

	function prolock()
	{
		$q="SELECT users_data.userid,users_data.registration_number,users_data.first_name,users_data.approved from users_data";
		$res=$this->db->query($q)->result_array();
		$rowcount=count($res);
		$data=array("result"=>$res,"rowcount"=>$rowcount);
		return $data;
	}

	function lock_pro($data)
	{
		$q="UPDATE users_data SET approved=1 WHERE userid=$data";
		$this->db->query($q);
	}

	function revert_pro($data)
	{
		$q="UPDATE users_data SET approved=2 WHERE userid=$data";
		$this->db->query($q);
	}

	function get_cod()
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

	function deactivate_req()
	{
		$query=$this->db->from('users_data')
		->where('deactivate_status',1)
		->get();
		$data=$query->result_array();
		return $data; 
	}

	function deactivate_approve($id)
	{
		$this->db->where('userid',$id)
		->update('users_data',array('deactivate_status'=>2));
		$this->db->where('id',$id)
		->update('users',array('active'=>0));
	}

	function deactivate_dismiss($id)
	{
		$this->db->where('userid',$id)
		->update('users_data',array('deactivate_status'=>3));
	}
	function set_autolock()
	{
		$data['lock_date'] = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('dat'))));
		$query=$this->db->from('profile_lock')->get()->result_array();
		if(count($query)>0)
		{
			$this->db->where($id,1)
			->update('profile_lock',$data);
		}
		else
		{
			$this->db->insert('profile_lock',$data);
		}
	}

	function companies()
	{
		$q="SELECT company.name as name,company.id as id,company_visit.id as visit_id from company,company_visit WHERE
		company.id=company_visit.company_id";
		$res=$this->db->query($q)->result_array();
		return $res;
	}

	function show_feedback()
	{
		$id=$this->input->post('company_id');
		$id_exp=explode('|', $id);
		$name1=$this->db->select('name')->from('company')->where('id',$id_exp[0])->get()->result_array();
		$name=$name1[0]['name'];
		$res=$this->db->select('description,user_id')->from('feedback')
		->where('company_name',$name)->get()->result_array();
		return $res;
	}

	function search_student($q)
	{
		$this->db->select('first_name');
		$this->db->like('first_name', $q);
		$this->db->from('users_data');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$row_set[] = htmlentities(stripslashes($row['first_name'])); //build an array
			}
			echo json_encode($row_set); //format the array into json data
		}
	}
	function get_all_special()
	{
		$q="SELECT id,name,abbr FROM specialization ";
		$res=$this->db->query($q)->result_array();
		return $res;
	}
	function get_special_abbr($id)
	{
		$q="SELECT abbr FROM specialization WHERE $id=id";
		$res=$this->db->query($q)->result_array();
		$res1=$res[0]['abbr'];
		return $res1;
	}
	function add_csvdata($array,$id=1)
	{    
		$this->load->model('auth/ion_auth_model');
		$this->load->helper('string');
		$dupli = array();// duplicate email address
		foreach($array as $row)
		{
			//additional data
			$data['first_name']=$row['0'];
			$data['last_name']=$row['1'];
			$data['phone']=$row['2'];
			$data['username']='taps'.$row['3'];
			$identity=$row['5'];
			$data['active']=1;

			$email=$row['5'];
			$data['email']=$row['5'];
			$data['roll_number']=$row['3'];
			$data['registration_number']=$row['4'];
			$rand=random_string('alnum', 8);


			//print_r($data);
			$user_id=$this->ion_auth->register($identity,$rand,$email,$data);
			if($user_id==NULL)
			{
				//echo $identity." Email exists";
				$dupli[]=$data;

			}
			else
			{
				//echo "user id array";

			//print_r($user_id) ;
			// print_r($data);
			// echo "User ID array:";
			
			$user_data['userid']=$user_id['id'];
			$user_data['name'] = $row[0]." ".$row['1'];
			$user_data['roll_number']=$row['3'];
			$user_data['registration_number ']=$row['4'];
			$user_data['first_name ']=$row['0'];
			$user_data['last_name ']=$row['1'];
			$user_data['specialization_id']=$id;
			$user_cgpa['userid']=$user_id['id'];
			$user_cgpa['approval_status']=0;
			$user_data['encrypt']=$row['3'].$rand;

			$this->db->insert('users_data',$user_data);
			$this->db->insert('gpa',$user_cgpa);
			}
			
			
		}
			//echo "Following are duplicates \r\n";
			//print_r($dupli);
		//print_r($dupli);
		return ($dupli);
	}
	function get_all_data_users_special($special_id)
	{
		$q="SELECT * FROM users_groups 
		LEFT JOIN users_data on users_data.userid=users_groups.user_id
		LEFT JOIN users on users.id=users_data.userid
		LEFT JOIN specialization on specialization.id=users_data.specialization_id
		LEFT JOIN department on specialization.department_id=department.id
		WHERE users_data.specialization_id=$special_id";
		$res=$this->db->query($q)->result_array();
		//$data=array("result"=>$res,"rowcount"=>$rowcount);
		return $res;
	}
	function get_all_users_special($special_id)
	{
		$q="SELECT * FROM users_groups 
		LEFT JOIN users_data on users_data.userid=users_groups.user_id
		LEFT JOIN users on users.id=users_data.userid
		LEFT JOIN specialization on specialization.id=users_data.specialization_id
		LEFT JOIN department on specialization.department_id=department.id
		WHERE users_data.specialization_id=$special_id";
		$res=$this->db->query($q)->result_array();
		//$data=array("result"=>$res,"rowcount"=>$rowcount);
		return $res;
	}

}