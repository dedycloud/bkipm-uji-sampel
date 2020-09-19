<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller 
{
	public function index()
	{
		$data['title'] ='Laporan Data PPS';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['menu']= $this->db->get('pps')->result_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Manager/index.php',$data);
		$this->load->view('templates/footer');
	}

	
}