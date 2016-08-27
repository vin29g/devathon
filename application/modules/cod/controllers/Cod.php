<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cod extends MX_Controller
{
	function __construct()
	{




		parent::__construct(); 
		$this->load->model('cod_model');
		$this->load->helper('date');
		$this->load->library('auth/ion_auth');
		if(!$this->ion_auth->logged_in())
			redirect('/auth/login/','refresh');
		if(!$this->ion_auth->in_group('cod'))
			redirect('/student/','refresh');

	}

	function index()
	{
		
  //$this->_render_page('add_visit',$data);
		$this->add_visit();
	}
	
function _render_page($view, $data=null)
{
	$data['user']=$this->cod_model->get_user_info();
	$this->load->view('cod_dash', $data);
	$this->load->view($view, $data);
	$this->load->view('footer', $data);
}
function upload_csv($data=NULL)
{   
    $data1['name']=$data;
    $data1['special']=$this->cod_model->get_all_specializations();
    $data2=get_userdata();
    $this->load->view('cod_dash', $data2);
    $this->load->view('upload_base', $data1);
    $this->load->view('footer', $data2);
 

}
function csv_to_array($id){
	echo "please wait";
	$string_csv = "assets/uploads/".$id.".csv";        

	$this->load->library('excel');
	   // $this->load->library('PHPexcel/IOFactory.php'); 
	$reader = PHPExcel_IOFactory::createReader('CSV')
	->setDelimiter(',')
	->setEnclosure('"')
	->setSheetIndex(0)
	->load($string_csv); 

	$objWorksheet = $reader->setActiveSheetIndex(0);
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

	//read from file
	for ($row = 0; $row <= $highestRow; ++$row)
	{
	   $file_data = array();
	   for ($col = 0; $col <= $highestColumnIndex; ++$col)
	   {  
		  $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
		  $file_data[$col]=trim($value);
	  }
	  $result[] = $file_data;
  }   

  //print_r($result);
   
  
 $excluded_result =$this->cod_model->add_csvdata($result);
 $this->send_emails();
 
 $this->upload_csv($excluded_result);

}

   function cod_help()
{
    $data2=get_userdata();
    $this->load->view('cod_dash', $data2);
	$this->load->view('cod_help',$data2);
	$this->load->view('footer',$data2);
}
	
	


	function add_news()
	{

		$this->cod_model->add_news();
	}




	function show_news_feed_form()
	{
		$data=get_userdata();
		$this->_render_page('cod_news_form',$data);
	}

	function return_events()
	{
		echo json_encode($this->cod_model->get_events());
	}

	function show_calender()
	{
		
		$data['object']=$this->cod_model->get_events();
		$this->_render_page('customized_calender',$data);

	}


	function report()
	{
		$data=get_userdata();
		$this->_render_page('report_view',$data);
	} 

	function reportgen()
	{
		$data=array();
		$index=2;
		$rep='CONCAT(users_data.first_name , '.'  '.',users_data.last_name),registration_number,company.name,eligibility.cgpa as ecg';
		$label=array('Full Name','Reg No','Company','Cutoff');
		foreach ($_POST as $key => $value) {
			$data[$key]=$value;
			if($value==1)
			{
				switch ($key) {
					case 'dname':
					$label[].='Branch';
					$rep.=",".'department.name';
					break;
					case 'cgpa':
					$label[].='CGPA';
					$rep.=",".'gpa.cgpa';
					break;
					default:
					$rep.=",".$key;
					$label[].=$key;
					break;
				}
				$index++;
			}
		}
		$data=$this->cod_model->report($rep);
		$data['label']=$label;
		$this->_render_page('report_gen',$data);
	}
	function add_news_feed()
	{
		$this->cod_model->add_news();
		$this->show_all_news();
	}

	function all_companies()
	{
		$data=get_userdata();
		$data['companies'] = $this->cod_model->get_all_companies();
		if(null !== $this->session->flashdata('action'))
		{
			$data['action'] = $this->session->flashdata('action');
		}
		else
		{
			$data['action'] = 'none';
		}
		$this->_render_page('all_companies',$data);
	}

	function add_company()
	{
		
		if($this->input->post('company_name') && $this->input->post('company_website') && $this->input->post('info') && isset($_FILES['logo']))
		{
			$add['name']=$this->input->post('company_name');
			$add['website']=$this->input->post('company_website');
			$add['cod_id'] = $this->ion_auth->user()->row()->id;
			$add['info'] = $this->input->post('info');
			$this->session->set_flashdata('company_added', $this->cod_model->add_company($add));
			redirect('cod/add_company');
		}
		if(null !== $this->session->flashdata('company_added'))
		{
			$data['company_added'] = $this->session->flashdata('company_added');
		}
		$data['j']="lol";
		$this->_render_page('add_company',$data);
		
	}

	function modify_company()
	{
		if($this->input->post('new_name') && $this->input->post('new_website') && $this->input->post('company') && $this->input->post('info'))
		{
			$company_id = $this->input->post('company');
			$modify['name']=$this->input->post('new_name');
			$modify['website']=$this->input->post('new_website');
			$modify['cod_id'] = $this->ion_auth->user()->row()->id;
			$modify['info'] = $this->input->post('info');
			if($this->cod_model->modify_company($company_id, $modify))
			{
				$this->session->set_flashdata('action','modified');
			}
			else
			{
				$this->session->set_flashdata('action','not modified');
			}
			redirect('cod/all_companies');
		}
		if(!$this->input->post('modifycomp'))
		{
			redirect('cod/all_companies');
			return;
		}
		$user=get_userdata();
		$data['company'] = $this->cod_model->get_company($this->input->post('modifycomp'));
		$this->load->view('cod_dash',$user);
		$this->load->view('modify_company',$data);
		$this->load->view('footer');
	}

	function delete_company()
	{
		if($this->input->post('company'))
		{
			$company_id = $this->input->post('company');
			$cod_id = $this->ion_auth->user()->row()->id;
			$this->cod_model->delete_company($company_id,$cod_id);
			$this->session->set_flashdata('action', 'deleted');
			redirect('cod/all_companies');
		}
		if(!$this->input->post('deletecomp'))
		{
			redirect('cod/all_companies');
			return;
		}
		$user=get_userdata();
		$data['company'] = $this->cod_model->get_company($this->input->post('deletecomp'));
		$this->load->view('cod_dash',$user);
		$this->load->view('delete_company',$data);
		$this->load->view('footer');
	}

	function check_visit_post_data()
	{
		if(!$this->input->post('title')){return false;}
		if(!$this->input->post('company_id')){return false;}
		if(!$this->input->post('session_id')){return false;}
		if(!$this->input->post('designation')){return false;}
		if(!$this->input->post('selection_dt')){return false;}
		if(!$this->input->post('app_deadline')){return false;}
		if(!$this->input->post('jobtype')){return false;}
		if(!$this->input->post('jobcatg')){return false;}
		if(!$this->input->post('stud_view')){return false;}
		if(!$this->input->post('app_format')){return false;}
		else
		{	//Comapny application form check
			if($this->input->post('app_format') == 2 && !$this->input->post('app_link')){return false;}
		}
		if(!$this->input->post('salary')){return false;}
		if(!$this->input->post('stp_amt')){return false;}
		if(!$this->input->post('bond')){return false;}
		if($this->input->post('spclid'))
		{
			$spclids = $this->input->post('spclid');
			foreach($spclids as $spclid)
			{
				if(!$this->input->post('category'.$spclid)){return false;}
				if(!$this->input->post('cgpa'.$spclid)){return false;}
				else
				{
					$cgpa = $this->input->post('cgpa'.$spclid);
					if(!($cgpa>=5 && $cgpa<=10)){return false;}
				}
				if(!$this->input->post('ssc'.$spclid)){return false;}
				else
				{
					$ssc = $this->input->post('ssc'.$spclid);
					if(!($ssc>=30 && $ssc<=100)){return false;}
				}
				if(!$this->input->post('hsc'.$spclid)){return false;}
				else
				{
					$hsc = $this->input->post('hsc'.$spclid);
					if(!($hsc>=30 && $hsc<=100)){return false;}
				}
				$d = $this->cod_model->get_specialization($spclid);
				$course = $d['course'];
				if($course!=1)	//Post-grad course
				{
					if(!$this->input->post('gradcgpa'.$spclid)){return false;}
					else
					{
						$gradcgpa = $this->input->post('gradcgpa'.$spclid);
						if(!($gradcgpa>=5 && $gradcgpa<=10)){return false;}
					}
				}
			}
		}
		else
		{
			return false;
		}
		return true;
	}

	function add_visit()
	{
		
		if($this->check_visit_post_data())
		{
			$this->session->set_flashdata('visit_added', $this->cod_model->add_visit());
			redirect('cod/add_visit');
		}
		if(null !== $this->session->flashdata('visit_added'))
		{
			$data['visit_added'] = $this->session->flashdata('visit_added');
		}
		$data['companies'] = $this->cod_model->get_all_companies();
		$data['sessions'] = $this->cod_model->get_all_sessions();
		$data['jobtypes'] = $this->cod_model->get_all_jobtypes();
		$data['jobcatgs'] = $this->cod_model->get_all_jobcategories();
		$data['spcls'] = $this->cod_model->get_all_specializations();
		$data['catgs'] = $this->cod_model->get_all_categories();
		$this->_render_page('add_visit',$data);
	}

	function modify_visit()
	{
		if(!$this->input->post('modify_id'))
		{
			redirect('cod/all_visits');
		}
		$data = get_userdata();
		$this->load->view('cod_dash',$data);
		if($this->input->post('modify_id') && $this->check_visit_post_data())
		{
			$this->session->set_flashdata('visit_modified', $this->cod_model->modify_visit());
			redirect('cod/all_visits');
		}
		$data['visit'] = $this->cod_model->get_visit($this->input->post('modify_id'));
		$data['companies'] = $this->cod_model->get_all_companies();
		$data['sessions'] = $this->cod_model->get_all_sessions();
		$data['jobtypes'] = $this->cod_model->get_all_jobtypes();
		$data['jobcatgs'] = $this->cod_model->get_all_jobcategories();
		$data['spcls'] = $this->cod_model->get_all_specializations();
		$data['catgs'] = $this->cod_model->get_all_categories();
		$data['eligs'] = $this->cod_model->get_eligibility($this->input->post('modify_id'));
		$this->load->view('modify_visit',$data);
		$this->load->view('footer');
	}

	function delete_visit()
	{
		if(!$this->input->post('delete_id'))
		{
			redirect('cod/all_visits');
		}
		$id = $this->input->post('delete_id');
		$this->cod_model->delete_visit($id);
	}

	function all_visits()
	{
		$data = get_userdata();
		$this->load->view('cod_dash',$data);
		if(null !== $this->session->flashdata('visit_modified'))
		{
			$data['visit_modified'] = $this->session->flashdata('visit_modified');
		}
		$data['visits'] = $this->cod_model->get_all_company_visits();
		$this->load->view('all_visits',$data);
		$this->load->view('footer');
	}

	function send_emails()
	{        

	   // print_r($data);
		$email = 'anmoluday@gmail.com';
		$password = 'samsunggalaxyminigingerbread2.3.4';

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';

		$config['smtp_user']    = $email;
		$config['smtp_pass']    = $password;
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      



		$data1 = $this->cod_model->read_student_emails_1();
		$data4 = $this->cod_model->no_of_rows();
		print_r($data4);
		for($i=1;$i<$data4;$i++)
		{

			$this->email->initialize($config);
			$this->email->from($email, 'TAPS Coordinator');
			$key = $data1[$i]['username'];
		//print_r($key);
			$this->email->to($data1[$i]['email']); 
			$email_body = "<p> Hello . Welcome to Training and Placement portal NITW </br></p><h6> Username :".$data1[$i]['username']."</br><p>Please follow this link to login and ciick on forgotten password. <a href=".base_url('auth/login').">Login</a> Cheers</p> ";
			$this->email->subject('TAPS Activation');
			$this->email->message($email_body);  
			$this->email->send();
	   // print_r($data1[$i]['email']);


			$this->email->clear();


			$this->email->print_debugger();
		}
	}


	function round()
	{
		
		$data=$this->cod_model->get_company_data();
		$this->_render_page('round',$data);
	}

	function apply_students()
	{
		$data=get_userdata();
		$this->load->view('cod_dash',$data);
		$data=$this->cod_model->get_company_data();
		$this->load->view('app_std',$data);
		$this->load->view('footer',$data);
	}

	function appl_res()
	{
		$comp=$this->input->post('company');
		if($comp!='none')
		{
			$data=$this->cod_model->get_users($comp);
			if($data==-1)
				echo "Rounds not created for this company";
			else{
				$data['comp']=$comp;
				$this->load->view('round_view',$data);
			}
		}
	}
	function round_res()
	{
		$comp=$this->input->post('company');
		if($comp!='none')
		{
			$data=$this->cod_model->get_application_data($comp,0);
			if($data==-1)
				echo "Rounds not created for this company";
			elseif($data==-2)
				echo "Rounds created but no one applied";
			else{
				$data['comp']=$comp;
				$this->load->view('round_view',$data);
			}
		}
	}

	function round_eligible()
	{
		$result=array();
		foreach ($_POST as $key => $value) {
			if($value=='eligible')
			{
				$result[]=$key;
			}
		}
		$this->cod_model->enter_application($result);
		$data=$this->input->post('company');
		$data=$this->cod_model->get_application_data($data,1);
		$this->_render_page('round_res',$data);
	}
	function show_all_news()
	{


		$data['results']=$this->cod_model->show_all_news();
		$this->_render_page('show_all_news',$data);
		
	}
	function modify_news()
	{
		$data['message']="none";
		$this->_render_page('modify_news',$data);
		
	}
	function modified_news()
	{
		$id=$this->input->post("post_id");
		$data['title']=$this->input->post('title');
		$data['content']=$this->input->post('content');
		$data['cod_id']=111;
		$this->cod_model->modify_news($id,$data);
		$this->show_all_news();
		
	}
	function delete_news()
	{
		$id = $this->input->post("post_id");
		$data=get_userdata();
		$this->cod_model->delete_news($id);
		$this->show_all_news();  
	}
	function download_sample()
	{
		$this->load->helper('download');
		$data=base_url('/assets/uploads/sample.csv');
		force_download('sample.csv', $data);

	}

	function sms()
	{
		if($this->input->post('usermode'))
		{
			$usermode = $this->input->post('usermode');
			if($usermode == 1)
			{

			}
			else if($usermode == 2)
			{
				if(null !== $this->input->post('no_students'))
				{
					$number = $this->input->post('no_students');
					for($i=1;$i<=$number;$i++)
					{
						if(null !== $this->input->post('number'.$i))
						{
							echo $this->input->post('number'.$i).'<br>';
						}
						else
						{
							echo 'Error : student not found';
							break;
						}
					}
				}
				else
				{
					echo 'Error : no students';
				}
			}
			else if($usermode == 3)
			{
				if($this->ion_auth->in_group('admin'))
				{
					if(null !== $this->input->post('branchselect'))
					{
						echo $this->input->post('branchselect');
					}
					else
					{
						echo 'Error : branchselect not present';
					}
				}
				else
				{
					echo 'Error : Not an admin';
				}
			}
			else if($usermode == 4)
			{
				if($this->ion_auth->in_group('admin'))
				{
					//echo 'All';
					$this->send_sms('all');
				}
				else
				{
					echo 'Error : Not an admin';
				}
			}
		}
		$user = get_userdata();
		$this->load->view('cod_dash',$user);
		$data['branch'] = $this->cod_model->get_dept_name($this->cod_model->get_user_dept($this->ion_auth->user()->row()->id));
		$data['departments'] = $this->cod_model->get_all_departments();
		$this->load->view('sms',$data);
		$this->load->view('footer');
	}

	function send_sms($mode, $regnumbers = '')
	{
		
	}

	function show_modify_round_visits()
	{
		
		$result=$this->cod_model->get_company_rounds();
		$data=array('result'=>$result,'rowcount'=>count($result));
		$this->_render_page('show_rounds',$data);
	}

	function round_edit()
	{
		$visit=$this->input->post('action');
		$result=$this->cod_model->round_view($visit);
		$rowcount=count($result);
		$data = array('rowcount' =>$rowcount ,'result'=>$result );
		$this->_render_page('show_rounds_comp',$data);
	}
	function upgrade_round()
	{
		$appid=$this->input->post('id');
		$data=$this->cod_model->upgrade_round($appid);
		if($data==-1)
		{
			echo json_encode(array('m1' =>1,));
		}
		else
		{		
			$round_no=$data['round_no'];
			$round_name=$data['round_name'];
			echo json_encode(array("m2"=>"Round $round_no","m1"=>"<input value='$round_no' name='hid' hidden>","m3"=>"<input type='text' name='inp1' value='$round_name'>"));
		}
	}
	function get_round()
	{
		echo $this->cod_model->get_round();
	}
	function dismiss_round()
	{
		$appid=$this->input->post('id');
		$data=$this->cod_model->dismiss_round($appid);
		if($data==-1)
		{
			echo json_encode(array("m2"=>-1));

		}
		else if($data==-2)
		{
			echo json_encode(array("m1"=>-1));
		}
		else
		{
			$round_no=$data['round_no'];
			$round_name=$data['round_name'];
			echo json_encode(array("m2"=>"Round $round_no","m1"=>"<input value='$round_no' name='hid' hidden>","m3"=>"<input type='text' name='inp1' value='$round_name'>"));

		}
	}

	function final_round()
	{
		$appid=$this->input->post('id');
		$r=$this->cod_model->final_round($appid);
		echo "Round ".$r;
	}
	function finalize_round()
	{
		$appid=$this->input->post('inp1');
		$round=$this->input->post('hid');
		$this->cod_model->finalize_round($appid,$round);
		redirect('cod/show_modify_round_visits');
	}

	function history_round()
	{
		$visit=$this->input->post('id');
		$data=$this->cod_model->history_round($visit);
		for ($i=count($data)-1; $i>=0; $i--) { 
			$name=$data[$i]["round_name"];
			echo'<br>
			<h5>
			<div class="col s5">Round '.$data[$i]['round_no'].'
			</div>
			<div class="col s7">
			<input id="icon_prefix" type="text" value="'.$name.'" class="validate"';
			if($i!=0) echo "disabled";
			else echo "readonly";
			echo "></div>
			</h5>
			<br>";
		}
	}

	function profilelock()
	{
		$data=$this->cod_model->prolock();
		$this->_render_page('profile_lock',$data);

	}

	function send_msg()
	{
		print_r($_POST);
	}
	function upload_students()
	{
		$this->_render_page('upload_stud_file');
	}

}