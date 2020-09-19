<?php

/**
 * 
 */
class Pps_ms extends CI_model
{
	public function tambahdatapps()
	
	{
		$insert=
		[
			"no_pps"=>$this->input->post('no_pps',true),
			"nama_cs"=>$this->input->post('nama_cs',true),
			"person"=>$this->input->post('person',true),
			"phone"=>$this->input->post('phone',true),
			"alamat"=>$this->input->post('alamat',true),
			"jns_sampel"=>$this->input->post('jns_sampel',true),
			"jum_sampel"=>$this->input->post('jum_sampel',true),
			"desk_sampel"=>$this->input->post('desk_sampel',true),
			"bentuk"=>$this->input->post('bentuk',true),
			"berat_isi"=>$this->input->post('berat_isi',true),
			"wadah"=>$this->input->post('wadah',true),
			"tgl_permo"=>$this->input->post('tgl_permo',true),
			"pengujian"=>$this->input->post('pengujian',true),
			"status"=>$this->input->post('status',true),
			"nama_ptgs"=>$this->input->post('nama_ptgs',true)
		];

		$this->db->insert('pps',$insert);
	}

	public function hapusdatapps($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pps');
	}
public function ubahdatapps()
	
	{
		
	}

	public function tampilpps()
	{
		
		$this->db->select('*');
		$this->db->from('pps');
		//$this->db->join('customer','pps.id_cs=customer.id_cs','left');
		$this->db->join('petugas','pps.id_ptgs=petugas.id_ptgs','left');
		$this->db->join('sampel','pps.id_sampel=sampel.id_sampel','left');
		$query=$this->db->get();


		return $query; 

	}


}