<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
	

	public function __construct()
	{
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
		$this->load->model('Signupmdl');
	}

	public function index()
	 {
		
		$user['fetch_dist']=$this->Signupmdl->fetch_dist();
		$user['fetch_data']=$this->Signupmdl->fetch_data();
		$this->load->view("Homepage",$user);
	}
 
	public function form_valid()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("fname","vchr_fname", 'required|alpha_numeric');
		$this->form_validation->set_rules("lname","vchr_lname", 'required|alpha');

		$this->form_validation->set_rules("select","select", 'required');
		$this->form_validation->set_rules("email","email", 'required|valid_email');
		$this->form_validation->set_rules("gender","gender", 'required');
		$this->form_validation->set_rules("file","file", 'required');
		if($this->form_validation->run())
		{
			$user['vchr_fname']=$this->input->get_post('fname');
			$user['vchr_lname']=$this->input->get_post('lname');
			$user['vchr_dname']=$this->input->get_post('select');
			$user['vchr_email']=$this->input->get_post('email');
			$user['vchr_gndr']=$this->input->get_post('gender');
			$user['vchr_file']=$this->input->get_post('file');
			// var_dump($user);
			#file__upload#
					$conf['upload_path'] = './upload/';
					$conf['allowed_types'] = 'gif|jpg|png';
					$conf['max_size']     = '100';
					$conf['max_width'] = '1024';
					$conf['max_height'] = '768';
					// $this->upload->initialize($config);
					
					$this->load->library('upload', $conf);

							if($this->upload->do_upload($user['vchr_file']))
							{
								$user['upload_error'] = $this->upload->display_errors();
							}
							{
								$data=array('upload_data' => $this->upload->data());
								$user['vchr_file'] = base_url()."upload/".$data['upload_data']['file_name'];

							}
			#fil upload close
		// $this->load->model("Signupmdl");

			if ($this->input->post("update"))
			{
			$this->Signupmdl->update_data($user,$this->input->post('hidden_id'));
			redirect(base_url()."index.php/Signup/updated");   #both aare same redirct and this index....
			// $this->index();   								
			}


			if($this->input->post("insert"))
			{
			$this->Signupmdl->insertdb($user);
			redirect(base_url()."index.php/Signup/inserted");
			// $this->index();
			}

			
		}

		else
		{
			$this->index();
		}

	}
		public function inserted()
		{
			$this->index();
		}

public function delete_id()
	{
		if($id=$this->input->get_post('id'))
		{
		$res=$this->Signupmdl->delete($id);
		var_dump($res);
		$this->index();
		}
	}
	
public  function update_fetch($id)
	{
		echo $id;
		$user['user_data']=$this->Signupmdl->update_fetch($id);
		$user['fetch_data']=$this->Signupmdl->fetch_data();
		$this->load->view('Homepage',$user);
	}

		public  function updated()
		{
			$this->index();
		}


public function login()
{
	$this->load->view('login.php');
}
public function login_validation()
{
	$config=array(
			array(
					'field'=>'uname',
					'label'=>'username',
					'rules'=>'required|alpha',// |numeric
					'errors'=>array(
									'required'=>'you must give alpha numeric charecters',
									'alpha'=>'no alpha charecters',
									// 'numeric'=>'no numeric charecters',
									),
				 )
				 );

	$this->load->library('form_validation');
	$this->form_validation->set_rules($config);
	$this->form_validation->set_rules('pword','password','required|alpha_numeric');

	// $this->form_validation->set_rules('pword','password','valid_password');
	if ($this->form_validation->run()) 
	{

		$vchr_uname=$this->input->post('uname');
		$vchr_pword=$this->input->post('pword');	
		// $this->load->model('Signupmdl'); bcoz constrctr
		$user['data']=$this->Signupmdl->loginm($vchr_uname,$vchr_pword);

/*session*/	$this->load->library('session');
			$this->session->set_userdata('id',$user['data'][0]['pk_id']);
			echo $this->session->userdata('id');

	
		if(isset($user['data']))
		{
		$this->load->view('success.php',$user);
		}
		else
		{
			$this->login();
		}
	}
	else
	{
		$this->login();
	}
}

public function image_upload()
{
	$data['title']="upload using ajax codgniter";
	$this->load->view('upload_form',$data);
}
public function ajax_upload()
{
			$config['upload_path'] = './upload/';
			$config['allowed_types']='gif|jpg|png';

	if (isset($_FILES["image_file"]["image_file"]))
	 {

			$this->load->libray('upload',$config);
			if(!$this->upload->do_upload('image_file'))
			{
				echo $this->upload->display_errors();

			}
			else
	        {      
	            $data=$this->upload->data();
	            print_r($data);
			}
			echo 'img src="'.base_url().'index.php/upload/'.$data["image_file"].'"/>';
			print_r($data);
	 }

}

}