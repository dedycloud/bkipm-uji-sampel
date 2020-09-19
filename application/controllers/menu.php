<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function index()
	{
		$data['title'] ='Tabel PPS';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session
		
		//$data['menu']= $this->db->get('pps')->result_array(); 
		$this->load->model('Pps_m');
		$data['menu']= $this->Pps_m->tampilpps()->result_array();
		$data['data']= $this->db->get(['sampel'])->result_array();
		$data['petugas']= $this->db->get(['petugas'])->result_array();
		$data['uji']= $this->db->get(['pengujian'])->result_array();
		

		$this->form_validation->set_rules('no_pps','No PPS','required');//tambah data
		$this->form_validation->set_rules('nama_cs','Nama CS','required');//tambah data
		$this->form_validation->set_rules('person','Person','required');//tambah data
		$this->form_validation->set_rules('phone','Phone','required');//tambah data
		$this->form_validation->set_rules('alamat','Alamat','required');//tambah data
		$this->form_validation->set_rules('jns_sampel','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('jum_sampel','Jumlah Sampel','required');//tambah data
		$this->form_validation->set_rules('desk_sampel','Desk_Sampel','required');//tambah data
		$this->form_validation->set_rules('bentuk','Bentuk','required');//tambah data
		$this->form_validation->set_rules('berat_isi','Berat','required');//tambah data
		$this->form_validation->set_rules('wadah','Wadah','required');//tambah data
		$this->form_validation->set_rules('tgl_permo','Tgl Permohonan','required');//tambah data
		$this->form_validation->set_rules('pengujian','pengujian','required');//tambah data
		$this->form_validation->set_rules('status','Status','required');//tambah data
		$this->form_validation->set_rules('nama_ptgs','Petugas','required');//tambah data

		if($this->form_validation->run()==false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('Menu/index.php',$data);
			$this->load->view('templates/footer');
		}else{
			$data=
			[
			"no_pps"=>$this->input->post('no_pps',true),
			"nama_cs"=>$this->input->post('nama_cs',true),
			"person"=>$this->input->post('person',true),
			"phone"=>$this->input->post('phone',true),
			"alamat"=>$this->input->post('alamat',true),
			"id_sampel"=>$this->input->post('id_sampel',true),
			"jum_sampel"=>$this->input->post('jum_sampel',true),
			"desk_sampel"=>$this->input->post('desk_sampel',true),
			"bentuk"=>$this->input->post('bentuk',true),
			"berat_isi"=>$this->input->post('berat_isi',true),
			"wadah"=>$this->input->post('wadah',true),
			"tgl_permo"=>$this->input->post('tgl_permo',true),
			"id_uji"=>$this->input->post('id_uji',true),
			"status"=>$this->input->post('status',true),
			"id_ptgs"=>$this->input->post('id_ptgs',true)
			];
			
			$this->Pps_m->tambahdatapps($data);
			//$this->pps_m->tampilppspps();
		//$this->db->insert('pps',['no_pps','nama_cs','person','phone','alamat','jns_sampel','jum_sampel','desk_sampel','bentuk','berat_isi','wadah','tgl_permo','pengujian','status','petugas'=>$this->input->post('no_pps','nama_cs','person','phone','alamat','jns_sampel','jum_sampel','desk_sampel','bentuk','berat_isi','wadah','tgl_permo','pengujian','status','petugas')]);//tambah data
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');//alert succes
			redirect('Menu');
			}	

	}	

public function ubahpps()
{
		$data['title'] ='Tabel PPS';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session
		
		//$data['menu']= $this->db->get('pps')->result_array(); 
		$this->load->model('Pps_m');
		$data['menu']= $this->Pps_m->tampilpps()->result_array();
		$data['data']= $this->db->get(['sampel'])->result_array();
		$data['petugas']= $this->db->get(['petugas'])->result_array();
		//$this->load->view('menu/index',$data);

		$this->form_validation->set_rules('no_pps','No PPS','required');//tambah data
		$this->form_validation->set_rules('nama_cs','Nama CS','required');//tambah data
		$this->form_validation->set_rules('person','Person','required');//tambah data
		$this->form_validation->set_rules('phone','Phone','required');//tambah data
		$this->form_validation->set_rules('alamat','Alamat','required');//tambah data
		$this->form_validation->set_rules('jns_sampel','Jenis Sampel','required');//tambah data
		$this->form_validation->set_rules('jum_sampel','Jumlah Sampel','required');//tambah data
		$this->form_validation->set_rules('desk_sampel','Desk_Sampel','required');//tambah data
		$this->form_validation->set_rules('bentuk','Bentuk','required');//tambah data
		$this->form_validation->set_rules('berat_isi','Berat','required');//tambah data
		$this->form_validation->set_rules('wadah','Wadah','required');//tambah data
		$this->form_validation->set_rules('tgl_permo','Tgl Permohonan','required');//tambah data
		$this->form_validation->set_rules('pengujian','pengujian','required');//tambah data
		$this->form_validation->set_rules('status','Status','required');//tambah data
		$this->form_validation->set_rules('nama_ptgs','Petugas','required');//tambah data

		if($this->form_validation->run()==false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('Menu/index',$data);
			$this->load->view('templates/footer');
		}else{
			
		$id = $this->input->post('id_pps');
		$nama = $this->input->post('no_pps'); 
		$nama = $this->input->post('nama_cs'); 
		$nama = $this->input->post('person'); 
		$nama = $this->input->post('phone'); 
		$nama = $this->input->post('alamat'); 
		$nama = $this->input->post('jns_sampel'); 
		$nama = $this->input->post('jum_sampel'); 
		$nama = $this->input->post('desk_sampel'); 
		$nama = $this->input->post('bentuk'); 
		$nama = $this->input->post('berat_isi'); 
		$nama = $this->input->post('wadah'); 
		$nama = $this->input->post('tgl_permo'); 
		$nama = $this->input->post('pengujian'); 
		$nama = $this->input->post('status'); 
		$nama = $this->input->post('nama_ptgs'); 

		$data = array
			(
				'no_pps' => $nama,
				'nama_cs' => $nama,
				'person' => $nama,
				'phone' => $nama,
				'alamat' => $nama,
				'jns_sampel' => $nama,
				'jum_sampel' => $nama,
				'desk_sampel' => $nama,
				'bentuk' => $nama,
				'berat_isi' => $nama,
				'wadah' => $nama,
				'tgl_permo' => $nama,
				'pengujian' => $nama,
				'status' => $nama,
				'nama_ptgs' => $nama
			);

		$where= array
		(
			'id_pps'=> $id
		);

			
			$this->Pps_m->ubahdatapps($where,$data,'pps');
			//$this->pps_m->selectsampel();
			//$this->pps_m->tampilppspps();
		//$this->db->insert('pps',['no_pps','nama_cs','person','phone','alamat','jns_sampel','jum_sampel','desk_sampel','bentuk','berat_isi','wadah','tgl_permo','pengujian','status','petugas'=>$this->input->post('no_pps','nama_cs','person','phone','alamat','jns_sampel','jum_sampel','desk_sampel','bentuk','berat_isi','wadah','tgl_permo','pengujian','status','petugas')]);//tambah data
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');//alert succes
			redirect('Menu');
		}
}

public function hapuspps($id)
	{
	$this->load->model('Pps_m');
	$this->Pps_m->hapusdatapps($id);
	$this->session->set_flashdata('flash','Dihapus');
	redirect('Menu');
	}
	


public function Sampel()
	{
		$data['title'] ='Tabel Sampel';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['data']= $this->db->get('sampel')->result_array();

		$this->form_validation->set_rules('jns_sampel','Jenis Sampel','required');//tambah data
		
		if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/sampel.php',$data);
		$this->load->view('templates/footer');
		}else{
		$this->load->model('sampel_m');
		$this->sampel_m->tambahdatasampel($data);
		//$this->db->insert('sampel',['jns_sampel'=>$this->input->post('jns_sampel')]);//tambah data
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');//alert succes
			redirect('Menu/Sampel');
			}	

	}

public function ubahsampel()
	{
		$data['title'] ='Tabel Sampel';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['user']= $this->db->get('sampel')->result_array();

		$this->form_validation->set_rules('jns_sampel','Jenis Sampel','required');

		if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/petugas.php',$data);
		$this->load->view('templates/footer');
	} else{
		$id = $this->input->post('id_sampel');
		$nama = $this->input->post('jns_sampel'); 

		$data = array
			(
				'jns_sampel' => $nama
			);

		$where= array
		(
			'id_sampel'=> $id
		);
		
		$this->load->model('sampel_m');
		$this->sampel_m->ubahdatasampel($where,$data,'sampel');
		
		//$this->db->insert('petugas',['nama_ptgs'=> $this->input->post('nama_ptgs')]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Success!!</div>');
			redirect('Menu/Sampel');

}
}


public function hapussam($id)
	{
	$this->load->model('Sampel_m');
	$this->Sampel_m->hapusdatasampel($id);
	$this->session->set_flashdata('flash','Dihapus');
	redirect('Menu/Sampel');
	}

public function Pengujian()
	{
		$data['title'] ='Tabel Pengujian';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['uji']= $this->db->get('Pengujian')->result_array();
		
		$this->form_validation->set_rules('pengujian','Nama Pengujian','required');//tambah data

	if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/pengujian.php',$data);
		$this->load->view('templates/footer');
		}else{
		$this->db->insert('pengujian',['pengujian'=> $this->input->post('pengujian')]);//tambah data
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');//alert succes
			redirect('Menu/Pengujian');
		}
	}

public function ubahpengujian()
	{
		$data['title'] ='Tabel Pengujian';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['uji']= $this->db->get('pengujian')->result_array();

		$this->form_validation->set_rules('pengujian','Nama Pengujian','required');

		if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/pengujian.php',$data);
		$this->load->view('templates/footer');
	} else{
		$id = $this->input->post('id_uji');
		$nama = $this->input->post('pengujian'); 

		$data = array
			(
				'pengujian' => $nama
			);

		$where= array
		(
			'id_uji'=> $id
		);
		
		$this->load->model('pengujian_m');
		$this->pengujian_m->ubahdatauji($where,$data,'petugas');
		
		//$this->db->insert('petugas',['nama_ptgs'=> $this->input->post('nama_ptgs')]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Success!!</div>');
			redirect('Menu/Pengujian');
		
}
}


public function hapuspengujian($id)
	{
	$this->load->model('Pengujian_m');
	$this->Pengujian_m->hapusdatauji($id);
	$this->session->set_flashdata('flash','Dihapus');
	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Delete Success!!</div>');
	redirect('Menu/Pengujian');
	}




public function Petugas()
	{
		$data['title'] ='Tabel Petugas';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session
		
		$data['petugas']= $this->db->get('petugas')->result_array();
		
	$this->form_validation->set_rules('nama_ptgs','Nama Petugas','required');//tambah data

	if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/petugas.php',$data);
		$this->load->view('templates/footer');
	} else{

		$this->load->model('petugas_m');
		$this->petugas_m->tambahdatapetugas($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Success!!</div>');
			redirect('Menu/Petugas');//alet succes
	}
}

public function ubahpetugas()
	{
		$data['title'] ='Tabel Petugas';
		$data['user']= $this->db->get_where('user', ['email' => $this->session
			->userdata('email')]) ->row_array(); //ambil data dari user berdasarkan email di session

		$data['petugas']= $this->db->get('petugas')->result_array();

		$this->form_validation->set_rules('nama_ptgs','Nama Petugas','required');

		if($this->form_validation->run()==false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('Menu/petugas.php',$data);
		$this->load->view('templates/footer');
	} else{
		$id = $this->input->post('id_ptgs');
		$nama = $this->input->post('nama_ptgs'); 

		$data = array
			(
				'nama_ptgs' => $nama
			);

		$where= array
		(
			'id_ptgs'=> $id
		);
		
		$this->load->model('petugas_m');
		$this->petugas_m->ubahdatapetugas($where,$data,'petugas');
		
		//$this->db->insert('petugas',['nama_ptgs'=> $this->input->post('nama_ptgs')]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Success!!</div>');
			redirect('Menu/Petugas');
		
}
}

public function hapuspetugas($id)
	{
	$this->load->model('Petugas_m');
	$this->Petugas_m->hapusdatapetugas($id);
	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Delete Success!!</div>');
	redirect('Menu/Petugas');
	}





}	
