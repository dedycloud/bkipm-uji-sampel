<?php

/**
 * 
 */
class Petugas_m extends CI_model
{
	public function tambahdatapetugas($data)
	
	{
		
		$data=
		[
			"nama_ptgs"=>$this->input->post('nama_ptgs',true)
		];
		$this->db->insert('petugas',$data);
	}

	public function hapusdatapetugas($id)
	{
		$this->db->where('id_ptgs',$id);
		$this->db->delete('petugas');
	}
public function ubahdatapetugas($where,$data)
	
	{
		$this->db->where($where);
		$this->db->update('petugas',$data);
		
	}
	
}