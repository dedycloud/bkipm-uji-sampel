<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function index()
	{
		$data['title'] ='Form PPS';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session
		//$data['menu']= $this->db->get('pps')->result_array();
		$this->load->model('Pps_m');
		$data['menu']= $this->Pps_m->tampilpps()->result_array();

		// CHECKBOX
		$data['pengujian']= $this->Pps_m->tampilPengujian()->result_array();

		$data['data']= $this->db->get(['sampel'])->result_array();
		$data['petugas']= $this->db->get(['petugas'])->result_array();
		
		$this->form_validation->set_rules('no_pps','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('nama_cs','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('person','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('phone','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('alamat','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('jns_sampel','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('jum_sampel','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('desk_sampel','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('bentuk','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('berat_isi','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('wadah','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('tgl_permo','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('nm_parameter','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('pengujian','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('status','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('petugas','Jenis Sampel','required');//tambah data


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('User/index.php',$data);
		$this->load->view('templates/footer');



	}
	public function action_add()
	{
		$this->load->model('Pps_m');

		$data= array(
			"no_pps"=>'',
			"nama_cs"=>$this->input->post('nama_cs',true),
			"person"=>$this->input->post('person',true),
			"phone"=>$this->input->post('phone',true),
			"alamat"=>$this->input->post('alamat',true),
			"id_sampel"=>$this->input->post('sampel',true),
			"jum_sampel"=>$this->input->post('jum_sampel',true),
			"desk_sampel"=>$this->input->post('desk_sampel',true),
			"bentuk"=>$this->input->post('bentuk',true),
			"berat_isi"=>$this->input->post('berat_isi',true),
			"wadah"=>$this->input->post('wadah',true),
			"tgl_permo"=>$this->input->post('tgl_permo',true),
			"id_uji"=>1,
			"status"=>'',
			"id_ptgs"=>1);
		$this->Pps_m->tambahdatapps($data);

		// setelah insert get data by id untuk insert chekbox nya
		$id_pps= $this->Pps_m->select_by_id($this->input->post('nama_cs'));	
		// di tampung dalam array 
		$insertppsuji = array();
		$index = 0; 
		$check_list = $this->input->post('check_list');
		foreach($check_list as $data){ 
			array_push($insertppsuji, array(
				'id_pps'=>$id_pps->id_pps,
				'id_uji'=>$data 
			));

			$index++;
		}
		// insert multiple with chekbox
		$this->Pps_m->tambahdatappsUji($insertppsuji);

	//tambah data
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');//alert succes
		redirect('User');

	}
}