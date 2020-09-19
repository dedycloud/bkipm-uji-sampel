<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() /*login*/
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
	
		if($this->form_validation->run() == false)
			{
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
			}
		else
			{
				//validasinya sukses
				$this->_login();
			}
	}


	private function _login()
	{
		// email dan password lolos validasi
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//query
		$user = $this->db->get_where('user',['email' => $email ])->row_array();

		//cek user jika usernya ada ada
		if($user)
		{	//jika usernya active
			if($user['is_active']== 1)
			{
				//cek password
				if(password_verify($password, $user['password'])) //menyamakan pw login form  dengan pw yg sudah di hash/encryp
				{
					$data =[
							'email' => $user['email'],
							'role_id' => $user['role_id']
							];

							$this->session->set_userdata($data);
							if($user['role_id']==1){
			 					redirect('admin');
							}	
							elseif($user['role_id']==3){
			 					redirect('manager');
							}	
							else
							{
								redirect('user'); //arahkan ke view yang kita mau
							}
						
					
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong password</div>');
					redirect('auth');
				}
			}
		}
		else
		{	//usernya tidak ada
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Email is not refistered!. Please create an account!!</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',
		[
			'is_unique' => 'This email has already registered!'
		]); /*email unique*/
	$this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',
		[
			'matches' => 'Password dont match!', /*info psw tidak sama*/
			'min_length' => 'Password too short!' /*info psw pendek/panjang*/
		]);
	$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registrasi';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');
			
		} else { // data yg dimasukan sukses
			$data = [
					'name' => htmlspecialchars($this->input->post('name',true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'image' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'role_id' => 1,
					'is_active' => 1,
					'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation !! Your account has been created. Please Login</div>');
			redirect('auth');
	}
}
	//membersihkan session sambil mengembalikan ke halaman login
	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> You have been logout</div>');
			redirect('auth');

	}
}