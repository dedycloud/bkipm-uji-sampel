<?php

/**
 * 
 */
class Customer_m extends CI_model
{
	public function tambahdatacs()
	
	{
		$data=
		[
			"jns_sampel"=>$this->input->post('jns_sampel',true)
		];
		$this->db->insert('sampel',$data);
	}

	public function hapusdatacs($id)
	{
		$this->db->where('id_cs',$id);
		$this->db->delete('customer');
	}
public function ubahdatacs()
	
	{
		$this->db->where('nama_cs');
		$this->db->delete('customer');
	}
	
}