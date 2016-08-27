<?php

class Upload extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
		$this->load->model('stud_model');
	}

	function upload_files()
	{
		$this->load->model('stud_model');
		$data=$this->stud_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();

		$this->load->view('stud_dash',$data);

		$this->load->view('upload_form',$data);
		$this->load->view('footer');
	}
	function upload_photo()
	{
		
		$this->load->model('stud_model');
		$data=$this->stud_model->get_user_info();
		$data['id']=$this->ion_auth->get_user_id();
		$this->load->view('stud_dash', $data);
		$this->load->view('upload_photo', array('error' => ' ' ));
		$this->load->view('footer');
	}

	function do_upload($file)
	{    
		
		$this->load->model('stud_model');
		$roll=$this->stud_model->getroll();
		$data=$this->stud_model->get_user_info();
		$name=$data['first_name'];
		//echo $name;
		$data['id']=$this->ion_auth->get_user_id();

		if (!is_dir('./assets/uploads/documents/'.$data['specialization_id'])) 
		{
			mkdir('./assets/uploads/documents/' . $data['specialization_id'], 0777);
		}
		if (!is_dir('./assets/uploads/documents/'.$data['specialization_id'].'/'.$data['encrypt'])) 
		{
			mkdir('./assets/uploads/documents/' . $data['specialization_id'].'/'.$data['encrypt'], 0777);
		}
		$config['upload_path'] = './assets/uploads/documents/'.$data['specialization_id'].'/'.$data['encrypt'];
		$config['allowed_types'] = 'pdf';
		$config['overwrite'] = TRUE;
          if($file=="resume") {
            $config['file_name']='resume';
          }
          else if($file=="10th") {
            $config['file_name']='10th_cert';
          }
          else if($file=="12th") {
            $config['file_name']='12th_cert';
          }
          else if($file=="scst") {
            $config['file_name']='scst';
          }
          else if($file=="pwd") {
            $config['file_name']='pwd';
          }
           else if($file=="grad") {
            $config['file_name']='grad';
          }

		

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('stud_dash',$data);
			
			$this->load->view('upload_form', $error);
			$this->load->view('footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$roll=$this->stud_model->getroll();
			$data['roll_number']=$roll['roll_number'];
			//print_r($data['roll_number']['roll_number']) ;
		$data['id']=$this->ion_auth->get_user_id();
		$data['first_name']=$name;
		header("Cache-Control: no-cache, must-revalidate");
			$this->load->view('stud_dash',$data);
			$this->load->view('upload_success', $data);
			$this->load->view('footer');
		}
	}


	function getImage($id)
	{
	 $this->session->userdata('is_logged_in');
	 $query = $this->db->query("SELECT * FROM users WHERE  id ='$id' ");
	 if($query->num_rows()==0)
	 die("Picture not foun!");
	 else{
	    $row = $query->fetch_assoc();
	    $q = $row['profile_picture'];
	    return true;
	     }
	} 
	function delete_pic(){
		//$data = $this->upload->data();
		//$pic_name=$this->Stud_model->get_user_data();
		unlink(base_url('./assets/stud_uploads/'.$this->upload->data('file_name')));
		//delete_files('./assets/stud_uploads/'.$this->upload->data('file_name'));
		#$this->load->view('stud_dash');
		redirect('stud/upload_success','refresh');
	}
	function delete_file($id)
	{   $this->load->model('stud_model');
		$user=$this->ion_auth->get_user_id();
		$roll=$this->stud_model->getroll();
		$this->load->helper('file');
		switch($id)
		{
         case 1:unlink('./assets/uploads/' .$roll .'/resume.pdf');
                $this->upload_files(); 
                break;
         case 2:unlink('./assets/uploads/' .$roll .'/10th_cert.pdf');
                $this->upload_files(); 
                break;
         case 3:unlink('./assets/uploads/' .$roll .'/12th_cert.pdf');
                $this->upload_files(); 
                break;
         case 4:unlink('./assets/uploads/' .$roll .'/scst.pdf');
                $this->upload_files(); 
                break;
         case 5:unlink('./assets/uploads/' .$roll .'/pwd.pdf');
                $this->upload_files(); 
                break;
         case 6:unlink('./assets/uploads/' .$roll .'/grad.pdf');
                $this->upload_files(); 
                break;
         default: 
         		echo "unable to delete, error! ";
                 $this->upload_files();  
		}
	}
	function do_upload_photo()
	{
		$config['upload_path'] = './assets/stud_uploads';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '1000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$config['width'] =($this->input->post('width')!=null)?$this->input->post('width'):350;
		$config['height'] = 350;
		$this->load->library('auth/ion_auth');
		$id=$this->ion_auth->get_user_id();

		$config['file_name'] = $id;
		$config['overwrite']=TRUE;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$data = array('upload_data' => $this->upload->data());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}	
		$config['image_library'] = 'gd2';
		$config['source_image']	= $data['upload_data']['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = true;
		$config['width']	=($this->input->post('width')!=null)?$this->input->post('width'):350;
		$config['height']	= 350;
		$this->load->library('image_lib', $config); 
		$this->image_lib->clear(); // added this line
        $this->image_lib->initialize($config); // added this line
        $this->image_lib->resize();
        $config['maintain_ratio']=FALSE;
        if($_POST)
        {
        	$config['x_axis']=$this->input->post('x1');
			$config['y_axis']=$this->input->post('y1');
			$config['width']	= $this->input->post('x2');
			$config['height']	= $this->input->post('y2');
        }
		$this->image_lib->clear(); // added this line
        $this->image_lib->initialize($config); 
		if(!$this->image_lib->crop())
		{
			print_r("error");
		}
		else 
		{
			header("Refresh:2;url=".base_url()."student/");
			//header("Location:".base_url()."student/upload/upload_photo?img=$id");
		}
		
	}
}